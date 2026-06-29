<div>
    <h1 class="heading">Categories</h1>
    <?php
    include('./common/db.php');

    $query="select * from categories";
    $result = $conn->query($query);
    foreach($result as $row){
        $name= $row['name'];
        $id= $row['id'];
        echo "<div class='row question-list'>
        <h4><a href='?c-id=$id'>$name</a></h4>
        </div>";
    }

    ?>
</div>