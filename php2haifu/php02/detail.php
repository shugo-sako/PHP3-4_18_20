<?php
session_start();

require_once('funcs.php');//←関数を引っ張ってきたサイン
$pdo = db_conn();

loginCheck();

$id = $_GET['id'];
echo $id;

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id = " . $id . ';');
$status = $stmt->execute();

//３．データ表示
if ($status == false){
    sql_error($status);
} else {
    $row = $stmt->fetch();
    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">詳細</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<!-- Main[Start] -->


<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>オススメ曲登録</legend>
    <ul>
      <li id="artist_name">
       <label>アーティスト名：<input type="text" name="artist" value="<?=$row['artist']?>"></label><br>
      </li>
      <li id="title_name">
     <label>曲名：<input type="text" name="title"value="<?=$row['title']?>"></label><br>
      </li>
      <li id="recommend_point">
     <label>ポイント：<textArea name="recommend" rows="4" cols="40"><?=$row['recommend']?></textArea></label><br>
      </li>
      <li id="link">
     <label>URL：<input type="text" name="URL"value="<?=$row['URL']?>"></label><br>
      </li>
      <input type="hidden" name="id" value=<?=$row['id']?>>
      <li id="sousin">
     <input type="submit" value="送信">
      </li>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
</html>
