<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
</head>
<body>
    hello
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "todolist";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM Tasks";

    $result = $conn->query($sql);
    $conn->close();

    ?>
    <header>
        <h2>Tasks(<?php echo $result->num_rows ?>):</h2>
    </header>
    <main>
        <?php if ($result->num_rows > 0) { ?>
            <ol>
                <?php while($row = $result->fetch_assoc()) {?>
                <li>
                    <?php echo $row["name"] ?>
                    <?php echo $row["due_date"] ?>
                    <a href="updateTask.php?id=<?php echo $row["id"] ?>">Edit</a>
                    <a href="removeTask.php?id=<?php echo $row["id"] ?>">Delete</a>
                </li>
                <?php }?>
            </ol>
        <?php }?>
    </main>
    <footer>
        <form action="addTask.php" method="post">
            <label for="task">Task:</label>
            <input type="text" name="task" id="task"><br>
            <label for="due-date">Due Date:</label>
            <input type="date" name="due-date" id="due-date"><br>
            <button type="submit">Add</button>
        </form>
    </footer>
</body>
</html>