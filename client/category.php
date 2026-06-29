<select class="form-control" name="category" id="category" required>
    <option value="" selected disabled>
        Select A Category
    </option>

    <?php
    include(__DIR__ . "/../common/db.php");

    $query = "SELECT * FROM categories";
    $result = $conn->query($query);

    foreach($result as $row){
        $name = ucfirst($row['name']);
        $id = $row['id'];

        echo "<option value='$id'>$name</option>";
    }
    ?>
</select>