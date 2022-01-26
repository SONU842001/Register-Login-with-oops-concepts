<?php

require_once("config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");
$account = new Account($con);

if(isset($_POST["submit"]))
{
    
    $username = FormSanitizer::sanitizeFormUsername($_POST["userName"]);
    $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
    
    
   $success = $account->login($username, $password);

   if($success){

       $_SESSION["userLoggedIn"] = $username;
       header("Location: index.php");
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to clone</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
    <div class="signInContainer">
        <div class="column">

           <div class="header">
           <img src="assets/images/clone.png" alt="png image">
               <h3>Sign In</h3>
               <span>to continue to Clone</span>
               
           </div>
           
           

            <form action=" " method="POST">
                
                <?php echo $account->getError(Constants::$loginFailed); ?>
                <input type="text" name ="userName"placeholder="User Name" required>
                
                
                <input type="password" name ="password"placeholder="Password"required>

                <input type="submit" name ="submit" value="SUBMIT">


            </form>
            <a href="register.php" class="signInMessage">Need an account? Sign up here!</a>
        </div>
    </div>
      

      
</body>
</html>