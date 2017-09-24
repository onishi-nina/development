<?php
// require_once('var/admin/init.php');

session_cache_limiter('public');
session_start();
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

	<div class="container">
		<div class="row">

			<div class="col-12">

				<form method="post" action="confirm.php" name="form_conract">
					<div class="form-group">
						<label>コメント</label>
						<textarea name="text" cols="30" rows="5" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label>タグ</label>
						<div class="row">
							<div class="col-4">
								<input type="text" name="tag01" class="form-control"><br>
							</div>
							<div class="col-4">
								<input type="text" name="tag02" class="form-control"><br>
							</div>
							<div class="col-4">
								<input type="text" name="tag03" class="form-control">
							</div>
						</div>
					</div>

				<div class="form-group">
					<label>リンク先</label>
					<input type="text" name="link01" class="form-control">
				</div>

				<div class="send__btn">
					<input type="submit" value="送信" class="btn btn-primary">
				</div>

			</form>
		</div>
	</div>
</div>

</body>
</html>