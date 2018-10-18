<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$error = '';
$name = '';
$password = '';


function clean_text($string){
    $string = trim($string); //Remove white space from left and right of string
    $string = stripslashes($string); //Remove back slashes from string
    $string = htmlspecialchars($string); //Convert special chars into HTML entities
    return $string;
}

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $password = $_POST["password"];

    $file = file('credentials.csv');

    $csv[] = '';
    foreach($file as $k){
        $csv[] = explode(',',$k);
    }
    $count = count($file);

    $found = false;
    for($i = 1; $i <= $count;$i++){
        for($j = 1; $j <= 1;$j++){
            $y = clean_text($csv[$i][$j]);
            $x = clean_text($csv[$i][$j+1]);
            if ($y == $name && $x == $password){
                $found = true;
            }
            break;
        }
    }

    if($found){
        header('Location: menu.html');
    }

    if(!$found) {
        $error .= '<p><label class="text-danger">Please enter a correct username or password</label></p>';
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/login.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body>
    <header>EINSTEIN'S PUZZLE</header>
    <div class="gamelogo"></div>
    <div clas="form">
        <form method="POST">
            <div>

                <!-- Display error after processing the form-->
                <?php echo $error; ?>

                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="name">
    
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password">
    
                <button id="loginBtn" type="submit" name="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember">Remember me
                </label>
            </div>
            <br>
            <span class="createacc">New User? <a href="createlogin.php">Create Account</a></span>
        </form>
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