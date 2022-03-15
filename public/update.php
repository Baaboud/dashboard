<?php 

    require_once("connection.php"); 

    if(isset($_POST['update'])) 
    {
        $gataID = $_GET['ID'];
        $gataName = $_POST['cate-name'];
        $gataDes = $_POST['cate-description'];

        $query = " update category set name = '".$gataName."', description='".$gataDes."' where id='".$gataID."'";// this query for update table category
        $result = mysqli_query($con,$query);

        if($result)//check query 
        {
            header("location:view.php");// If ture redirct to view.php
        }
        else
        {
            echo ' Please Check Your Query '; // if false will print error message
        }
    }
//update product
    else if(isset($_POST['updateProduct']))
    {
        $proID = $_GET['ID'];
        $proName = $_POST['pro-name'];
        $proDes = $_POST['pro-des'];
        $price = $_POST['price'];
        $gata = $_POST['category'];
        $image=$_FILES['image']['name'];

        $file_path="../public/upload/"; //this path for storge image
        $filePart=explode(".",$image);
        $ex=end($filePart);
        $file_ex=["png","jpg"];
        if(in_array($ex,$file_ex)){
            $newName=time().".".$ex;
            move_uploaded_file($_FILES["image"]["tmp_name"],$file_path.$newName);


        $query2="update product set name ='".$proName."', description='".$proDes."', price ='".$price."', img ='".$newName."', category ='".$gata."' where id='".$proID."'"; //this query for update table products
        $result2=mysqli_query($con,$query2);

        if($result2)
        {
            header("location:view.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }

    }
   }


    else
    {
        header("location:view.php");
    }


?>