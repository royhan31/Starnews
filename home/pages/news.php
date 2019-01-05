<?php
session_start();
include_once '../action/config.php';
// include_once '../action/Category.php';
 ?>
 <section class="section">
   <div class="section-header">
     <h1>News</h1>
     <div class="section-header-breadcrumb">
       <div class="breadcrumb-item active"><a href="?page=dashboard">Home</a></div>
       <div class="breadcrumb-item">News</div>
     </div>
   </div>
   <?php
   $msg = $_SESSION['success'];
   if(isset($msg))
    {
          ?>
            <div class="col-md-12">
              <div class="alert alert-success">
                  <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $msg; ?> !
              </div>
            </div>
          <?php
          unset($_SESSION['success']);
    }
    ?>
   <div class="section-body">
     <div class="row">
       <div class="col-12">
         <div class="card">
           <div class="card-body">
             <div class="container box">
              <div class="table-responsive">
                <div align="right">
                  <a href="?page=create_news" class="btn btn-info btn-lg">Create</a>
                </div>
                <br>
                <table class="table table-striped" id="post_table">
                        <thead>
                          <tr>
                            <th width="1%" class="text-center">No</th>
                            <th width="20%">title</th>
                            <th width="15%">Category</th>
                            <th width="10%" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <?php
                        $data = $post->show();
                        $no = 1;
                        foreach ($data as $row) {?>
                        <tbody>
                          <tr>
                            <td align="center">
                              <?= $no ?>
                            </td>
                            <td><?= $row['title']; ?></td>
                            <td><?= $row['category']; ?></td>
                            <td align="center">
                              <button data-toggle="modal" data-target="#detail" class="btn btn-success"> <i class="far fa-eye"></i> </button>
                              <button data-toggle="modal" data-target="#update" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                              <button data-toggle="modal" data-target="#delete" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </td>
                          </tr>
                        </tbody>
                      <?php }
                       ?>
                      </table>
              </div>
            </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
