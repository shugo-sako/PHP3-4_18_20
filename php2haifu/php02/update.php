<?php

require_once("funcs.php");


//1. POSTデータ取得
$artist = $_POST["artist"];
$title = $_POST['title'];
$recommend = $_POST['recommend'];
$URL = $_POST['URL'];
$id = $_POST['id'];


//2. DB接続します
//*** function化する！  *****************
// try {
//     $db_name = "gs_db3";    //データベース名
//     $db_id   = "root";      //アカウント名
//     $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
//     $db_host = "localhost"; //DBホスト
//     $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//     exit('DB Connection Error:'.$e->getMessage());
// }
$pdo = db_conn();



//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE 
        gs_bm_table 
        SET 
        artist=:artist ,
        title=:title ,
        recommend=:recommend ,
        URL=:URL ,
        indate= sysdate()
    WHERE 
        id =:id;
        ");

$stmt->bindValue(':artist', h($artist), PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':title', h($title), PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':recommend', h($recommend), PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':URL', h($URL), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit("SQLError:".$error[2]);
}else{
    //*** function化する！*****************
    redirect('index.php');
}
?>
