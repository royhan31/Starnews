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
    <h1>Update News</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="?page=dashboard">Home</a></div>
      <div class="breadcrumb-item"><a href="?page=news">News</a></div>
      <div class="breadcrumb-item">Update News</div>
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
              <?php
              $id = $_GET['id'];
              $slug = $_GET['slug'];
              $data = $post->edit($id,$slug);
              foreach ($data as $row){ ?>
              <form action="../action/Post.php" method="post" enctype="multipart/form-data">
                <div class="form-group row mb-12">
                  <div class="col-sm-12 col-md-12 text-center">
                    <img align="middle" src="../assets/img/<?= $row['image']; ?>" style="width:60%;height:auto" alt="">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                  <div class="col-sm-12 col-md-7">
                <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" value="../assets/img/<?= $row['image']; ?>">
                      <label class="custom-file-label" for="customFile">Select Image</label>
                    </div>
                  </div>
                </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="title" value="<?= $row['title'];  ?>" required>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="category">
                    <?php
                    $data = $category->show();
                    foreach ($data as $category) {?>
                      <option value="<?= $category['id']; ?>"
                        <?php if ($category['id'] == $row['category_id']): ?>
                          selected
                        <?php endif; ?>>
                        <?= $category['title']; ?></option>
                  <?php  }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="content" required> <?= $row['content']; ?></textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <!-- <button class="btn btn-primary">Publish</button> -->
                  <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
                  <input type="hidden" name="id" value="<?= $row['id']; ?>">
                  <input type="hidden" name="slug" value="<?= $row['slug']; ?>">
                  <input type="hidden" name="old_image" value="<?= $row['image']; ?>">
                </div>
              </div>
              </form>
            <?php }
             ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
