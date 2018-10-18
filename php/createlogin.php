<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);


// Store error message while processing form data
$error = '';

$name = '';
$password = '';
$confirmpassword = '';

// Clean string to remove SQL injection
function clean_text($string){
    $string = trim($string); //Remove white space from left and right of string
    $string = stripslashes($string); //Remove back slashes from string
    $string = htmlspecialchars($string); //Convert special chars into HTML entities
    return $string;
}

// Check if variable is set to 'submit', if true, execute
if(isset($_POST["submit"])){
    // Validate form data - check if each variable has a value
    if(empty($_POST["name"])){
        $error .= '<p><label class="text-danger">Please enter a username</label></p>';
    } else {
        $name = clean_text($_POST["name"]);
        // Check to only allow string containing letters and white space
        if(!preg_match("/^[a-zA-Z ]*$/",$name)){
            $error .= "<p><label class=\"text-danger\">Only letter and white space allowed</label></p>";
        }
    }

    if(empty($_POST["password"])){
        $error .= '<p><label class="text-danger">Please enter your password</label></p>';
    } elseif($_POST["password"] != $_POST["confirmpassword"]) {
        $error .= '<p><label class="text-danger">Your password does not match</label></p>';
    } else{
        $password = clean_text($_POST["password"]);
        if(strlen($_POST["password"]) < 8){
            $error .= '<p><label class="text-danger">Your password must contain at least 8 characters</label></p>';
        } elseif (!preg_match("#[0-9]+#", $password)){
            $error .= '<p><label class="text-danger">Your password must contain at least one number</label></p>';
        } elseif (!preg_match("#[A-Z]+#",$password)){
            $error .= '<p><label class="text-danger">Your password must contain at least one capitalized letter</label></p>';
        } elseif (!preg_match("#[a-z]+#",$password)){
            $error .= '<p><label class="text-danger">Your password must contain at least one lowercase letter</label></p>';
        }
    }

    //If error value is blank, write to csv file
    if ($error == ''){
        $file_open = fopen("credentials.csv", "a+"); //File pointer will be go to end of file because we used a mode for the 2nd argument
        //File function return array of CSV file, count func. will count number of rows in that array
        $no_rows = count(file('credentials.csv'));
        //Generate serial numbers
        if($no_rows > 1){
            $no_rows = $no_rows + 1;
        }
        $form_data = array(
            'sr_no' => $no_rows,
            'username' => $name,
            'password' => $password,
            'score' => $score
        );
        fputcsv($file_open, $form_data);
        $error = '<p><label class="text-danger">You have been registered! Click <a href="login.php">here</a> to login.</label></p>';

        //Clear value
        $name = '';
        $password = '';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/login.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body>
    <header>EINSTEIN'S PUZZLE</header>
    <div class="gamelogo"></div>
    <div clas="form">
        <form class="signup" method="POST">
            <div>
                <p id="signupp">Please fill in this form to create an account.</p>
                <hr>

                <!-- Display error after processing the form-->
                <?php echo $error; ?>

                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="name" value="<?php echo $name; ?>">
    
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password">

                <label for="psw"><b>Confirm Password</b></label>
                <input type="password" placeholder="Confirm Password" name="confirmpassword">
                
                <div class="clearfix">
                    <a href="login.php"><button type="button" class="cancelbtn">Cancel</button></a>
                    <button type="submit" name="submit" class="signupbtn">Sign Up</button>
                </div>
            </div>
            <br>
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