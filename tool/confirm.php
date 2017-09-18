<?php
// require_once('var/admin/init.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<title>Document</title>

	<link href="css/grid.css" rel="stylesheet">

</head>
<body>


	<?php
	// function pr( $string ){
	// 	if( empty( $string ) ){
	// 		return;
	// 	}
	// 	print( htmlspecialchars( $string, ENT_QUOTES ) );
	// }

	// $is_error = false;
	// print( '<font color="red">' );
	// if( empty( $_REQUEST["comment"] ) ){
	// 	print( 'commentが未入力です。<br />' );
	// 	$is_error = true;
	// }
	// print( '</font>' );


$text = $_POST['text']; // テキストエリアの値
$cr = array("\r\n", "\r"); // 改行コード置換用配列

$text = trim($text); // 文頭文末の空白を削除
$text = str_replace(array(" ", "　"), "", $text);
$text = str_replace($cr, "\n", $text); // 改行コードを統一
$lines = explode("\n", $text); //改行コードで分割

$tag01 = $_REQUEST["tag01"];
$tag02 = $_REQUEST["tag02"];
$tag03 = $_REQUEST["tag03"];
$link01 = $_REQUEST["link01"];
?>


<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="form-group">
				<label>出力</label>
				<textarea class="form-control" rows="10"><?php foreach ($lines as $type) { echo $type.'（'.$tag03.'）';
						echo '&nbsp;#'.$tag01;
						echo '&nbsp;#'.$tag02;
						echo '&nbsp;#'.$tag03;
						echo '&nbsp;'.$link01;
						echo "\n"; }?></textarea>
			</div>

			<button type="button" onclick="history.back()" class="btn btn-primary">戻る</button>

			</div>
		</div>
	</div>

</body>
</html>