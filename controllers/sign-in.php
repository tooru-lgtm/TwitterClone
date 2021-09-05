<?php
///////////////////////////////////////
// サインインコントローラー
///////////////////////////////////////
 
// 設定を読み込み
include_once '../config.php';
// 便利な関数を読み込み
include_once '../util.php';
 
// ユーザーデータ操作モデルを読み込み
include_once 'C:\xampp\htdocs\TwitterClone\Models\users.php';
 
// ログインチェック
$try_login_result = null;
if (isset($_POST['email']) && isset($_POST['password'])) {
    // ログインチェック実行
    $user = findUserAndCheckPassword($_POST['email'], $_POST['password']);
 
    // ログイン成功した場合
    if ($user) {
        
        // ユーザー情報をセッションに保存
        saveUserSession($user);
     
 
        // ホーム画面へ遷移
        header('Location: ' . HOME_URL . '\Controllers\home.php');
        exit;
    } else {
        // ログイン失敗
        $try_login_result = false;
    }
}
 
// 画面表示
$view_try_login_result = $try_login_result;
include_once 'C:\xampp\htdocs\TwitterClone\Views\sign-in.php';


