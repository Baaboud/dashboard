<?php
require_once("connection.php"); //For connection database
$query = " select * from category "; //Query to select all data about category
$query2 = " select * from product "; //Query to select all data about products
$result = mysqli_query($con, $query);
$result2 = mysqli_query($con, $query2);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css" />
    <title>View Records</title>
</head>

<body class="bg-light">
    <?php
    require_once("nav.php")
    ?>

    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <!--for display category inside the table-->
                    <table class="table table-bordered">
                        <h1 class="text-white bg-dark text-center p-2 ">Category</h1>
                        <tr class="fs-4 text-center">
                            <th> ID </th>
                            <th> category Name </th>
                            <th> description </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>

                        <?php
                        //Display gatagory from database
                        while ($row = mysqli_fetch_assoc($result)) {
                            $gataID = $row['id']; // this coulmn name from database
                            $gataName = $row['name'];
                            $gataDes = $row['description'];

                        ?>
                            <tr class="fs-4 text-center text-">
                                <td><?php echo $gataID ?></td>
                                <td><?php echo $gataName ?></td>
                                <td><?php echo $gataDes ?></td>
                                <td><a class="btn btn-dark w-100" href="edit.php?GetID=<?php echo $gataID ?>">Edit</a></td>
                                <td><a class="btn btn-dark w-100" href="delete.php?Del=<?php echo $gataID ?>">Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>


                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <!--for display products inside the table-->
                    <table class="table table-bordered text-center fs-4">
                        <h1 class="text-white bg-dark text-center p-2 ">Products</h1>
                        <tr class="fs-4">
                            <th> ID </th>
                            <th> product Name </th>
                            <th> category </th>
                            <th> description </th>
                            <th> price </th>
                            <th> image </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>

                        <?php

                        //Display products from database
                        while ($row = mysqli_fetch_assoc($result2)) {
                            $proID = $row['id']; // this coulmn name from database
                            $proName = $row['name'];
                            $proDes = $row['description'];
                            $price = $row['price'];
                            $proImage = $row['img'];
                            $gata = $row['category'];


                        ?>
                            <tr>
                                <td><?php echo $proID ?></td>
                                <td><?php echo $proName ?></td>
                                <td><?php echo $gata ?></td>
                                <td><?php echo $proDes ?></td>
                                <td><?php echo $price ?></td>
                                <td><img src="../public/upload/<?php echo $proImage ?>" alt="" height=50px width=50px></td>
                                <td><a class="btn btn-dark w-100" href="edit-pro.php?GetID=<?php echo $proID ?>">Edit</a></td>
                                <td><a class="btn btn-dark w-100" href="delete.php?DelID=<?php echo $proID ?>">Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>


                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>