<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>Leard Board</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../CSS_FILE/login.css">
</head>
<body>
<header>EINSTEIN'S PUZZLE</header>
<div class="gamelogo"></div>
<h1 align=center>Top Scores</h1>
<div class = "leaderContainer">
<button class="ibutton"><a href="../HTML_FILE/menu.html">Back</a></button>
<p></p>
<table class="leaderTable">
	
<?php

function clean_text($string){
	$string = trim($string); //Remove white space from left and right of string
	$string = stripslashes($string); //Remove back slashes from string
	$string = htmlspecialchars($string); //Convert special chars into HTML entities
	return $string;
}

$file = file('./credentials.csv');

$csv[] = '';
foreach($file as $k){
	$csv[] = explode(',',$k);
}
$count = count($file);

$list = array();
for($i = 1; $i <= $count;$i++){
	for($j = 1; $j <= 1;$j++){
		$y = clean_text($csv[$i][$j]);
		$x = clean_text($csv[$i][$j+2]);

		$list[$y]=$x;
	}
}
arsort($list);
$i = 0;
echo "<tr><th>#</th><th>Score</th><th>Name</th></tr>";
foreach ($list as $key => $value){
	if($i==3){
		break;
	}
		
	echo "<tr><td>".($i+1)."</td><td>".$key."</td><td>".$value."</td></tr>";
	$i++;
}
?>
</table>
<h1>------------------------------------</h1>
<h1>----Are Your in the Board ?-------</h1>
<h1>------------------------------------</h1>
<h1>------------------------------------</h1>

</div>
<div class="footer">
        <span>Powered By: InfiniteLoop</span>
            <ul id="icon-list">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
</div>
</body>
</html>