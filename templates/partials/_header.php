<header class="header_area">
    <div class="top_menu">
      <div class="container">
        <div class="float-left">
    <a href=""><?php echo date("l, F d, Y"); ?></a>
  </div>
      </div>
    </div>
    <div class="logo_part">
      <div class="container">
        <div class="float-left">
    <a class="logo" href="?news=home"><img src="assets/landing/img/starnew.png" alt=""></a>
  </div>
      </div>
    </div>
<div class="main_menu">
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <div class="container_inner">
      <!-- Brand and toggle get grouped for better mobile display -->
      <a class="navbar-brand logo_h" href="index.html"><img src="assets/landing/img/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
        <ul class="nav navbar-nav menu_nav">
          <li class="nav-item <?php if($current_page=='home' || $current_page=='search' ){echo 'active';} ?>"><a class="nav-link" href="?news=home">Home</a></li>
          <!-- <li class="nav-item"><a class="nav-link" href="">Category</a></li> -->
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php $data = $category->show();
          foreach ($data as $row) {?>
          <a class="dropdown-item" href="#"><?= $row['title']; ?></a>
        <?php  }
           ?>
        </div>
      </li>
      <li class="nav-item <?php if($current_page=='contact'){echo 'active';} ?>"><a class="nav-link" href="?news=contact">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right ml-auto">
          <!-- <li class="nav-item"><a class="search"><i class="lnr lnr-magnifier"></i></a></li> -->
        <form class="form-inline" method="post" action="action/Post.php">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search">
          <button class="genric-btn default-border circle" type="submit" style="border:none; margin-right:5px;"><i class="lnr lnr-magnifier"></i></button>
        </form>
    </ul>
      </div>
    </div>
  </div>
</nav>
</div>
</header>
