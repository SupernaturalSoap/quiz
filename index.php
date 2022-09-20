<!DOCTYPE html>
<html>
    <head>
        <title> LOGIN </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form action="login.php" method="post">
            <h2> LOGIN TO PLAY QUIZ </h2>

            <?php if(isset($_GET['error'])) { ?>
                <p class="error"> <?php echo $_GET['error'];?> </p>
            <?php } ?>
            <?php if(isset($_GET['success'])) { ?>
                <p> <?php echo $_GET['success'];?> </p>
            <?php } ?>
            <?php if(isset($_GET['email']) && $_GET['email'] == 1) {?>
                <label> Email Id </label>
                <input type="text" name="email" placeholder="Email">
                <a href="index.php?email=0">Login by User Id</a><br>
            <?php } else  {?>
                <label> User Id </label>
                <input type="text" name="uid" placeholder="User Id">
                <a href="index.php?email=1">Login by Email</a><br>
            <?php }?>
            <label> Password </label>
            <input type="password" name="password" placeholder="Password"><br>

            <button type="submit"> Login </button>
            <a href="signup.php">SignUp</a>
            </body>

    </body>
</html>