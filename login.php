<?php
session_start();
$pageTitle = 'Login';
if(isset($_SESSION['user'])){
    header('Location: index.php');
}
include 'init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //check if user coming from http post request

    $user = $_POST['username'];
    $pass = $_POST['password'];
    $hashedPass = sha1($password);
    
    // check if the user exist in DB

    $stmt = $con->prepare("SELECT  Username, Password
     FROM users 
     WHERE 
         Username = ?
      AND 
         Password = ? ");

    $stmt->execute(array($user , $hashedPass));
    $count = $stmt->rowCount();

    if($count > 0){
        $_SESSION['Username'] = $user; // Register session name
        header('Location: index.php');//Redirect to Dashboard page
        exit();
    }
}

?>
    <div class="container login-page">
    <h1 class="text-center">
        <span class="selected" data-class="login">Login</span> |
        <span data-class="signup">Signup</span>
    </h1>
    <!--Start Login Form-->
	     <form class="login " action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
             <div class="input-container">
            <input 
            class="form-control" 
            type="text" 
            name="username" 
            autocomplete="off" 
            placeholder="Type Your username "
            required />
           </div>
           <div class="input-container">
            <input 
            class="form-control"
             type="password"
              name="password"
               autocomplete="new-password" 
            placeholder="Type Your password "
            required />
            </div>

            <input
             class="btn btn-primary btn-block"
             type="submit" 
             value="Login" />
         </form>  
     <!--End Login Form-->
    <!--Start Signup Form-->

      <form class="signup">
         <div class="input-container">
            <input 
            class="form-control" 
            type="text"
            name="username"
            autocomplete="off" 
            placeholder="Type Your username "
            required />
            </div>

            <div class="input-container">

            <input
             class="form-control"
             type="password" 
             name="password"
             autocomplete="new-password" 
             placeholder="Type a password" 
             required/>
             </div>

        <div class="input-container">
            <input
             class="form-control"
             type="password" 
             name="password2"
             autocomplete="new-password" 
             placeholder="Type a password again" 
             required/>
             </div>

             <div class="input-container">
            <input
             class="form-control" 
            type="email"
             name="email" 
             placeholder="Type a Valid  email " 
             required/>
             </div>
            <input 
             class="btn btn-success btn-block"
             type="submit"
              value="Signup" />
        </form> 
    </div>	 

    <?php include $tpl . 'footer.php'; ?>


