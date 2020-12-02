<?php

include("db.php");

if (isset($_POST['save-task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    //echo $title . " " . $description;

    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed");
    }

    //echo "Saved";

    $_SESSION['message'] = 'Task saved successfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}

?>