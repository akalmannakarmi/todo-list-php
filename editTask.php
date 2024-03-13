<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
<?php
if (isset($_GET["id"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "todolist";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM Tasks WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows==0) {
        echo "Task Doesnt Exists";
    }
    $row = $result->fetch_assoc();
    $conn->close();
}else{
    echo "Require Id";
    ?>
    <script>
        setTimeout(function() {
            window.location.href = 'tasks.php';
        }, 1000);
    </script>
    <?php
}
?>

<form action="updateTask.php" method="post">
    <label for="task">Task:</label>
    <input type="text" name="task" id="task" value="<?php echo $row["name"]; ?>"><br>
    <label for="due-date">Due Date:</label>
    <input type="date" name="due-date" id="due-date" value="<?php echo $row["due_date"]; ?>"><br>
    <button type="submit" name="id" value="<?php echo $id; ?>">Save</button>
</form>
</body>
</html>