<?php

include('db.php');

if (isset($_POST['new_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = "INSERT INTO tasks(title, description) VALUES ('$title', '$description')";
    $res = mysqli_query($connect, $query);
    if (!$res) {
        die('Failed');
    }

    $_SESSION['msg'] = 'Task saved succesfully!';
    $_SESSION['msg_type'] = 'success';

    header("Location: index.php");
}
