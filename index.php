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
    <form action="index.php" method="post" role="form" class="form-horizontal">
        <?php
	    $operators = array('+','-');
	    $ran_op = rand() % 2;
	    $operator = $operators[$ran_op]; 
	    $first_number = rand(0, 20);
	    $second_number = rand(0, 20);
	    $_SESSION['textboxError'] = false;
	    $score = $_POST["score"];
	    $_POST['total'] = $total++;
	    
	    
	    if ( $ran_op == "0" ) {
	        $key = $first_number + $second_number;
	    } else {
	        $key = $first_number - $second_number;
	    }
	
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		    
  		if (is_numeric($_POST["answer"])) { //textbox is a number
		    $answer = ($_POST["answer"]);
			//echo $answer;
			//echo $_SESSION['key'];
	        } else {
   		    $_SESSION['textboxError'] = true;
		       }}
	    
	?>
	
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4"><h1>Math Game</h1></div>
            <div class="col-sm-4"><a href="logout.php" class="btn btn-default btn-sm">Logout</a></div>
        </div>
        
	<div class="row">
            <label name="ranum1" class="col-sm-2 col-sm-offset-3"><?php echo $first_number ?></label> <!--show first random number-->
            <label class="col-sm-2"><?php echo $operator ?></label> <!--show random operator-->
            <label name="ranum2" class="col-sm-2"><?php echo $second_number ?></label> <!--show second random number-->
            <div class="col-sm-3"></div>
        </div>
	<!-- why we need a hidden area? -->    
        <input type="hidden" name="first_number" value="8" />
        <input type="hidden" name="operation" value="-" />
        <input type="hidden" name="second_number" value="3" />
        <input type="hidden" name="total" value="0" />
        <input type="hidden" name="score" value="0" />

        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-4">	
                <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter answer" size="6">
	            <?php
			  if($_SESSION['textboxError'] == true) {
       			    echo "<font color='red'>You must enter a number for your answer.</font>";
				  
			} else if ($_SESSION['key'] == $answer){
			    echo "<font color='green'>Correct</font>";
				  ++$score;
				  
			} else if ($_SESSION['key'] != $answer){
			    echo '<span style="color: red; font-weight: bold;">INCORRECT, ' . $_SESSION['first_number'] . ' ' . $_SESSION['operator'] . ' ' . $_SESSION['second_number'] . ' is ' . $key . '.</span>';
			$total++;	  
			}
			$_SESSION['key'] = $key;
		    $_SESSION['first_number'] = $first_number;
		    $_SESSION['second_number'] = $second_number;
		    $_SESSION['operator'] = $operator;
		    $_POST['score'] = $score;
		    $total++;
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
    <div class="col-sm-4 col-sm-offset-4"><?php echo 'Score: ' . $score . ' / ' . $total; ?></div>
    <div class="col-sm-4"></div>
</div>
    </div>
</body>
</html>
