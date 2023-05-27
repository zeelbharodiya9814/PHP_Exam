<?php

    include('config/config.php');

    $config = new Config();

    $fetched_parking_obj = $config->fetch_all_parking();

    if(isset($_REQUEST['btn_add'])) {
        // $name = $_REQUEST['name'];
        // $age = $_REQUEST['age'];
        // $course = $_REQUEST['course'];
        // $image = $_FILES['image'];     // a.array

        // $filename = $image['name'];
        // $temp_path = $image['tmp_name'];


        $name = $_REQUEST['name'];
        $vah_num = $_REQUEST['vah_num'];
        $wing_id = $_REQUEST['wing_id'];
        $florr_id = $_REQUEST['florr_id'];
        $vah_type_id = $_REQUEST['vah_type_id'];
        $price_id = $_REQUEST['price_id'];
        $slot_id = $_REQUEST['slot_id'];


        $res = $config->insert_parking($name, $vah_num, $vah_type_id, $wing_id, $florr_id, $slot_id, $price_id);

        if($res) {
            header("Location: success.php");
        } else {
            echo "Parking insertion failed...";
        }
         

        // $uid = uniqid();

        // $img_name = $uid . "-" . $filename;

        // $destination_path = "uploads/" . $img_name;

        // $isFileUpload = move_uploaded_file($temp_path, $destination_path);  // returns bool

        // if($isFileUpload) {
            // $res = $config->insert_student($name, $age, $course, $img_name);

            // if($res) {
            //     header("Location: success.php");
            // } else {
            //     echo "Student insertion failed...";
            // }
        // } else {
        //     echo "File upload failed...";
        // }
        
    }

    if(isset($_REQUEST['delete_id'])) {
        $delete_id = $_REQUEST['delete_id'];
        
        $res = $config->delete_parking($delete_id);

        if($res == 1) {
            echo "Deleted suucessfull...";
        } else {
            echo "Deletion failed...";
        }
        
    }

    $fetch_single_parking = null;

    if(isset($_REQUEST['edit_id'])) {
        $edit_id = $_REQUEST['edit_id'];

        $obj = $config->fetch_single_parking($edit_id);

        $fetch_single_parking = mysqli_fetch_assoc($obj);

    }

     if(isset($_REQUEST['btn_update'])) {

        $name = $_REQUEST['name'];
        $vah_num = $_REQUEST['vah_num'];
        $wing_id = $_REQUEST['wing_id'];
        $florr_id = $_REQUEST['florr_id'];
        $vah_type_id = $_REQUEST['vah_type_id'];
        $price_id = $_REQUEST['price_id'];
        $slot_id = $_REQUEST['slot_id'];


        $edit_id = $_REQUEST['edit_id'];


        $res = $config->update_parking($name, $vah_num, $vah_type_id, $wing_id, $florr_id, $slot_id, $price_id, $edit_id);
        // $res = $config->update_student($name, $age, $course, $edit_id);

        if($res) {
            echo "Parking info updated...";
        } else {
            echo "Parking info updation failed...";
        }
    }

?>


<html>
    <head>
        <title>Home Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    </head>
    <body>
    





        <div class="container mt-5">
            <div class="col col-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    Name: <input class="form-control" name="name" type="text" value="<?php if($fetch_single_parking!=null) { echo $fetch_single_parking['name']; } ?>" /> <br />
                    Vahical Number: <input class="form-control" name="vah_num" type="text" value="<?php if($fetch_single_parking!=null) { echo $fetch_single_parking['vah_num']; } ?>" /> <br />
                    Wing Number: <input class="form-control" name="wing_id" type="number" value="<?php if($fetch_single_parking!=null) { echo $fetch_single_parking['wing_id']; } ?>" /> <br />
                    Floor Number: <input class="form-control" name="florr_id" type="number" value="<?php if($fetch_single_parking!=null) { echo $fetch_single_parking['florr_id']; } ?>" /> <br />
                    Vahical Type: <input class="form-control" name="vah_type_id" type="number" value="<?php if($fetch_single_parking!=null) { echo $fetch_single_parking['vah_type_id']; } ?>" /> <br />
                    Price: <input class="form-control" name="price_id" type="number" value="<?php if($fetch_single_parking!=null) { echo $fetch_single_parking['price_id']; } ?>" /> <br />
                    Slot: <input class="form-control" name="slot_id" type="number" value="<?php if($fetch_single_parking!=null) { echo $fetch_single_parking['slot_id']; } ?>" /> <br />



                    <button class="btn <?php if(@$_REQUEST['edit_id']) { echo "btn-info"; } else { echo "btn-primary"; } ?>" name="<?php if(@$_REQUEST['edit_id']) { echo "btn_update"; } else { echo "btn_add"; } ?>">
                        <?php if(@$_REQUEST['edit_id']) { echo "UPDATE"; } else { echo "ADD"; } ?>
                    </button>
                </form> 
            </div>

            <div class="col col-6">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Vahical Number</th>
                            <th>Wing Number</th>
                            <th>Floor Number</th>
                            <th>Vahical Type</th>
                            <th>Price</th>
                            <th>Slot</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>



                    <?php while($record = mysqli_fetch_assoc($fetched_parking_obj)) { ?>
                        <tr>
                            <td><?php echo $record['id']; ?></td>
                            <td><?php echo $record['name']; ?></td>
                            <td><?php echo $record['vah_num']; ?></td>
                            <td><?php echo $record['wing_id']; ?></td>
                            <td><?php echo $record['florr_id']; ?></td>
                            <td><?php echo $record['vah_type_id']; ?></td>
                            <td><?php echo $record['price_id']; ?></td>
                            <td><?php echo $record['slot_id']; ?></td>
                            <td>
                                <a href="index.php?edit_id=<?php echo $record['id']; ?>">
                                    <button class="btn btn-warning">EDIT</button>
                                </a>
                            </td>
                            <td>
                                <a href="index.php?delete_id=<?php echo $record['id']; ?>">
                                    <button class="btn btn-danger">DELETE</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    
                    </tbody>
                </table>
            </div>
        </div>       

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </body>
</html>