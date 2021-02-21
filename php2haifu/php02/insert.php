<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$artist = $_POST["artist"];
$title = $_POST['title'];
$recommend = $_POST['recommend'];
$URL = $_POST['URL'];


//2. DB接続します
try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=favorite_music;charset=utf8;host=localhost','root','root'); //MAMPの場合は後ろ二つはroot 

} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意
 $stmt = $pdo->prepare("INSERT INTO gs_bm_table(id , artist , title , URL , recommend , indate )VALUES( NULL , :artist ,:title , :URL , :recommend , sysDate())");

//  2. バインド変数を用意
$stmt->bindValue(':artist', $artist, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)←文字の種類PARAM_STは文字
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':URL', $URL , PDO::PARAM_STR);
$stmt->bindValue(':recommend', $recommend, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)


//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);//←exitは表示をやめる、ほぼコピペ
}else{
  //５．index.phpへリダイレクト
  header('Location: index.php');

}
?>
