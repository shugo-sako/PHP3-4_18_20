<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>お気に入りプレイリスト</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel=”stylesheet” href=”style.css”>
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>


<!-- Head[Start] -->
<header>
<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">オススメ曲一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>オススメ曲登録</legend>
    <ul>
      <li id="artist_name">
       <label>アーティスト名：<input type="text" name="artist"></label><br>
      </li>
      <li id="title_name">
     <label>曲名：<input type="text" name="title"></label><br>
      </li>
      <li id="recommend_point">
     <label>ポイント：<textArea name="recommend" rows="4" cols="40"></textArea></label><br>
      </li>
      <li id="link">
     <label>URL：<input type="text" name="URL"></label><br>
      </li>
      <li id="sousin">
     <input type="submit" value="送信">
      </li>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
