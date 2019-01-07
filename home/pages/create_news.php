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
    <h1>Create News</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="?page=dashboard">Home</a></div>
      <div class="breadcrumb-item"><a href="?page=news">News</a></div>
      <div class="breadcrumb-item">Create News</div>
    </div>
  </div>
  <?php
  $msg = $_SESSION['error'];
  if(isset($msg))
   {
         ?>
           <div class="col-md-12">
             <div class="alert alert-danger">
                 <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $msg; ?> !
             </div>
           </div>
         <?php
         unset($_SESSION['error']);
   }
   ?>
  <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="../action/Post.php" method="post" enctype="multipart/form-data">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                  <div class="col-sm-12 col-md-7">
                <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" required>
                      <label class="custom-file-label" for="customFile">Select Image</label>
                    </div>
                  </div>
                </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" onkeypress="return isValidation(event)" name="title" value="" required>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="category">
                    <?php
                    $data = $category->show();
                    foreach ($data as $row) {?>
                      <option value="<?= $row['id']; ?>"><?= $row['title']; ?></option>
                  <?php  }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="content" required></textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <!-- <button class="btn btn-primary">Publish</button> -->
                  <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
