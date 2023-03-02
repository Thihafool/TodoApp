<?php
ob_start();

require '../config/db.php';
session_start();

if(empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])){
  header ('Location: login.php');
}

?>
      <?php
        include ('header.php');

        if (isset($_POST['submit'])){
            $title = $_POST['title'];
            $content = $_POST['content'];


          //   $image = $_POST['image']['name'];

          //  $file = 'images/'.($_FILES['image'] ['name']);
          //  $imageType = pathinfo($file,PATHINFO_EXTENSION);

          // if ($imageType != 'png' && $imageType != 'jpg' && $imageType != 'jpeg'){
          //   echo "Image must be png";
            
          // }else {
          //   move_uploaded_file($_FILES['image']['tmp_name'],$file);
          // }

          $sql = "INSERT INTO posts (title,content) VALUES ('$title','$content')";
           
          
          if (mysqli_query($connection,$sql)) {
            header('Location: index.php');
        }else {
            echo "query fail";
        }
        }
        ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                <form action="add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" id="">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name = "submit" value="submit">
                        <a href="index.php" type = "button" class="btn btn-secondary">Back</a>
                    </div>
                </form>
                </div>
              </div>
              <!-- /.card -->
  
              
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
           
      
      
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
 