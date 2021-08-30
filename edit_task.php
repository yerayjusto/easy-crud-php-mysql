<?php

include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM tasks WHERE id = $id";
    $res = mysqli_query($connect, $query);

    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_array($res);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = "UPDATE tasks set title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($connect, $query);
    $_SESSION['msg'] = 'Task updated succesfully!';
    $_SESSION['msg_type'] = 'info';
    header("Location: index.php");
}

?>

<?php include('includes/header.php'); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Title update">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Description update"><?php echo $description; ?></textarea>
                    </div>
                    <button class="btn btn-success btn-block" name="update">
                        UPDATE
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>