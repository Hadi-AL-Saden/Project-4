<?php
session_start();
$name_regex="/^([a-zA-Z' ]+)$/";
$email_regex="/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
$password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 
$Pnumber_regex="/^\\(?([0-9]{3})\\)?[-.\\s]?([0-9]{3})[-.\\s]?([0-9]{4})?[-.\\s]?([0-9]{4})$/";


if(isset($_POST['sub'])){
$_SESSION['Fname']=$_POST['Fname'];

$_SESSION['Mname']=$_POST['Mname'];

$_SESSION['Lname']=$_POST['Lname'];

$_SESSION['FMname']=$_POST['FMname'];

$_SESSION['Email']=$_POST['Email'];

$_SESSION['Password']=$_POST['Password'];

$_SESSION['Cpassword']=$_POST['Cpassword'];

$_SESSION['Pnumber']=$_POST['Pnumber'];

$_SESSION['date']=$_POST['date'];

$_SESSION['array']=array('');

$_SESSION['date_create']=date("Y-m-d");



//9989/10060<span> &#10060; </sapn>

// **********************************************************************Fname******************************************************************


if(preg_match($name_regex,$_SESSION['Fname'])){
    $Fname_result="<span> &#9989; </sapn> <span style=' color:green'>Correct Name</span>";
    $Fname_correct=true;
}else{
        $Fname_result="<span> &#10060; </sapn><span style=' color:red'>InCorrect Name, your first name should contain letters only</span> ";
        $Fname_correct=false;
    }



    //***********************************************************Middle name check*****************************************************************************



    if(preg_match($name_regex,$_SESSION['Mname'])){
        $Mname_result="<span> &#9989; </sapn> <span style=' color:green'>Correct Name</span> ";
        $Mname_correct=true;
    }else{
        $Mname_result="<span> &#10060; </sapn><span> &#9989; </sapn><span style=' color:red'>InCorrect Name, your middle name should contain letters only</span> ";
        $Mname_correct=false;
    };
       //***********************************************************last name check*****************************************************************************
       if(preg_match($name_regex,$_SESSION['Lname'])){
        $Lname_result="<span style=' color:green'>Correct Name</span> ";
        $Lname_correct=true;
    }else{
        $Lname_result="<span> &#10060; </sapn><span style=' color:red'>InCorrect Name, your last name should contain letters only</span> ";
        $Lname_correct=false;
    };
    //********************************************************Family Name********************************************************************************


    if(preg_match($name_regex,$_SESSION['FMname'])){
        $FMname_result="<span> &#9989; </sapn><span style=' color:green'>Correct Name</span> ";
        $FMname_correct=true;
    }else{
        $FMname_result="<span> &#10060; </sapn><span style=' color:red'>InCorrect Name, your family name should contain letters only</span> ";
        $FMname_correct=false;
    };
    //**************************************************************Email**************************************************************************


    if(preg_match($email_regex,$_SESSION['Email'])){
        $Email_result="<span> &#9989; </sapn><span style=' color:green'>Correct Email</span> ";
        $Email_correct=true;
    }
    else{
        $Email_result="<span> &#10060; </sapn><span style=' color:red'>Incorrect Email</span> ";
        $Email_correct=false;
    };


    //***********************************************************Password*****************************************************************************


    if(preg_match($password_regex,$_SESSION['Password'])){
        $Password_result="<span> &#9989; </sapn><span style=' color:green'>Correct Password</span> ";
        $Password_correct=true;
    }
    else{
        $Password_result="<span> &#10060; </sapn><span style=' color:red'>Incorrect Password, your password shoud have:<br>1- 8 characters at least<br>2- At least one uppercase English letter<br>3- At least one lowercase English letter<br>4- At least one digit<br>5- At least one special character </span>";
        $Paswword_correct=false;
    };
    //**************************************************Confi;rm Password**************************************************************************************



    if(preg_match($password_regex,$_SESSION['Cpassword'])){
        if ($_SESSION['Cpassword'] == $_SESSION['Password']){
            $password_match=true;
            $Cpassword_correct=true;
            $Cpassword_result="<span> &#9989; </sapn><span style=' color:green'>Correct Password</span> <br>";
        }
        else{
            $password_match=false;
            $Cpassword_result="<span> &#10060; </sapn><span style=' color:red'>Password doesn't match</span>";
        };
        
    }
    else{
        $Cpassword_result="<span> &#10060; </sapn>";
        $Cpassword_correct=false;
    };


    //**********************************************************************Phone******************************************************************


    if(preg_match($Pnumber_regex,$_SESSION['Pnumber'])){
        $Pnumber_result="<span> &#9989; </sapn><span style=' color:green'>Correct Phone Number</span> <br>";
        $confirmPhone_correct=true;
    }
    else{
        $Pnumber_result_result="<span> &#10060; </sapn><span style=' color:red'>Incorrect Phone Number, phone number must consist of 14 digits</span> <br>";
        $confirmPhone_correct=false;
    };



    //**********************************************************************Date Of Birth******************************************************************


    if((floor((time() - strtotime($_SESSION['date'])) / 31556926)) >16){
        $date_result="<span> &#9989; </sapn><span style=' color:green'>Your age is greater than 16</span> <br>";
        $confirmdate_correct=true;
    }
    
    else{
        $date_result="<span> &#10060; </sapn><span style=' color:red'>Your age is less than 16</span> <br>";

        $confirmdate_correct=false;

    }
    if(
        $Fname_correct && $Mname_correct && $Lname_correct && $FMname_correct && $Email_correct && $confirmPhone_correct && $confirmdate_correct
    ){
        $_SESSION['array']=array(
            'First Name'=> $_SESSION['Fname'],
            'Middle Name'=> $_SESSION['Mname'],
            'Last Name'=>$_SESSION['Lname'],
            'Family Name'=> $_SESSION['FMname'],
            'Email'=> $_SESSION['Email'],
            'Password'=> $_SESSION['Password'],
            'Password Confirmation'=> $_SESSION['Cpassword'],
            'Phone Number'=> $_SESSION['Pnumber'],
            'Date Of Birth'=>$_SESSION['date']

        );

        header('location:../Login/Login.php');
    }
};


  




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-10">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha3104-1BmE4kWBq710iYhFldvKuhfTAU6auU10tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">  
      <title>Document</title>
