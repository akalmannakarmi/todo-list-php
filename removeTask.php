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

    $sql = "DELETE FROM Tasks WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Task Deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}else{
    echo "Require Id";
}
?>
<script>
    setTimeout(function() {
        window.location.href = 'tasks.php';
    }, 1000);
</script>