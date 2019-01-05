
<!DOCTYPE html>
<html lang="en">
<?php include 'partials/_head.php' ?>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <?php include 'partials/_nav.php' ?>

      <?php include 'partials/_sidebar.php' ?>

      <!-- Main Content -->
      <div class="main-content">
        <?php eval($content); ?>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          v2.0.0
        </div>
      </footer>
    </div>
  </div>

  <?php include 'partials/_script.php' ?>
</body>
</html>
