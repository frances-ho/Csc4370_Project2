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
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
    
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
    
                <button id="loginBtn" type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember">Remember me
                </label>
            </div>
            <br>
            <span class="createacc">New User? <a href="../php/createlogin.php">Create Account</a></span>
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