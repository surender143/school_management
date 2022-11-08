<?php
include_once("config.php");
if(isset($_SESSION['isLoggedIn'])== true){
    header("location:dashboard.php");
    }
//require_once("validate-session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/loginform.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section>
        <div class="login">
            <div class="login-img">
                <img src="img/Untitled-1.png" alt="login">
            </div>

            <?php   
            require_once("message.php");
            ?>

            <form action="login.php" method="post">
                <table>
                    <tr>
                        <td>
                            <label for="username"><i class="fa-solid fa-user"></i></label>
                            <input type="text" name="username" placeholder="Username" id="username">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="****"><i class="fa fa-lock"></i></label>
                            <input type="password" name="password" placeholder="****" id="****">
                        </td>
                    </tr>
                </table>
            
                <div class="me">
                    <div class="remember">
                        <input type="checkbox" class="re">Remember me
                    </div>
                    <div class="forget">
                        <p>forget password?</p>
                    </div>
                </div>
                <button type="submit" name="login">LOGIN</button>
            </form>
        </div>
        
    </section>
</body>
</html>