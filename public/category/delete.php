<?php
require_once('../connection.php');
if(isset($_GET))
         {
             $gataId = $_GET['Del'];
             $query = " delete from category where id = '".$gataId."'"; // this query for delete record from table category
             $result = mysqli_query($con,$query);
             if($result)
             {
                 header("location:../view.php");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         ?>