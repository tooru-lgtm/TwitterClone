<?php
///////////////////////////////////////
// サインアウトコントローラー
///////////////////////////////////////
 
// 設定を読み込む
include_once 'C:\xampp\htdocs\config.php';
// 便利な関数を読み込む
include_once 'C:\xampp\htdocs\util.php';
 
// ユーザー情報をセッションから削除
deleteUserSession();
 
// ログイン画面に遷移
header('Location: ' . HOME_URL . '\controllers\sign-in.php');
exit;

