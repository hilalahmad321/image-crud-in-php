<?php

session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <title>Image Crud</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


    <div class="container mt-5">
        <?php

        if (isset($_SESSION["status"])) {

        ?>
        <div class="alert alert-primary" role="alert">
            <strong><?php echo $_SESSION["status"]; ?></strong>
        </div>
        <?php

            unset($_SESSION["status"]);
        } ?>
        <h1 class="text-center">Image Crud</h1>
        <div class="row">
            <div class="col-md-6 offset-md-2">
                <form action="upload-img.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Enter your name</label>
                        <input type="text" class="form-control" name="name" id="">
                    </div>
                    <div class="form-group">
                        <label for="">upload image</label>
                        <input type="file" class="form-control-file" name="img" id="">
                    </div>
                    <div class="form-group">
                        <button typea="submit" name="upload" class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class=" container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Fetch data from database</h1>
                    </div>
                    <div class="card-body">

                        <?php

                        include "conn.php";

                        $sql = "SELECT * FROM students";
                        $run_sql = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($run_sql) > 0) {
                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Name</td>
                                    <td>image</td>
                                    <td>edit</td>
                                    <td>delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($row = mysqli_fetch_assoc($run_sql)) {
                                    ?>
                                <tr>
                                    <td><?php echo $row["std_id"] ?></td>
                                    <td><?php echo $row["std_name"] ?></td>
                                    <td><img src="<?php echo "upload/" . $row["std_img"] ?>"
                                            alt="<?php echo $row["std_name"] ?>" style="width: 100px; height: 100px;">
                                    </td>
                                    <td> <a name="" id="" class="btn btn-primary"
                                            href="update-img.php?id=<?php echo $row["std_id"] ?>" role="button">edit</a>
                                    </td>
                                    <td> <a name="" id="" class="btn btn-danger"
                                            href="delete-img.php?id=<?php echo $row["std_id"] ?>"
                                            role="button">delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>