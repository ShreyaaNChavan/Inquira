<?php
session_start();

include("../common/db.php");

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    //$password = $_POST['password'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];


    $user = $conn->prepare("Insert into `users` 
(`id`,`username`,`email`,`password`,`address`) 
values(NULL,'$username','$email','$password','$address');
");

    $result = $user->execute();
    $user->insert_id;

    if ($result) {
        // echo "New user registered";
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
        header("location: /discuss");
    } else {
        echo "<div class='alert alert-warning'>
            New user is not registered.
          </div>";
        header("location: /discuss?login=true&error=user");

    }

} else if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $username = "";
    $user_id = 0;

    $query = "SELECT * FROM users WHERE email='$email'";

    $result = $conn->query($query);

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {

            $username = $row['username'];
            $user_id = $row['id'];

            $_SESSION["user"] = [
                "username" => $username,
                "email" => $email,
                "user_id" => $user_id
            ];

            header("location: /discuss");

        } else {

            echo "Wrong Password";
        }

    } else {

        //echo "User not registered";
        echo "<div class='alert alert-warning'>
            New user is not registered.
          </div>";
        header("location: /discuss?login=true&error=user");


    }


} else if (isset($_GET['logout'])) {
    session_unset();
    header("Location:/discuss");
} else if (isset($_POST['ask'])) {
    // print_r($_POST);
    // print_r($_SESSION);


    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];


    $question = $conn->prepare("Insert into `questions` (`id`,`title`,`description`,`category_id`,`user_id`) VALUES
    (NULL,'$title','$description','$category_id','$user_id');");

    $result = $question->execute();
    $question->insert_id;

    if ($result) {
        header("location: /discuss");
    } else {
        echo "Question is added to website ";
    }
}
//  else if (isset($_POST["answer"])) {
//     $answer = $_POST['answer'];
//     $question_id = $_POST['question_id'];
//     $user_id = $_SESSION['user']['user_id'];

//     $query = $conn->prepare("Insert into `answers` 
//     (`id`, `answer`, `question_id`, `user_id`) 
//     values(NULL, '$answer', '$question_id', '$user_id');
//     ");

//     $result = $query->execute();
//     if ($result) {
//         header("location: /discuss?q-id=$question_id");
//     } else {
//         echo "Answer is not submitted";
//     }
// } 
// 
else if (isset($_POST["answer"])) {

    if (!isset($_SESSION['user'])) {
        header("location: /discuss?login=true");
        exit();
    }

    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];

    $query = $conn->prepare("INSERT INTO answers
    (id, answer, question_id, user_id)
    VALUES
    (NULL, '$answer', '$question_id', '$user_id')");

    $result = $query->execute();

    if ($result) {
        header("location: /discuss?q-id=$question_id");
    } else {
        echo "Answer is not submitted";
    }
} else if (isset($_POST['like_answer'])) {

    if (!isset($_SESSION['user'])) {
        exit();
    }

    $answer_id = $_POST['answer_id'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];

    $check = "SELECT * FROM answer_likes
              WHERE answer_id=$answer_id
              AND user_id=$user_id";

    $result = $conn->query($check);

    if ($result->num_rows > 0) {

        $conn->query("DELETE FROM answer_likes
                      WHERE answer_id=$answer_id
                      AND user_id=$user_id");

        $liked = false;

    } else {

        $conn->query("INSERT INTO answer_likes(answer_id,user_id)
                      VALUES($answer_id,$user_id)");

        $liked = true;
    }

    // Get updated like count
    $countQuery = "SELECT COUNT(*) as total
                   FROM answer_likes
                   WHERE answer_id=$answer_id";

    $count = $conn->query($countQuery)->fetch_assoc()['total'];

    echo json_encode([
        "liked" => $liked,
        "count" => $count
    ]);

    exit();
} elseif (isset($_GET['c-id'])) {
    echo $cid = $_GET['c-id'];
    include('../client/questions.php');

} elseif (isset($_GET['u-id'])) {
    echo $uid = $_GET['u-id'];
    include('../client/questions.php');

} elseif (isset($_GET["delete"])) {
    echo $qid = $_GET["delete"];
    $query = $conn->prepare("delete from questions where id =$qid");
    $result = $query->execute();
    if ($result) {
        header("location: /discuss");
    } else {
        echo "Question not deleted";
    }
}
?>