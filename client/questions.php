<div class="container">

    <div class="row">

        <div class="col-8">

            <h1 class="heading">Questions</h1>

            <?php

            include("./common/db.php");

            if (isset($_GET['c-id'])) {

                $category_id = (int) $_GET['c-id'];

                $query = "SELECT * FROM questions
                          WHERE category_id = $category_id";

            } else if (isset($_GET['u-id'])) {

                $uid = (int) $_GET['u-id'];

                $query = "SELECT * FROM questions
                          WHERE user_id = $uid";

            } else if (isset($_GET['latest'])) {

                $query = "SELECT * FROM questions
                          ORDER BY id DESC";

            } else if (isset($_GET['search'])) {

                $search = mysqli_real_escape_string(
                    $conn,
                    $_GET['search']
                );

                $query = "SELECT * FROM questions
                          WHERE title LIKE '%$search%'";

            } else {

                $query = "SELECT * FROM questions";

            }

            $result = $conn->query($query);

            foreach ($result as $row) {

                $title = $row['title'];
                $id = $row['id'];

                echo "
                <div class='row question-list'>
                    <h5 class='my-question text-danger fw-bold'>
                        <a href='?q-id=$id'>
                            $title
                        </a>";

                if (isset($_GET['u-id'])) {
                   
                    echo " 
                    <a class='delete-link' href='./server/requests.php?delete=$id'>
                        Delete
                    </a>";
                }

                echo "
                    </h5>
                </div>";
            }

            ?>

        </div>

        <div class="col-4">
            <?php include('categorylist.php'); ?>
        </div>

    </div>

</div>