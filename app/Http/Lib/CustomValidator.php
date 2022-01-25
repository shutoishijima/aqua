<?php

namespace App\Http\lib;

use \Illuminate\Validation\Validator;
use DB;

/**
 * カスタムバリデーションの設定
 *
 */
class CustomValidator extends Validator {

    /**
     * ログインチェック
     *
     * @return true/false
     */
    public function validateLoginCheck($attribute, $value, $parameters) {
        $sql = "select * from users where user_mail = '$value' and user_pass = '$parameters[0]'";
        $users = DB::select($sql);

        if(count($users) == 0){
            return false;
        }

        return true;
    }

    /**
     * パスワード変更時のメールアドレスの有無チェック
     *
     * @return true/false
     */
    public function validateMailCheck($attribute, $value, $parameters) {
        $sql = "select * from users where user_mail = '$value'";
        $users = DB::select($sql);

        if(count($users) == 0){
            return false;
        }

        return true;
    }
}