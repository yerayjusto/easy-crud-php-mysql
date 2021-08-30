<?php

    include('db.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM tasks WHERE id = $id";
        $res = mysqli_query($connect, $query);
        if (!$res) {
            die("Failed");
        }
        $_SESSION['msg'] = 'Task removed succesfully!';
        $_SESSION['msg_type'] = 'danger';
        header("Location: index.php");
    }