</head>
<body>

    <p><h1 style="text-align: center;" >Sign Up ! <img src="https://cdn-icons.flaticon.com/png/512/3506/premium/3506549.png?token=exp=1652022663~hmac=6bdc3b7b2614ff63d4dd7e1b5d32a918" alt=""></h1></p>
    <br>
    <div class="container" >
        <div class=" row">

        <!-- full name form -->
        <div class="col-6 col-sm-4">
        <form method="post">
            
                <label for="Fname"><h3>Fairst Name</h3>  </label>
        <br>
        <input type="text" name="Fname"  placeholder="First Name" class="form-control-lg col-6 col-sm-10" required>
        <?php if(isset($Fname_result)){echo $Fname_result;}?>
        <br><br>
                <label for="Mname"><h3>Middle Name</h3> </label>
        <br>
        <input type="text" name="Mname"   placeholder="Middle Name" class="form-control-lg col-6 col-sm-10" required>
        <?php if(isset($Mname_result)){echo $Mname_result;}?>
        <br><br>
                <label for="Lname"><h3>Last Name </h3></label>
        <br>
        <input type="text" name="Lname"   placeholder="Last Name" class="form-control-lg col-6 col-sm-10" required>
        <?php if(isset($Lname_result)){echo $Lname_result;}?>
        <br><br>
                <label for="FMname"><h3>Family Name </h3> </label>
        <br>
        <input type="text" name="FMname"   placeholder="Family Name" class="form-control-lg col-6 col-sm-10" required>
        <?php if(isset($FMname_result)){echo $FMname_result;}?>
       

</div>
<!-- ********************************************************************************************************************** -->
        
        <div class="col-6 col-sm-4">
         
        
            
                <label for="Email"><h3>Email </h3> </label>
        <br>
        <input type="text" name="Email"  placeholder="EX@ex.com" class="form-control-lg col-6 col-sm-10" required>
        <?php if(isset($Email_result)){echo $Email_result;}?>
        <br><br>
                <label for="Pnumber"><h3> Phone Number</h3> </label>
        <br>
        <input type="text" name="Pnumber"   placeholder="Phone Number" class="form-control-lg col-6 col-sm-10" required>
        <?php if(isset($Pnumber_result)){echo $Pnumber_result;}?>
        <br><br>
                <label for="Password"><h3>Password </h3> </label>
        <br>
        <input type="password" name="Password"   placeholder="Password" class="form-control-lg col-6 col-sm-10" required>
        <?php if(isset($Password_result)){echo $Password_result;}?>
        <br><br>
                <label for="Cpassword"><h3>Confirm Password </h3> </label>
        <br>
        <input type="password" name="Cpassword"   placeholder="Confirm Password" class="form-control-lg col-6 col-sm-10" required>
        <?php if(isset($Cpassword_result)){echo $Cpassword_result;}?>
                
                </div>
<!-- ****************************************************************************************************************************** -->        

<div >
    <br>

<label for="date"><h3>Date Of Birth </h3> </label>
<br>
<input type="date" name="date" class="form-control-lg col-6 col-sm-7" required >
<?php if(isset($date_result)){echo $date_result;}?>
<br><br>
<input type="submit" name="sub" value="submit" class="form-control-lg col-6 col-sm-7 btn btn-outline-light" >
                </form>
                </div>
<!-- ****************************************************************************************************************************** -->    
<div class="have-account" style="color:white;">Already have an account? <a href="../Login/Login.php">Login</a></div>    
        </div>
    </div>
    <br><br>
   
</body>
</html>

