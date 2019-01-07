<?php
session_start();
include_once '../action/config.php';
include_once '../action/Category.php';
if(!$user->logged())
{
$user->redirect('../login.php');
}
 ?>
 <section class="section">
   <div class="section-header">
     <h1>Category</h1>
     <div class="section-header-breadcrumb">
       <div class="breadcrumb-item active"><a href="?page=dashboard">Home</a></div>
       <div class="breadcrumb-item">Category</div>
     </div>
   </div>

   <?php
   $msg = $_SESSION['message'];
   if(isset($msg))
    {
          ?>
            <div class="col-md-12">
              <div class="alert alert-success">
                  <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $msg; ?> !
              </div>
            </div>
          <?php
          unset($_SESSION['message']);
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
                  <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#create">Create</button>
                </div>
                <br>
                <table class="table table-striped" id="category_table">
                  <thead>
                      <tr>
                        <th width="1%" class="text-center">No</th>
                        <th width="60%">title</th>
                        <th width="15%" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <?php
                    $data = $category->show();
                    $no = 1;
                    foreach ($data as $row) {
                     ?>
                    <tbody>
                      <tr>
                        <td align="center">
                          <?= $no ?>
                        </td>
                        <td><?= $row['title'];  ?></td>
                        </td>
                        <td align="center">
                          <button data-toggle="modal" data-target="#update<?= $row['id']; ?>" class="btn btn-warning"> <i class="fas fa-pencil-alt"></i> </button>
                          <button data-toggle="modal" data-target="#delete<?= $row['id']; ?>" class="btn btn-danger"> <i class="far fa-trash-alt"></i> </button>
                        </td>
                      </tr>
                    </tbody>
                    <?php
                    $no++;
                  }
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
<?php foreach ($data as $row): ?>
  <div class="modal fade" tabindex="-1" role="dialog" id="delete<?= $row['id']; ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="" action="../action/Category.php" method="post">
              <div class="modal-body">
                  <div class="form-group">
                    <h6><label>Are you sure delete category <?= $row['title']; ?> ? </label></h6>
                  </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                  <input type="hidden" name="category" value="<?= $row['id']; ?>">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" tabindex="-1" role="dialog" id="update<?= $row['id']; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form class="" action="../action/Category.php" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                       <label>Title</label>
                         <input type="text" name="title" class="form-control" required="" value="<?= $row['title']; ?>">
                         </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="hidden" name="category" value="<?= $row['id']; ?>">
                      <input type="submit" class="btn btn-primary" name="update" value="Update">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

<?php endforeach; ?>
 <div class="modal fade" tabindex="-1" role="dialog" id="create">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title">Create Category</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <form class="" action="../action/Category.php" method="post">
             <div class="modal-body">
                 <div class="form-group">
                  <label>Title</label>
                    <input type="text" name="title" class="form-control" required="">
                    </div>
               </div>
               <div class="modal-footer bg-whitesmoke br">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <input type="submit" class="btn btn-primary" name="save" value="Save">
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
