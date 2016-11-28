<?php
    session_start();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Math Game</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <meta charset="utf-8" />
</head>
<body>
    <div class="container">
<form action="index.php" method="post" role="form" class="form-horizontal">

	<?php
	$_SESSION['textboxError'] = false;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  		if (!empty($_POST["textbox"]) && (!is_numeric($_POST["textbox"]))) {
    			$_SESSION['textboxError'] = true;
	      } else {
   			$textbox = ($_POST["textbox"]);}}
	
	if($_SESSION['textboxError']) {
       		header("Location:index.php"); 
      		die();  }
	?>
	
	<div class="row">
        <div class="col-sm-4 col-sm-offset-4"><h1>Math Game</h1></div>
        <div class="col-sm-4"><a href="logout.php" class="btn btn-default btn-sm">Logout</a></div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-sm-offset-3">
		<?php echo rand(0, 20); ?>
	</label>
        <label class="col-sm-2">-</label>
        <label class="col-sm-2">
	    <?php echo rand(0, 20); ?>
	</label>
        <div class="col-sm-3"></div>
    </div>

    <input type="hidden" name="first_number" value="8" />
    <input type="hidden" name="operation" value="-" />
    <input type="hidden" name="second_number" value="3" />
    <input type="hidden" name="total" value="0" />
    <input type="hidden" name="score" value="0" />

    <div class="form-group">
        <div class="col-sm-3 col-sm-offset-4">
		<?php 
		if (isset($_SESSION['pennyError']) && $_SESSION['pennyError'] == true) {
                echo "<font color='red'>You must enter a number for your answer.</font>";} 
		?>
            <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter answer" size="6">
        </div>
        <div class="col-sm-5"><?php 
		if (isset($_SESSION['pennyError']) && $_SESSION['pennyError'] == true) {
                echo "<font color='red'>You must enter a number for your answer.</font>";} 
		?></div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-sm-offset-4">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary btn-sm">
            Submit</button>
        </div>
        <div class="col-sm-3"></div>
    </div>
</form>
<hr />
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
            </div>
    <div class="col-sm-4"></div>
</div>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">Score: 0 / 0</div>
    <div class="col-sm-4"></div>
</div>
    </div>
</body>
</html>
