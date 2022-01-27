<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// topのviewを返す
Route::any('/', 'HomeController@index');

// ログインボタンを押した場合
Route::post('login', 'LoginController@login');
// 新規登録へ進んだ場合
Route::get('register', 'RegisterController@index');
// 登録内容確認へ進んだ場合
Route::post('register_check', 'RegisterController@check');
// 登録内容確認画面表示
Route::get('check', 'RegisterController@checkIndex');
// 新規登録を行なった場合
Route::post('register_up', 'RegisterController@register');
// 新規登録を行なった場合
Route::post('register_back', 'RegisterController@back');
// 新規登録が完了した後のサンクスページ
Route::get('thanks', 'ThanksController@index');

// PASSを忘れた方
Route::get('forgot', 'ForgotController@index');
// PASS再設定メール送信
Route::post('reset', 'ResetController@index');
// PASSを忘れた方がメールのURLから飛んできた
Route::get('reset_password', 'ResetController@new_password');
// パスワードの変更
Route::post('change_password', 'ResetController@change_password');

// ログインが完了してマイページに遷移した場合
Route::get('mypage', 'MypageController@index')->middleware('user_id_auth');
// ログアウトの処理
Route::get('logout', 'LogoutController@logout');

// プロフィール編集画面
Route::get('edit', 'EditController@index')->middleware('user_id_auth');
// プロフィール編集完了
Route::post('upload_profile', 'EditController@upload_profile')->middleware('user_id_auth');

// 画像アップロード(ajax送信)
Route::post('upload_img', 'ImgController@upload_img');
// 画像トリミング(ajax送信)
Route::post('trimming_img', 'ImgController@trimming_img');

// コネクションページ
Route::get('connection', 'ConnectionController@index')->middleware('user_id_auth');
// ユーザー詳細ページ
Route::get('user/{user_id}', 'UserpageController@index')->middleware('user_id_auth');
// 絞り込み検索を行なった場合
Route::post('refined-search', 'RefinedsearchController@index');

// 新規新着情報追加ページ
Route::get('add-news', 'NewsController@index')->middleware('user_id_auth');
// NEWSを投稿
Route::post('new_news', 'NewsController@upload_news');
// 新着情報削除ページ
Route::get('delete-news', 'NewsController@delete_news')->middleware('user_id_auth');
// NEWSを削除
Route::post('destroy_news', 'NewsController@destroy_news');
// ニュース詳細ページ
Route::get('news/{news_id}', 'NewsController@news_detail')->middleware('user_id_auth');

// カテゴリーページ(組織リーダーシップ)
Route::get('category/組織・リーダーシップ', 'CategoryController@organization')->middleware('user_id_auth');
// カテゴリーページ(思考)
Route::get('category/思考', 'CategoryController@thinking')->middleware('user_id_auth');
// カテゴリーページ(戦略・マーケティング)
Route::get('category/戦略・マーケティング', 'CategoryController@marketing')->middleware('user_id_auth');
// カテゴリーページ(会計・財務)
Route::get('category/会計・財務', 'CategoryController@finance')->middleware('user_id_auth');
// カテゴリーページ(キャリア・志)
Route::get('category/キャリア・志', 'CategoryController@career')->middleware('user_id_auth');
// カテゴリーページ(変革)
Route::get('category/変革', 'CategoryController@change')->middleware('user_id_auth');

// カテゴリーページ(詳細)
Route::get('category/{content_category}/{content_name}', 'CategoryController@category_detail')->middleware('user_id_auth');



// コンテンツ一覧ページ
Route::get('contents', 'ContentsController@index')->middleware('user_id_auth');
// 営業コンテンツページ
Route::get('contents/sales', 'ContentsController@sales')->middleware('user_id_auth');
// プログラミングコンテンツページ
Route::get('contents/programming', 'ContentsController@programming')->middleware('user_id_auth');
