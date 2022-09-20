<!DOCTYPE html>
<html>
    <head>
        <title> LOGIN </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form action="register.php" method="post">
            <h2> SIGNUP </h2>

            <?php if(isset($_GET['error'])) { ?>
                <p class="error"> <?php echo $_GET['error'];?> </p>
            <?php } ?>
            <label> First Name </label>
            <input type="text" name="uname" placeholder="First Name"><br>
            <label> Email </label>
            <input type="text" name="email" placeholder="Email"><br>
            <label> Password </label>
            <input type="password" name="password" placeholder="Password"><br>

            <button type="submit"> SignUp </button>
            </body>

    </body>
</html>