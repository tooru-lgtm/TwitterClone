<?php
///////////////////////////////////////
// ポストコントローラー
///////////////////////////////////////
 
// 設定を読み込み
include_once 'C:\xampp\htdocs\TwitterClone\config.php';
// 便利な関数を読み込み
include_once 'C:\xampp\htdocs\TwitterClone\util.php';

// ツイートデータ操作モデルを読み込む
include_once 'C:\xampp\htdocs\TwitterClone\Models\tweets.php';

//ログインチェック
$user = getUserSession();
if (!$user) {
    // ログインしてないときログイン画面に遷移
    header('Location: ' . HOME_URL . '\controllers\sign-in.php');
    exit;
}

// ツイートがある場合
if (isset($_POST['body'])) {
    $image_name = null;
    if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
        // 画像をアップロード
        $image_name = uploadImage($user, $_FILES['image'], ''); 
    }
    $data = [
        'user_id' => $user['id'],
        'body' => $_POST['body'],
        'image_name' => $image_name,
    ];
 
// つぶやき投稿
if (createTweet($data)) {
 // ホーム画面へ遷移
 header('Location: ' . HOME_URL . '\Controllers\home.php');
 exit;
  }
}

// 表示用の変数
$view_user = $user;

// 画面表示
include_once 'C:\xampp\htdocs\TwitterClone\Views\post.php'

?>

