<?php
session_start();

if (isset($_POST['submit'])){
    
    $_SESSION['loginEmail']=$_POST['Email'];
    $_SESSION['loginPassword']=$_POST['Password'];

    foreach ($_SESSION['array'] as $key => $value) {

        //*******************************************Check Email*********************************************************
        if($key == 'Email'){
            if($_SESSION['loginEmail']==($value)){
                $loginEmail_result="<span style=' color:green'>Correct Email</span><br>";
                $loginEmail_correct=true;
            }else{
                $loginEmail_result="<span style=' color:red'>Incorrect Email</span><br>";
                $loginEmail_correct=false;
            }
        }
        //*******************************************Check Password*******************************************************
        if($key == 'Password Confirmation'){
            if($_SESSION['loginPassword']==$value){
                $loginPassword_result="<span style=' color:green'>Correct Password</span><br>";
                $loginPassword_correct=true;
            }else{
                $loginPassword_result="<span style=' color:red'>Incorrect Password</span><br>";
                $loginPassword_correct=false;
            }
        }
    }



    if($loginEmail_correct && $loginPassword_correct)
        header('location:../Welcome/Welcom.php');
    else
    echo '<script language="javascript">';
    echo 'alert("Incorrect Information")'; 
    echo '</script>';
     

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../SingUp/style.css">
    
</head>
<body>
    <div class="container">
        <div></div>
        <form method="post" >
            <div>
                <h1 class="text-center">Login !<img src="https://cdn-icons.flaticon.com/png/512/3506/premium/3506549.png?token=exp=1652022663~hmac=6bdc3b7b2614ff63d4dd7e1b5d32a918" alt=""></h1>
<!-- **************************************************************************************************** -->
                <label for="loginEmail">Email:</label>
                <br>
               
                <input type="email" name="Email"  class="form-control"  placeholder="Ex@ex.com"class="form-control-lg col-8 col-sm-4" required>
                <?php if(isset($Email_result)){echo $Email_result;}?>
                <br>
<!-- **************************************************************************************************** -->

                <label for="loginPassword">Password:</label>
                <br>

                <input type="password" name="Password" id="loginPassword" class="form-control"  placeholder="Password" required>
                <?php if(isset($Password_result)){echo $Password_result;}?>
                
                <br>
<!-- **************************************************************************************************** -->

                <input type="submit" value="Submit" name="submit"class="form-control-lg col-6 col-sm-7 btn btn-outline-light">


                <div style="color:white;">Don't have an account? <a href="../SingUp/SignUp.php">Sign Up</a></div>

            </div>
        </form>
    </div>
</body>
</html>