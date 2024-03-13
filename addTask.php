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

    $task = $_POST["task"];
    $due_date = $_POST["due-date"];

    $sql = "INSERT INTO Tasks (name, due_date) VALUES ('$task', '$due_date')";

    if ($conn->query($sql) === TRUE) {
        echo "New task added successfully";
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