<?php

    echo '<div class="container mt-5"><div class="col col-4"><div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Student added successfully...
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div></div>';

    if(isset($_REQUEST['btn_back'])) {
        header("Location: index.php");
    }

?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <div class="col col-5">
                <a href="index.php">
                    <button class="btn btn-secondary">Go Back</button>
                </a>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </body>
</html>
