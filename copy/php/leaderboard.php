<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Leaderboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/login.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body>
<header>EINSTEIN'S PUZZLE</header>
<div class="gamelogo"></div>


<div class = "leaderContainer">
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
        echo "<tr><th>Rank</th><th id='player'>Player</th><th id='completed'>Puzzle Completed</th></tr>";
        foreach ($list as $key => $value){
            if($i==3){
                break;
            }

            echo "<tr><td>".$i."</td><td>".$key."</td><td>".$value."</td></tr>";
            $i++;
        }
        ?>
    </table>
    <button class="mbtn"><a href="menu.html">Back</a></button>
</div>


<div class="footer">
    <span>Powered By: InfiniteLoop</span>
    <ul id="icon-list">
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
    </ul>
</div>

<iframe src="../music/kyoto.mp3" allow="autoplay" id="audio"></iframe>
<audio id="player" autoplay hidden><source src="0.mp3" type="audio/mp3"></audio>


</body>
</html>