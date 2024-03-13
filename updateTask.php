<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "todolist";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST["id"];
    $task = $_POST["task"];
    $due_date = $_POST["due-date"];

    $sql = "UPDATE Tasks SET name='$task', due_date='$due_date' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Saved task successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}else{
    echo "Method Not Allowed";
}
?>
<script>
    setTimeout(function() {
        window.location.href = 'tasks.php';
    }, 1000);
</script>