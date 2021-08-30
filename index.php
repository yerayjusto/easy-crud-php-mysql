<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-5">
    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['msg'])) { ?>
                <div class="alert alert-<?= $_SESSION['msg_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['msg'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="new_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="new_task" value="SAVE">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * from tasks";
                    $res_tasks = mysqli_query($connect, $query);

                    while ($row = mysqli_fetch_array($res_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['created_at'] ?></td>
                            <td class="text-center">
                                <a href="edit_task.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="del_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </td>

                        </tr>


                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>