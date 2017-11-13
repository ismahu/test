<?php require_once 'php/connect.php'; require_once 'php/functions.php'; ?>
<!doctype html>
<html>
	<head>
		<title>Sponsorship Issues</title>
		<meta charset="UTF-8" lang="en-US">
		<link rel="stylesheet" href="style.css">
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script src="js/global.js"></script>
	</head>
	<body>
<center>
<video width="400"  border="5" controls>
  <source src="videos/hisbah.mp4" type="video/mp4">
  <source src="videos/hisbah.ogg" type="video/ogg">
  Your browser does not support HTML5 video.
</video>

<p>
Video courtesy of 
<a href="vidfolder.html" target="_blank">Big Buck Bunny</a>.
</p>
</center>



		<div class="page-container">
			<?php 
				get_total();
				require_once 'php/check_com.php';
			?>
			<form action="" method="post" class="main">
				<label>enter a brief comment</label>
				<textarea class="form-text" name="comment" id="comment"></textarea>
				<br />
				<input type="submit" class="form-submit" name="new_comment" value="post">
			</form>
			<?php get_comments(); ?>
		</div>

		<center>
<video width="400"  border="5" controls>
  <source src="videos/hisbah.mp4" type="video/mp4">
  <source src="videos/hisbah.ogg" type="video/ogg">
  Your browser does not support HTML5 video.
</video>

<p>
Video courtesy of 
<a href="vidfolder.html" target="_blank">Big Buck Bunny</a>.
</p>
</center>



		<div class="page-container">
			<?php 
				get_total();
				require_once 'php/check_com.php';
			?>
			<form action="" method="post" class="main">
				<label>enter a brief comment</label>
				<textarea class="form-text" name="comment" id="comment"></textarea>
				<br />
				<input type="submit" class="form-submit" name="new_comment" value="post">
			</form>
			<?php get_comments(); ?>
		</div>
	</body>
</html>