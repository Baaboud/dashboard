<?php 
  require_once("../connection.php");
// This  insert for category
  if(isset($_POST))
  {
      if(empty($_POST['cate-name']) || empty($_POST['cate-description']) ) // For make sure that post value is not empty
      {
          echo ' Please Fill in the Blanks ';
      }
      else
      {
          $gataName = $_POST['cate-name'];
          $gataDes = $_POST['cate-description'];
         

          $query = " insert into category (name,description) values('$gataName','$gataDes')";// Query for insert value to category table category
          $result = mysqli_query($con,$query);

          if($result)
          {
              header("location:../view.php"); // If true redirct to view.php
          }
          else
          {
              echo '  Please Check Your Query '; // meagge if query error
          }
      }
  }
  else
  {
      header("location:../index.php"); // if not requst redirct to index.php
  }
?>