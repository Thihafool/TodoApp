<?php
ob_start();

require '../config/db.php';
session_start();

if(empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])){
  header ('Location: login.php');
}

include ('header.php');

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = $id";

$query = mysqli_query($connection,$sql);

$data = mysqli_fetch_assoc($query);

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['taskId'];

    $updateSql = "UPDATE posts SET title = '$title',content = '$content' WHERE id = $id";

    if(mysqli_query($connection,$updateSql)){

        header('Location: index.php');
    }else {
        echo "error";
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
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="hidden" name = "taskId" value="<?php echo $data['id'] ?>">

                        <input type="text" class="form-control" name="title" value="<?php echo $data['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea class="form-control" name="content" id="" cols="30" rows="10"><?php echo $data['content'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" id="">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name = "update" value="update">
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
    User Image

