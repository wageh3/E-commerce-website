<?php
    session_start();
    //connect database
   
    include "connect_db.php";
    //include "Functions.php";      
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
        // $BirthDay = $_POST['birth-date'];
        // $gender = $_POST['gender'];
        

      
        if(!empty($user) && !empty($pass)  &&  !is_numeric($user) && !is_numeric($name) && !is_numeric($email)){
              $sql = "INSERT INTO users1 (Name,Username,Email , Password) VALUES ('$name', '$user', '$email' , '$pass' ); ";
              $result = mysqli_query( $db, $sql);
              $_SESSION['name'] = $name;
              $_SESSION['email'] = $email;
              $_SESSION['User_name'] = $user;
              $_SESSION['pass_word'] = $pass;
              // $_SESSION['birthday'] = $BirthDay;
              // $_SESSION['gender'] = $gender;
              header("Location: index.php");
              exit();
           
        }else {
                echo "please enter valid input";      
        }             
    }
    
            
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
                <h2>Register</h2><br>
                <div class="input-box">
                    <sapn class="icon">
                        <ion-icon name="name"></ion-icon>
                    </sapn>
                      <input type="text" name="name" value="" required>
                    <label>Full Name </label>
                </div>
                <div class="input-box">
                    <sapn class="icon">
                        <ion-icon name="username"></ion-icon>
                    </sapn>
                      <input type="text" name="username" value="" required>
                     <label class="label">User name </label>
                </div>
                <div class="input-box">
                    <sapn class="icon">
                        <ion-icon name="email"></ion-icon>
                    </sapn>
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                </div>
               
                <div class="input-box">
                    <sapn class="icon">
                        <ion-icon name="password"></ion-icon>
                    </sapn>
                      <input type="password" name="password" value="" required>
                     <label class="label">NEW Password </label>
                </div>
                <div class="input-box">
                    <sapn class="icon">
                        <ion-icon name="pass"></ion-icon>
                    </sapn>
                      <input type="password" name="confirm-password" value="" required>
                     <label class="label">confirm Password </label>
                </div>
                
                
                <button type="submit">Done</button>
                
            </form>
        </div>
    </div>
</body>

</html>