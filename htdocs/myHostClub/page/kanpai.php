<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>myHostClub</title>
</head>
<body>
<!-- HTML -->
<button id="btn">ボタン</button>
<div class="contents">
    <div class="gazou">画像</div>
    <div class="mozi">文字
        <div id="a">ディスティニーって運命だと思う。</div>
        <div id="b">君と初めて会った時のこと、今でも覚えてる。</div>
        <div id="c">予備校の自習室で隣になった君。</div>
        <div id="d">一目見た瞬間、視界に入ったんだよ</div>
        <div id="e"></div>
    </div>
</div>
<!-- HTML END -->

<!-- PHP -->
<?php
//1.DB接続
try {
    $pdo = new PDO('mysql:dbname=mypoem;charset=utf8;host=localhost','root','root');
    } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}
//２．データ取得：SQL
$stmt = $pdo->prepare("SELECT * FROM poem");
$status = $stmt->execute();
//３．データ表示
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
    }else{
    //「2.」で取得したデータの数だけ自動でループしてくれるwhile文
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    var_dump($result['a']);
    var_dump($result['b']);
    var_dump($result['c']);
    var_dump($result['d']);
    var_dump($result['e']);
    $a = $result['a'];
    echo '<br>';
    echo $a;
    echo '<br>';
    $ary = array($result['a'],$result['b']);
    var_dump($ary);
    // PHPの配列をJson形式にする
    $json_array = json_encode($ary);
    echo $json_array;
    }
}
?>
<!-- PHP END -->
<script src="jquery-2.1.3.min.js"></script>
<script>

</script>
</body>
</html>