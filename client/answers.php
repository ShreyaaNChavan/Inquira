<div class="container">
    <h5>Answers:</h5>

    <?php

    $query = "SELECT answers.*, users.username
              FROM answers
              JOIN users ON answers.user_id = users.id
              WHERE question_id=$qid";

    $result = $conn->query($query);

    foreach ($result as $row) {

        $answer_id = $row['id'];
        $answer = $row['answer'];
        $username = $row['username'];

        // Count Likes
        $countQuery = "SELECT COUNT(*) AS total
                       FROM answer_likes
                       WHERE answer_id=$answer_id";

        $countResult = $conn->query($countQuery);
        $count = $countResult->fetch_assoc()['total'];

        // Check if current user has liked
        $liked = false;

        if (isset($_SESSION['user'])) {

            $uid = $_SESSION['user']['user_id'];

            $check = "SELECT *
                      FROM answer_likes
                      WHERE answer_id=$answer_id
                      AND user_id=$uid";

            $checkResult = $conn->query($check);

            if ($checkResult->num_rows > 0) {
                $liked = true;
            }
        }

        echo "
        <div class='card mb-3 p-3'>

            <h6>$username</h6>

            <p>$answer</p>
        ";

        if (isset($_SESSION['user'])) {

            $buttonClass = $liked ? "btn-primary" : "btn-outline-primary";

            echo "
            <form class='likeForm'>

                <input type='hidden' name='answer_id' value='$answer_id'>

                <input type='hidden' name='question_id' value='$qid'>

                <button type='submit'
                        class='btn btn-sm $buttonClass likeBtn'>

                    👍 Like ($count)

                </button>

            </form>";
        } else {

            echo "<small>👍 Likes : $count</small>";
        }

        echo "</div>";
    }

    ?>

</div>

<script>

document.querySelectorAll(".likeForm").forEach(form => {

    form.addEventListener("submit", function(e){

        e.preventDefault();

        const data = new FormData(this);

        data.append("like_answer", true);

        fetch("./server/requests.php",{

            method:"POST",
            body:data

        })

        .then(res => res.json())

        .then(response => {

            const btn = this.querySelector(".likeBtn");

            // Update Like Count
            btn.innerHTML = "👍 Like (" + response.count + ")";

            // Change Button Color
            if(response.liked){

                btn.classList.remove("btn-outline-primary");
                btn.classList.add("btn-primary");

            }else{

                btn.classList.remove("btn-primary");
                btn.classList.add("btn-outline-primary");

            }

        });

    });

});

</script>