<?php include "../config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Manage Admissions Admin Panel | An application for Coaching</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php include "admin_header.php";?>

    <div class="bg-success text-white px-5 py-3">
        <h2>Admin / Admissions</h2>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                <?php include "sidebar.php";?>
            </div>

            <div class="col-9">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Roll</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $callingData = callingData("students","status='0'");
                        foreach($callingData as $value):
                        ?>

                        <tr>
                            <td><?= $value['roll'];?></td>
                            <td><?= $value['name'];?></td>
                            <td><?= $value['contact'];?></td>
                            <td><?= $value['email'];?></td>
                            <td><?= $value['gender'];?></td>
                            <td>
                                <div class="button-group">
                                    <a href="?approve=<?= $value['roll'];?>" class="btn btn-success">approve</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                    <a href="" class="btn btn-info">Edit</a>

                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            
             
        </div>
    </div>

   
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


<?php

    if(isset($_GET['approve'])){
        $roll = $_GET['approve'];

        if(approveStudent($roll)){
            redirect('manage_students.php');
        }
    }

?>