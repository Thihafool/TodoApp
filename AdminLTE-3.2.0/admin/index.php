<?php
require '../config/db.php';
session_start();

if(empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])){
  header ('Location: login.php');
}

?>
      <?php
        include ('header.php');
        ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">

                <div class="card-header">
                  <h3 class="card-title">Blog Listings</h3>
                </div>

                <?php
                $sql = "SELECT * FROM posts ORDER BY id DESC";

                $query = mysqli_query($connection,$sql);

                $data = mysqli_fetch_assoc($query);
                // print_r($data);
                ?>
                <!-- /.card-header -->
                <div class="card-body">
                  <div>
                    <a href="add.php" type="button" class="btn btn-sm btn-success mb-3">Create New</a>
                  </div>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <!-- <th style="width: 10px">Id</th> -->
                        <th style="width: 140px">Title</th>
                        <th>Content</th>
                        <th style="width: 40px"  class="text-center">Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>

                       <?php
                     
                          foreach ($query as $key){ ?>
                         
                          <tr>
                            <!-- <td><?php echo  $key['id']  ?></td> -->
                             <td><?php echo  $key['title']  ?></td> 
                             <td><?php echo $key['content']  ?></td> 
                            
                            <td>
                             <div class="btn-group">
                               <div class="container">
                                <a  href="edit.php?id=<?php echo $key['id'] ?>" type ="button" class ="btn btn-sm btn-warning" > Edit</a>
                               </div>
                               <div class="container">
                                <a  href="delete.php?id=<?php echo $key['id'] ?>" onclick="return confirm('Are you sure you want to Remove?');" type ="button" class ="btn btn-sm btn-danger" > Delete</a>
                               </div>
                             </div>
                            </td>
                          </tr>
                            
                          <?php 
                          }
                       ?>

                       </tr>
                    </tbody>
                  </table> <br/>
 
                </div>
                <!-- /.card-body -->
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
  <?php
  include('footer.html');
  ?>
       