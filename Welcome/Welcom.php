<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" href="../SingUp/style.css">
    <title>Document</title>
    <style>
        #tt{
            border: 3px white solid;
    border-radius: 10px;
    margin-left: 600px;
        }

    </style>
</head>
<body>
    <p><h1 style="text-align: center;"  >welcome ! <img src="https://cdn-icons.flaticon.com/png/512/3506/premium/3506549.png?token=exp=1652022663~hmac=6bdc3b7b2614ff63d4dd7e1b5d32a918" alt=""> </h1></p>

<p><h3 style="color:white;margin-left: 584px;    margin-top: 50px;"><?php echo$_SESSION['firstName']." ".$_SESSION['middleName']." ".$_SESSION['lastName']." ".$_SESSION['familyName']; ?></h3></p>


    <table class="table-light"style="color:white;" id="tt" >
        <thead  >
        <tr>
            <td>
                Your Email is : <?php echo $_SESSION['Email']; ?>
            </td>
            </tr>
            <tr>
                 <td>
                Phon number : <?php echo $_SESSION['Pnumber']; ?></p>
            </td>
            </tr>
           
             
           <tr>
              <td>
                Password : <?php echo $_SESSION['Password']; ?></p>
            </td> 
           </tr>
            
       

        </thead>
<tbody>

    
</tbody>

    </table>




</body>
</html>