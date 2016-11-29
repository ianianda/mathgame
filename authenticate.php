<!DOCTYPE HTML>
<html lang="en">
<?php
    session_start();
?>
	<head>
	<title>Math Game</title>
    	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
  	<meta charset="utf-8" />
</head>
<body>
    	<div class="container">
<form action="authenticate.php" method="post" role="form" class="form-horizontal">

	<?php
	$ops = array('+','-');
	$index = rand() % 2;
	$operator = $ops[$index]; //
	//if($index == 0) a+b;
	//$rand_key = array_rand($ops);
	//$operator = $ops[$rand_key];
	$first_number = rand(0, 20);
	$second_number = rand(0, 20);
	$add_answer = $first_number + $second_number;
	$sub_answer = $first_number - $second_number;
	$_SESSION['textboxError'] = false;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  		if (empty($_POST["textbox"]) || (!is_numeric($_POST["textbox"]))) {
    			$_SESSION['textboxError'] = true;
	      } else {
   			$textbox = ($_POST["textbox"]);
			$_SESSION['textbox'] = $textbox;}}
	
	
	?>
	
	<div class="row">
        <div class="col-sm-4 col-sm-offset-4"><h1>Math Game</h1></div>
        <div class="col-sm-4"><a href="logout.php" class="btn btn-default btn-sm">Logout</a></div>
    </div>
    <div class="row">
        <label name="ranum1" class="col-sm-2 col-sm-offset-3"><?php echo $first_number ?></label>
        <label class="col-sm-2">-</label>
        <label name="ranum2" class="col-sm-2"><?php echo $second_number ?></label>
        <div class="col-sm-3"></div>
    </div>

    <input type="hidden" name="first_number" value="8" />
    <input type="hidden" name="operation" value="-" />
    <input type="hidden" name="second_number" value="3" />
    <input type="hidden" name="total" value="0" />
    <input type="hidden" name="score" value="0" />

    <div class="form-group">
        <div class="col-sm-3 col-sm-offset-4">	
            <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter answer" size="6">
	<?php
		if($_SESSION['textboxError']) {
       		echo "<font color='red'>You must enter a number for your answer.</font>";  }
		?>
        </div>
        <div class="col-sm-5">
	</div>
    <div class="row">
        <div class="col-sm-3 col-sm-offset-4">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary btn-sm">
            Submit</button>
        </div>
        <div class="col-sm-3"></div>
        </div>
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
