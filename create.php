<?php
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_name = trim($_POST["name"]);
    $input_address = trim($_POST["address"]);
    $input_salary = trim($_POST["salary"]);
    
      if($_FILES['image'])
      {
        $image = $_FILES['image']['name'];
        $path = "public/images".$image;
        $upload = move_uploaded_file($_FILES['image']['tmp_name'],$path);
      }

        $sql = "INSERT INTO employees (name, address, salary) VALUES ('$input_name', '$input_address', '$input_salary')";
        $query=mysqli_query($db,$sql);
        if($query)
        {
            echo "Data Inserted";
        }else{
            echo "Record Not Insert";
        }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="create.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>