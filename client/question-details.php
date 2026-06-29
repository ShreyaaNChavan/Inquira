<div class="container">
    <h1 class="heading">Question</h1>
    <div class="row">
        <div class="col-8">
            <?php
            include("./common/db.php");
            $query = "select * from questions where id =$qid";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $cid = $row["category_id"];
            echo "<h4 class='margin-bottom-15'>Question: " . $row['title'] . "</h4>";
            echo "<p class='margin-bottom-15'>" . $row['description'] . "</p>";
            include("answers.php");
            ?>
            <!-- <form action="./server/requests.php" method="post">
                <input type="hidden" name="question_id" value="<?php echo $qid ?>">
                <textarea name="answer" class="form-control margin-bottom-15" placeholder="Your answer..."
                    required></textarea>
                <button class="btn btn-primary">Write your answer</button>
            </form> -->

            <?php if (isset($_SESSION['user'])) { ?>

                <form action="./server/requests.php" method="post">
                    <input type="hidden" name="question_id" value="<?php echo $qid ?>">
                    <textarea name="answer" class="form-control margin-bottom-15" placeholder="Your answer..."
                        required></textarea>
                    <button class="btn btn-primary">Write your answer</button>
                </form>
            <?php } else { ?>

                <div class="alert alert-info">
                    Please login to write an answer.
                </div>

            <?php } ?>
        </div>

        <div class="col-4">

            <?php
            //echo $cid;
            //$categoryquery = "select name from questions where category_id=$cid ";
            $categoryQuery = "select name from categories where id=$cid";
            $categoryResult = $conn->query($categoryQuery);
            $categoryRow = $categoryResult->fetch_assoc();
            echo "<h1>" . $categoryRow['name'] . "</h1>";

            $query = "select * from questions where category_id=$cid and id!=$qid";
            $result = $conn->query($query);
            foreach ($result as $row) {
                $id = $row['id'];
                $title = $row['title'];

                echo "<div class='question-list'>
        <h4><a href=?q-id=$id>$title</a></h4>
        </div>";
            }
            ?>
        </div>
    </div>
</div>