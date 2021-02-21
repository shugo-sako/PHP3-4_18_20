<?php

session_start();

require_once('funcs.php');  //中の関数が使えるようになる。

loginCheck();

$pdo = db_conn();   //  DB接続します



//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT* FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // $view .= '<p>' .h($result['artist']) ." / ".  h($result['title']) ." / ". h($result['recommend'] )." / ". h($result['URL']) . '</p>'; //. がないとただの上書きになる。.があると情報がどんどん増えていくイメージ
 $view .="<p>";
 $view .='<a href ="detail.php?id=' . $result["id"].'">';
 $view .=$result['artist'] ." / ".  $result['title']. "/" . $result['id'];
 $view .='</a>';
 
  
//  削除ページリンク
 $view .='<a href ="delete.php?id=' . $result["id"].'">';
 $view .=' 【削除】';
 $view .='</a>';

 $view .="</p>";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>オリジナルラベルシート</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">お気に入りデータ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>  
</div>
<!-- Main[End] -->

</body>
</html>
