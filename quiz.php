<?php
session_start();
include "db.php";

    $query_question = "SELECT * FROM quiz_questions";
    $result_ques = mysqli_query($conn, $query_question);
    $count = 0;
    if(mysqli_num_rows($result_ques)) {
        $count = 1;
    }

if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($count)) {
    ?>

    <!DOCTYPE html>
    <html>
            <head>
                <title> QUIZ </title>
                <link rel="stylesheet" type="text/css" href="style.css">
            </head>
            <body>
            <div class="container">
                <?php if(isset($_GET['error'])) { ?>
                    <p class="error"> <?php echo $_GET['error'];?> </p>
                <?php } else {?> 
                    <h1>Hello, <?php echo $_SESSION['username'];?>. Welcome to the QUIZ.</h1>
                    <a href="logout.php">Logout</a>

                    <form action="score.php" method ="post">
                    
                    <?php foreach($result_ques as $value):?>

                        <div class="form-group">
                        <h3><?php echo $value['Question_Text']; ?> </h3>
                            <ol>
                                <li>
                                    <input type="radio" name="<?php echo $value['Question_id'];?>" value="<?php echo $value['Option_A'];?>" /><?php echo strtoupper($value['Option_A']);?>
                                </li>
                                <li>
                                    <input type="radio" name="<?php echo $value['Question_id'];?>" value="<?php echo $value['Option_B'];?>" /><?php echo strtoupper($value['Option_B']);?>
                                </li>
                                <li>
                                    <input type="radio" name="<?php echo $value['Question_id'];?>" value="<?php echo $value['Option_C'];?>" /><?php echo strtoupper($value['Option_C']);?>
                                </li>
                                <li>
                                    <input type="radio" name="<?php echo $value['Question_id'];?>" value="<?php echo $value['Option_D'];?>" /><?php echo strtoupper($value['Option_D']);?>
                                </li>
                            </ol>
                        </div>
                        

                    <?php endforeach; ?>
                    <div class="form-group">
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary"/>
                    </div>
                    </form>
                <?php }?>
            </div>
            </body>
    </html>
<?php
} else {
    if(isset($_SESSION['id']) && isset($_SESSION['username']) && !isset($_SESSION['questions'])) {
        header("Location: index.php?error=No questions available right now. Please come back later.");
        exit();
    } else {
        header("Location: index.php?error=Please login first to play the quiz.");
        exit();
    }
}
?>