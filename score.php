<!DOCTYPE html>
<html>
    <head>
        <title> Quiz Score Board</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<?php
session_start();
include "db.php";
if($_POST['submit']) {
    
    $query_question = "SELECT * FROM quiz_questions";
    $result_ques = mysqli_query($conn, $query_question);
    
    $total_questions = mysqli_num_rows($result_ques);
    $correct = 0;
    $total = $total_questions;

    foreach($result_ques as $value):

        if(isset($_POST[$value['Question_id']])) {
            $answer = $_POST[$value['Question_id']];
            echo "<h2>Question : ".$value['Question_Text']."</h3>";
            if($answer == $value['Correct_Option']) {
                $correct++;
                echo "Your Answer : ".$answer."</br>";
                echo "Correct Answer : ".$value['Correct_Option']."</br>";
            } else {
                echo "Your Answer : ".$answer."</br>";
                echo "Correct Answer : ".$value['Correct_Option']."</br>";
            }
        }

    endforeach;

    echo "</br></br><h1>Total Question : ". $total."</h1>";

    $incorrect = $total - $correct;

    echo "</br></br><h1>Your Score    :".$correct."</h1>";
    echo "Correct     :". $correct."</br>";
    echo "Incorrect   :".$incorrect;

}
?>
    <body>
        <h1>Hello <?php echo $_SESSION['username']?>, Do you want to replay?</h1>
        <a href="quiz.php">Replay</a>
    </body>
</html>