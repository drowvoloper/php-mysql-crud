<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    } 
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Task updated successfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}

?>

<?php include("includes/header.php") ?>

<div class="col-md-4">
    <div class="card card-body">
        <form action="edit_task.php?id=<?= $id ?>" method="POST">
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Task title" autofocus value="<?= $title ?>">
            </div>
            <div class="form-group">
                <textarea name="description" rows="2" class="form-control" placeholder="Task Description"><?= $description ?></textarea>
            </div>
            <input type="submit" class="btn btn-success btn-block" name="update" value="Update">
        </form>
    </div>
</div>

<?php include("includes/footer.php") ?>