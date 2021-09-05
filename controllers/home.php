<?php
///////////////////////////////////////
// ホームコントローラー
///////////////////////////////////////
 
// 設定を読み込み
include_once '../config.php';
// 便利な関数を読み込み
include_once '../util.php';

// ツイートデータ操作モデルを読み込み
include_once '../Models/tweets.php';

//ログインチェック
$user = getUserSession();
if (!$user) {
    // ログインしてないときログイン画面に遷移
    header('Location: ' . HOME_URL . 'controllers\sign-in.php');
    exit;
}

// 表示用の変数
$view_user = $user;

// ツイート一覧
// TODO:モデルから取得する

$view_tweets = findTweets($user);

 

// 画面表示
include_once 'C:\xampp\htdocs\TwitterClone\Views\home.php';