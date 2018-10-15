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
        <form action="php/processlogin.php">
            <div class="container">
                <p id="signupp">Please fill in this form to create an account.</p>
                <hr>
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
    
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                
                <div class="clearfix">
                    <button type="button" class="cancelbtn"><a href="../php/login.php">Cancel</a></button>
                    <button type="submit" class="signupbtn"><a href="#">Sign Up</a></button>
                </div>
            </div>
            <br>
        </form>
    </div> 
    
    <div class="footer">
        <span>Powered By: </span>
            <ul id="icon-list">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>    
</body>
</html>