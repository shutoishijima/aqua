<?php

namespace App\Http\lib;

use Session;
use DB;
use Log;

use Illuminate\Support\Facades\Mail;

/**
 * システムの共通設定
 */
class Common
{
    /** セッションのキーを設定（ユーザーID,名前,パス,電話番号,メール,性別,居住エリア） */
    public static $SESSION_USER_ID = 'session_user_id';

    /** 会員有料のステータス */
    public static $USER_STATUS_PAY = '1';
    /** 会員無料のステータス */
    public static $USER_STATUS_FREE = '0';

    /**
     * セッションから情報を取得する処理
     *
     * @return 情報
     */
    public static function get_session_user_id()
    {
        return Session::get(self::$SESSION_USER_ID);
    }

    /**
     * ユーザー情報の取得
     *
     * @return ユーザー情報
     */
    public function get_user_info($user_id)
    {
        return DB::select("select * from users where user_id = '$user_id'");
    }

    /**
     * ユーザーが管理しているクライアント情報の取得
     *
     * @return ユーザーが管理しているクライアント情報
     */
    public function get_client_info()
    {
        $user_id = self::get_session_user_id();
        return DB::select("select * from clients where user_id = '$user_id'");
    }

    /**
     * チャット情報の取得(使っていません)
     *
     * @return 自分が送ったものは反映されてないver
     */
    public function get_chat_readed()
    {
        $user_id = self::get_session_user_id();
        return DB::select("select cp.user_id, cp.from_user, cp.chat_date, cp.message, cc.cnt, u.user_name, u.user_img_path
        from chats cp
        inner join (
            select user_id, from_user, max(chat_date) as chat_date from chats group by user_id, from_user
        ) cd on cp.user_id = cd.user_id and cp.from_user = cd.from_user and cp.chat_date = cd.chat_date
        left outer join (
            select user_id, from_user, unread, count(*) as cnt from chats group by user_id, from_user, unread
        ) cc on cp.user_id = cc.user_id and cp.from_user = cc.from_user and cc.unread = '未読'
        inner join (
            select * from users
        ) u on cp.from_user = u.user_id
        where cp.user_id = '$user_id'
        order by cp.chat_date desc;");
    }

    /**
     * チャット情報の取得
     *
     * @return チャット一覧の情報
     */
    public function get_all_chat_info()
    {
        $user_id = self::get_session_user_id();
        $sql = "select
        chat_all.user_id,
        chat_all.from_user,
        u.user_name as from_user_name,
        concat(u.user_img_path, u.user_img) as user_img,
        chat_all.cnt,
        -- 日付
        -- user_idで結合した場合にuser_idが未設定の場合
        case when cuser.user_id is null then cfrom.chat_date 
        -- from_userで結合した場合にuser_idが未設定の場合(elseは基本なし)
        when cfrom.user_id is null then cuser.chat_date else null end chat_date,
        -- メッセージ
        -- user_idで結合した場合にuser_idが未設定の場合
        case when cuser.user_id is null then cfrom.message 
        -- from_userで結合した場合にuser_idが未設定の場合(elseは基本なし)
        when cfrom.user_id is null then cuser.message else null end message
        from (
        -- ★★★ チャット情報 ★★★ start
        select chat.user_id, chat.from_user, max(chat_date) as chat_date, sum(cnt) as cnt
        from (
        select
        -- user_idが1以外はfrom_userをuser_idとする
        case when cp.user_id != $user_id then cp.from_user else cp.user_id end user_id, 
        -- from_userが1の場合はuser_idをfrom_userとする
        case when cp.from_user = $user_id then cp.user_id else cp.from_user end from_user, 
        cp.chat_date, 
        -- 0は件数です(自分から送ったメールの件数は0としています。)
        case when cp.from_user = $user_id then 0 else cc.cnt end cnt
        from chats cp
        inner join (
            select user_id, from_user, max(chat_date) as chat_date from chats group by user_id, from_user
        ) cd on cp.user_id = cd.user_id and cp.from_user = cd.from_user and cp.chat_date = cd.chat_date
        left outer join (
            select user_id, from_user, count(*) as cnt from chats where unread = '未読' group by user_id, from_user
        ) cc on cp.user_id = cc.user_id and cp.from_user = cc.from_user
        -- user_idとfrom_userで絞る
        where cp.user_id = $user_id or cp.from_user = $user_id
        ) chat
        group by chat.user_id, chat.from_user
        -- ★★★ チャット情報 ★★★ end
        ) chat_all
        -- user_idで結合
        left outer join chats cuser on chat_all.user_id = cuser.user_id and chat_all.from_user = cuser.from_user
        and chat_all.chat_date = cuser.chat_date
        -- from_userで結合
        left outer join chats cfrom on chat_all.from_user = cfrom.user_id and chat_all.user_id = cfrom.from_user
        and chat_all.chat_date = cfrom.chat_date
        -- from_userの名前を取得
        inner join users u on chat_all.from_user = u.user_id
        order by chat_date desc;";
        Log::debug($sql);
        return DB::select($sql);
    }

    /**
     * チャットを開いた時の情報の取得
     *
     * @return チャットを開いた時の情報
     */
    public function get_open_chat_info($from_user)
    {
        $user_id = self::get_session_user_id();
        $sql = "select * from chats inner join users on chats.from_user = users.user_id 
        where chats.user_id in ('$user_id' , '$from_user') and chats.from_user in ('$user_id' , '$from_user')
        order by chat_date asc";
        return DB::select($sql);
    }

    /**
     * 詳細を開いたら既読がつく処理
     *
     * @param int $from_user 送信元
     * @return 更新結果
     */
    public function update_open_chat_readed($from_user)
    {
        $user_id = self::get_session_user_id();
        $sql = "update chats set unread = '既読' where user_id = '$user_id' and from_user = '$from_user' and unread = '未読'";
        return DB::update($sql);
    }

    /**
     * メール送信処理
     *
     * @param string $to_mail メール送信先
     * @param string $subject タイトル
     * @param string $body 本文
     * @param string $from_mail メール送信元
     * @param string $from_name 送信元名
     * @return void
     */
    public function send_mail($to_mail, $subject, $body, $from_mail = null, $from_name = null)
    {
        if($from_mail == null) {
            $from_mail = config('mail.from.address');
        }
        
        if($from_name == null) {
            $from_name = config('mail.from.name');
        }

        Log::debug($from_mail.$from_name);

        Mail::raw($body, function($message) use($to_mail, $subject, $from_mail, $from_name){
            $message->to($to_mail)
                ->from($from_mail, $from_name)
                ->subject($subject);
        });
    }

    /**
     * スケジュール情報取得
     *
     * @param int $client_id クライアントID
     * @return ユーザーのクライアントのスケジュールのみ取得
     */
    public function get_schedule($client_id)
    {
        $user_id = self::get_session_user_id();
        $sql = "select * from calendars where user_id = '$user_id' and client_id = '$client_id';";
        return DB::select($sql);
    }

    /**
     * ユーザー売上top3情報の取得
     */
    public function get_user_am_info()
    {
        $sql = "select * from users order by user_reward_amount desc limit 3";
        return DB::select($sql);
    }

    /**
     * ユーザー詳細ページのユーザーの情報の取得
     */
    public function get_all_user_info($user_id)
    {
        return DB::select("select * from users where user_id = '$user_id'");
    }

    /**
     * 日付フォーマット
     */
    public static function get_date_format($date)
    {
        return date_format(new \DateTime($date), "Y/m/d H:i:s");
    }
    /**
     * news日付フォーマット
     */
    public static function get_news_date_format($date)
    {
        $week = array( "日", "月", "火", "水", "木", "金", "土" );
        $week_ja = $week[date("w", strtotime($date))];
        return date("Y年m月d日", strtotime($date)) ."（".$week_ja."）";
    }

    /**
     * 名前検索結果ユーザー情報の取得
     */
    public function get_search_user_info($name)
    {
        return DB::select("select * from users where user_name = '$name'");
    }

    /**
     * 絞り込み検索結果ユーザー情報の取得
     */
    public function get_research_user_info($age, $area, $gender, $status)
    {
        $add_age = "";
        if ($age == "1") {
            $add_age = "and user_age >= 10 and user_age <= 19 ";
        }
        elseif ($age == "2") {
            $add_age = "and user_age >= 20 and user_age <= 29 ";
        }
        elseif ($age == "3") {
            $add_age = "and user_age >= 30 and user_age <= 39 ";
        }
        elseif ($age == "4") {
            $add_age = "and user_age >= 40 and user_age <= 49 ";
        }
        elseif ($age == "5") {
            $add_age = "and user_age >= 50 and user_age <= 59 ";
        }
        elseif ($age == "6") {
            $add_age = "and user_age >= 60 and user_age <= 69 ";
        }
        elseif ($age == "7") {
            $add_age = "and user_age >= 70 and user_age <= 79 ";
        }
        elseif ($age == "8") {
            $add_age = "and user_age >= 80 and user_age <= 89 ";
        }
        elseif ($age == "9") {
            $add_age = "and user_age >= 90 and user_age <= 99 ";
        }

        $add_area = "";
        if ($area != "") {
            $add_area = "and user_area = '$area' ";
        }

        $add_gender = "";
        if ($gender != "") {
            $add_gender = "and user_gender = '$gender' ";
        }

        $add_status = "";
        if ($status != "") {
            $add_status = "and user_status = '$status' ";
        }

        $sql = "select * from users where user_age >= 0 " .$add_age .$add_area .$add_gender .$add_status;
        
        return DB::select($sql);
    }

    /**
     * タイムラインのデータ取得
     */
    public function get_timeline_info()
    {
        $sql = "select comments_cnt.*,timelines.*,users.* from timelines 
        inner join users on timelines.user_id = users.user_id
        left outer join (select user_id, timeline_id, count(*) as cnt from comments group by user_id, timeline_id) comments_cnt
        on timelines.timeline_id = comments_cnt.timeline_id and timelines.user_id = comments_cnt.user_id
        order by timeline_date desc limit 10";
        return DB::select($sql);
    }

    /**
     * タイムラインのデータ取得（コメント詳細ページ）
     */
    public function get_timeline_comment_info($timeline_id)
    {
        $sql = "select * from timelines inner join users on timelines.user_id = users.user_id where timeline_id = '$timeline_id'";
        return DB::select($sql);
    }

    /**
     * コメントのデータ取得（コメント詳細ページ）
     */
    public function get_comment_info($timeline_id)
    {
        $sql = "select * from comments inner join users on comments.user_id = users.user_id where timeline_id = '$timeline_id'";
        return DB::select($sql);
    }

    /**
     * コメントの数取得（コメント詳細ページ）
     */
    public function get_comment_amo_info($timeline_id)
    {
        $sql = "select count(*) as cnt from comments where timeline_id = '$timeline_id'";
        return DB::select($sql);
    }

     /**
     * コネクションページのユーザー情報（ランダム取得）
     */
    public function get_mix_user_info()
    {
        $sql = "select * from users order by rand() limit 1000";
        return DB::select($sql);
    }

    /**
     * 全てのユーザーのメアド情報の取得
     */
    public function get_all_users_mail()
    {
        return DB::select("select user_mail from users");
    }

    /**
     * 削除したいnews情報取得
     */
    public static function delete_news_info($title)
    {
        return DB::select("select * from news where news_title = '$title' order by news_create_at desc");
    }

    /**
     * マイページの全てのnews情報取得（６件）
     */
    public static function get_all_news()
    {
        return DB::select("select * from news order by news_create_at desc limit 6");
    }

    /**
     * news詳細ページのnewsの情報の取得
     */
    public function get_all_news_info($news_id)
    {
        return DB::select("select * from news where news_id = '$news_id'");
    }

    /**
     * カテゴリー別コンテンツ数の取得
     */
    public function get_contents_amount()
    {
        $user_id = self::get_session_user_id();
        $sql = "select content_category, count( content_category ) as cnt from contents group by content_category;";
        return DB::select($sql);
    }

    /**
     * 組織・リーダーシップの取得
     */
    public function get_organization_contents()
    {
        $user_id = self::get_session_user_id();
        $sql = "select * from contents where content_category = '組織・リーダーシップ';";
        return DB::select($sql);
    }
    /**
     * 思考の取得
     */
    public function get_thinking_contents()
    {
        $user_id = self::get_session_user_id();
        $sql = "select * from contents where content_category = '思考';";
        return DB::select($sql);
    }
    /**
     * 戦略・マーケティングの取得
     */
    public function get_marketing_contents()
    {
        $user_id = self::get_session_user_id();
        $sql = "select * from contents where content_category = '戦略・マーケティング';";
        return DB::select($sql);
    }
    /**
     * 会計・財務の取得
     */
    public function get_finance_contents()
    {
        $user_id = self::get_session_user_id();
        $sql = "select * from contents where content_category = '会計・財務';";
        return DB::select($sql);
    }
    /**
     * キャリア・志の取得
     */
    public function get_career_contents()
    {
        $user_id = self::get_session_user_id();
        $sql = "select * from contents where content_category = 'キャリア・志';";
        return DB::select($sql);
    }
    /**
     * 変革の取得
     */
    public function get_change_contents()
    {
        $user_id = self::get_session_user_id();
        $sql = "select * from contents where content_category = '変革';";
        return DB::select($sql);
    }

    /**
     * 詳細ページのコンテンツ取得
     */
    public function get_content_info($content_category, $content_name)
    {
        return DB::select("select * from contents where content_category = '$content_category' and content_name = '$content_name'");
    }
    /**
     * 詳細ページの視聴コンテンツの次のコンテンツ取得
     */
    public function get_next_content_info($content_category, $content_name)
    {
        $content_create_at = DB::select("select content_create_at from contents where content_category = '$content_category' and content_name = '$content_name'");
        //dd($content_create_at);

        $conversion = $content_create_at[0]->content_create_at;

        //dd($conversion);

        $sql = "select * from contents where content_category = '$content_category' and content_create_at > '$conversion';";
        return DB::select($sql);
    }
}
