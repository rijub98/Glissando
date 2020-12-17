<?php
    session_start();

    //  It checks the status and displays it
    if (isset($_GET['status'])) {
        $sta = $_GET['status'];
        echo "<script type='text/javascript'>alert('$sta');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/form.css"/>
    <title>Glissando</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
            <div class="signin-signup">

                <!---------------------------LOGIN STARTS-------------------------------------->
                <form action="../php/login.php" method="POST" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input id="username" name="username" type="text" placeholder="Username" required/>
                    </div>
                    <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" name="password" type="password" placeholder="Password" required/>
                    </div>
                    <input type="submit" value="Login" class="btn solid" />
                </form>
                <!---------------------------LOGIN ENDS--------------------------------------->
                <!---------------------------FORM STARTS-------------------------------------->
                <form action="../php/register.php" method="POST" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i></i>
                        <input id="first_name" name="first_name" type="text" placeholder="First Name" required/>
                    </div>
                    <div class="input-field">
                        <i></i>
                        <input id="last_name" name="last_name" type="text" placeholder="Last Name" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input id="username" name="username" type="text" placeholder="Username" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input id="email" name="email" type="email" placeholder="Email" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password" name="password" type="password" placeholder="Password" required/>
                    </div>
                        <input type="submit" class="btn" value="Sign up" />
                </form>
                <!---------------------------FORM ENDS--------------------------------------->
            </div>
        </div>

      <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3>
                    <p>Sign Up and Experience the world of Music</p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>
                <img class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us?</h3>
                    <p>Welcome</p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>
                <img class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="../js/app.js"></script>
  </body>
</html>
