<?php 
session_destroy();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>Game Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../CSS_FILE/style.css">
</head>
<body>
<header>EINSTEIN'S PUZZLE</header>
<audio src="../image/background.mp3">
</audio>
<div class="gamelogo"></div>
<?php 
$questions = array("The Spanish lives directly to the right of the Red house. ;The Norwegian lives in the Blue house.; The Italian lives in house two",
 					"Color,National;blue,red,white!Italian,Norwegian,Spanish;House#1:blue,Norwegian!House#2:red,Italian!House#3:white,Spanish",
"The Brazilian does not live in house two.; The person with the Dogs plays Basketball.;There is one house between the house of the person who plays Football and the Red house on the right.; The person with the Fishes lives directly to the left of the person with the Cats.;The person with the Dogs lives directly to the right of the Green house.; The German lives in house three.",
"Color, Nationality,Animal,Sport;blue, green, red!Australian, Brazilian, German!cats, dogs, fishes! basketball, football,soccer;House#1:blue,Brazilian,fishes, football! House#2:green,Australian,cats, soccer!House#3:red,German,dogs,basketball");

$ans_num = 0;

if(!isset($_SESSION['life'])||$_SESSION['life']<=0){
	$_SESSION['life'] = 3;
}
if(!isset($_SESSION['score'])){
	$_SESSION['score']=0;
}
//echo "<h3>Life: ".$_SESSION['life']."</h3>";
function createQuestionList($questions){
	echo "<div class=\"questionContains\"><ol>";
	$question = preg_split( '/;/', $questions );
	foreach($question as $q){
		echo "<li>".$q."</li>";
	}
	echo "</ol></div>";
}
function createTable($string){
	$answers = array();
	$values  = preg_split( '/;/', $string );
	$sections = preg_split( '/!/', $values[2] );
	$types = preg_split( '/,/', $values[0] );
	
	echo "<div class=\"answerContains\"><form action=\"gamePage.php\" method=\"POST\">";
	
	echo "<table class=\"tableContains\"><th></th>";
	
	foreach($types as $type){
	    echo "<th>".$type."</th>";
	}
	$options = preg_split( '/!/', $values[1] );
	$dafule = $_SESSION['defaule'];
	$dI = 0;
	foreach($sections as $section){
	    $house = preg_split( '/:/', $section);
	    $answer=preg_split( '/,/', $house[1]);
	    foreach ($answer as $ans){
	    	array_push($answers, $ans);
	    }
	    echo "<div class=\"colorRow\"><tr><td>".$house[0]."</td>";
	    for($index = 0; $index < count($answer);$index++){
	    	echo "<td><select name=\"select{$GLOBALS['ans_num']}\" 
						id=\"select{$GLOBALS['ans_num']}\">";
	    	echo "<option></option>";
	    	$dI++;
		    $option = preg_split( '/,/', $options[$index]);
		    $GLOBALS['ans_num']++;
		    foreach($option as $opti){
		        echo "<option value={$opti}>".$opti."</option>";
		    }
		    echo "</select></td>";
	    }
	    echo "</tr></div>";
	}
	echo "</table>";
	echo "<marquee behavior=\"alternate\" direction=\"left\">";
	echo "<input type=\"image\" class = \"submitImage\" src=\"../image/sumbit.png\" width=50px height=30px></form>";
	echo "</marquee>";
	return $answers;
}
function check(&$answers, &$guess){
	$result = true;
	for($i = 0;$i<count($answers);$i++){
		if($answers[$i] != $guess[$i]){
			$result = false;
			return $result;
		}
	}
	return $result;
}

$index=0;
if(isset($_SESSION['questionIndex'])){
	$index = $_SESSION['questionIndex'];
	if($index>3)
		$index= 0;
}
else{
	$index = 0;
}
$questions1 = $questions[$index];
$questions2 = $questions[$index+1];

createQuestionList($questions1);
$answers = createTable($questions2);
$guess = array();

if($_SERVER["REQUEST_METHOD"]=="POST"){
	//echo "<h1>Life: ".$_SESSION['life']."</h1>";
	
	for($i = 0; $i< $GLOBALS['ans_num'];$i++){
		$name = "select".$i;
		$selected_val = $_POST[$name];
		array_push($guess, $selected_val);
	}
	$result= check($answers, $guess);
	if($result){
		echo "<img src=\"../image/youwin.gif\" class=\"yon\">";
		$_SESSION['questionIndex'] = $index+2;
		$_SESSION['score'] = $_SESSION['score']+1;
	}
	else{
		echo "<img src=\"../image/notyet.gif\" class=\"yon\">";
		
		echo "<p>".$_SESSION['life']."</p>";
		$_SESSION['life'] = $_SESSION['life']-1;
		$_SESSION['questionIndex'] = $index;
		$_SESSION['score'] = 0;
	} 
	if($_SESSION['life'] <= 0){
		header('Location: ../PHP_FILE/score.php');
		exit;
	}
}
?>
</div>
<h1>   </h1>
<h1>   </h1>
<h1>   </h1>
<h1>   </h1>
<audio src="../music/background.mp3" autoplay loop>
<embed src="../music/background.mp3" width="180" height="90" hidden="true">
</audio>
<div class="footer"><span>Powered By: Inifite Loop </span>
<ul id="icon-list">
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-instagram"></i></a></li>
</ul>
</div>    
</body>
</html>
