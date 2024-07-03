<?php
      session_start();
     //connect database
    include "connect_db.php";
  //  include "Functions.php";
          
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $email = $_POST['email'];
        $pass = $_POST['password'];
         $sql = "SELECT * FROM users WHERE Email = '$email';";
    
  if(!empty($email) && !empty($pass) &&  !is_numeric($email)){

              $result = mysqli_query($db, $sql);
              if($result && mysqli_num_rows($result) > 0){
              $userdata = mysqli_fetch_assoc($result);
      
                if($userdata['Password'] == $pass){
                        ///set for the session
                    $_SESSION['name'] = $userdata['Name'];
                    $_SESSION['email'] = $userdata['Email'];    
                    $_SESSION['User_name'] = $userdata['UserName'];
                    $_SESSION['pass_word'] = $userdata['Password'];
                    $_SESSION['birthday'] = $userdata['BirthDay'];
                    $_SESSION['gender'] = $userdata['Gender'];

                    header("Location: index.php");
                    
                }else {
                    echo "invalid password ";
                }
                  
              }else {
                echo "invalid username ";
              }
        }

        else {
                echo "please enter valid input";      
        }             
    }
    //check if the data exist in database
    




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>

    <div class="wrapper">
        <div class="login-box">
            <form class="login2" method="POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
                <h2>login</h2>
                <div class="input-box">
                    <sapn class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </sapn>
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="locked-clossed"></ion-icon>
                    </span>
                    <input type="password"  name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="remember-forgot">
                    <label for=""><input type="checkbox" name="remember-me">Remember me</label>
                    <a href="#">Forgot password</a>
                </div>
                <button type="submit">login</button>
                <div class="register-link">
                    <p>Dont have an account?<a href="signup.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>