<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ハッシュタグ取得</title>
<style>
*{
	font-family:"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, Osaka, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
	font-size:12px;
}
h3{
	font-size:20px;
	text-align:center;
	border-bottom:1px solid #ccc;
}
p{
	margin:0;
	padding:0;
	font-size:12px;
}
.box{
	margin:0 auto;
	width:700px;
	display:table;
	margin-bottom:15px;
}
.box div{
	display:table-cell;
	vertical-align:top;
}
.left{
	width:60px;
}
.right{
	width:540px;
}
.name{
	font-weight:bold;
}
.screen_name{
	display:inline-block;
	margin-left:1em;
	font-weight:normal;
	color:#999;
}
.created_at{
	font-size:11px;
	color:#666;
}
img{
	max-width:200px;
	height:auto;
}
</style>
</head>

<body>
<?php
ini_set( 'display_errors', 1 );
date_default_timezone_set('Asia/Tokyo');

require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

//twitterAppsで取得

//接続
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

//レスポンス確認
//$tweet = $connection->get("search/tweets", array("q" => "#ハッシュタグ OR #ハッシュタグ -RT filter:images", 'count' => 10, 'include_entities' => true));
$tweet = $connection->get("search/tweets", array("q" => "#名言", 'count' => 100, 'include_entities' => true));
// 自分のタイムラインを取得
$home_params = ['count' => '10'];
$home = $connection->get('statuses/home_timeline', $home_params);

// 自分のツイートを取得
$user_params = ['count' => '10'];
$user = $connection->get('statuses/user_timeline', $user_params);

// ニックネームからユーザ情報を取得
$users_params = ['screen_name' => 'ferretplus'];
$users = $connection->get('users/show', $users_params);

print_r($users);
?>
<h3>Excelコピペ用</h3>
<textarea style="width:100%; height:5em;">
<?php
foreach($tweet->statuses as $key => $value){
	print $value->user->profile_image_url."\t";
	print $value->user->name."\t";
	print $value->user->screen_name."\t";
	print str_replace(array("\r\n","\n","\r"), '', $value->text)."\t";
	print date('Y-m-d H:i:s', strtotime($value->created_at))."\t";
	print "\n";
}
?>
</textarea>
<h3>確認用</h3>
<?php
foreach($tweet->statuses as $key => $value):
?>
<div class="box">
	<div class="left">
	<img src="<?php print $value->user->profile_image_url;?>">
	</div>
	<div class="right">
	<p class="name"><?php print $value->user->name;?><span class="screen_name">@<?php print $value->user->screen_name;?></span></p>
	<p class="text"><?php print $value->text; ?></p>
	<?php if(!empty($value->entities->media[0]->media_url)):?>
	<p><img src="<?php print $value->entities->media[0]->media_url; ?>"></p>
	<?php endif; ?>
	<p class="created_at"><?php print date('Y-m-d H:i:s', strtotime($value->created_at)); ?></p>
	</div>
</div>
<?php
//echo '<pre>'; var_dump($value->entities->media[0]->media_url); echo '</pre>';
endforeach;
?>
</body>
</html>