<?php
include_once('action/config.php');
 ?>
<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner d-flex align-items-center">
<div class="container">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <?php
      $data = $post->postBanner();
      foreach ($data as $row) {
        $date = $row['created_at'];
        $id = $row['id'];
        $comment = $comments->show($id);
         ?>
      <div class="carousel-item <?php if(current($data[0])==$id){echo 'active';} ?>">
        <div class="banner_content text-center">
          <div class="date">
            <a class="gad_btn" href="#"><?= $row['category']; ?></a>
            <i class="fa fa-calendar" aria-hidden="true"></i> <?= date("d F, Y", strtotime($date)); ?>
            <i class="fa fa-comments-o" aria-hidden="true"></i> <?= count($comment); ?>
          </div>
          <h3><?= $row['title']; ?></h3>
          <p><?= substr($row['content'], 0,100) . '...'; ?></p>
        </div>
      </div>
      <?php
    }
     ?>
    </div>
  </div>
</div>
    </div>
</section>
<!--================End Home Banner Area =================-->
<!--================Choice Area =================-->
<?php
$search = $_SESSION['search'];
if ($search != null) {
  $get_search = $post->search($search);
   ?>
<section class="choice_area p_120">
  <div class="container">
    <div class="main_title2">
      <h2>Search Result : <?= $_SESSION['search']; ?>  </h2> <br>
    </div>
    <?php
    if ($get_search == null) {?>
      <h2>Not Found</h2>
      <?php
    } ?>
    <div class="row choice_inner">
      <?php
      foreach ($get_search as $row) {
        $id = $row['id'];
        $slug = $row['slug'];
        $comment = $comments->show($id);
        $date = $row['created_at'];
        ?>
      <div class="col-lg-3 col-md-6">
        <div class="choice_item">
          <img src="assets/img/<?= $row['image']; ?>" style="width:16rem; height:12rem;" alt="">
          <div class="choice_text">
            <div class="date">
              <a class="gad_btn" href="#"><?= $row['category']; ?></a>
          <i class="fa fa-calendar" aria-hidden="true"></i> <?= date("F d, Y", strtotime($date)); ?>
          <i class="fa fa-comments-o" aria-hidden="true"></i> <?= count($comment); ?>
            </div>
            <a href="?news=details&slug=<?= base64_encode($slug); ?>&id=<?= base64_encode($id); ?>"><h4><?= substr($row['title'], 0,60) . ''; ?></h4></a>
            <p><?= substr($row['content'], 0,130) . '...'; ?></p>
          </div>
        </div>
      </div>
      <?php
    }
     ?>
    </div>
  </div>
</section>
<?php
}
?>

<!--================Choice Area =================-->
<section class="choice_area p_120">
  <div class="container">
    <div class="main_title2">
      <h2>Breaking News</h2>
    </div>
    <div class="row choice_inner">
      <?php
      unset($_SESSION['search']);
      $breaks = $post->breakingNews();
      foreach ($breaks as $row) {
        $id = $row['id'];
        $slug = $row['slug'];
        $comment = $comments->show($id);
        $date = $row['created_at'];
        ?>
      <div class="col-lg-3 col-md-6">
        <div class="choice_item">
          <img src="assets/img/<?= $row['image']; ?>" style="width:16rem; height:12rem;" alt="">
          <div class="choice_text">
            <div class="date">
              <a class="gad_btn" href="#"><?= $row['category']; ?></a>
          <i class="fa fa-calendar" aria-hidden="true"></i> <?= date("F d, Y", strtotime($date)); ?>
          <i class="fa fa-comments-o" aria-hidden="true"></i> <?= count($comment); ?>
            </div>
            <a href="?news=details&slug=<?= base64_encode($slug); ?>&id=<?= base64_encode($id); ?>"><h4><?= substr($row['title'], 0,60) . ''; ?></h4></a>
            <p><?= substr($row['content'], 0,130) . '...'; ?></p>
          </div>
        </div>
      </div>
      <?php
    }
     ?>
    </div>
  </div>
</section>
<!--================End Choice Area =================-->

<!--================News Area =================-->
<section class="news_area">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="main_title2">
      <h2>Latest News</h2>
    </div>
        <div class="latest_news">
          <div class="media">
            <div class="d-flex">
              <img class="img-fluid" src="assets/landing/img/blog/l-news/l-news-1.jpg" alt="">
            </div>
            <div class="media-body">
              <div class="choice_text">
            <div class="date">
              <a class="gad_btn" href="#">Gadgets</a>
              <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
              <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
            </div>
            <a href="news-details.html"><h4>DFacts Why Inkjet Printing Is Very Appealing Compared To Ordinary Printing</h4></a>
            <p>Having a baby can be a nerve wracking experience for new parents not the nine months of pregnancy, I’m talking about</p>
          </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="right_sidebar">
          <aside class="r_widgets news_widgets">
            <div class="main_title2">
              <h2>Most Popular News</h2>
            </div>
            <div class="choice_item">
          <img class="img-fluid" src="img/blog/popular-post/pp-1.jpg" alt="">
          <div class="choice_text">
            <div class="date">
              <a class="gad_btn" href="#">Gadgets</a>
              <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
              <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
            </div>
            <a href="news-details.html"><h4>Dealing With Technical Support with 10 Useful Tips</h4></a>
            <p>It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights</p>
          </div>
        </div>
            <div class="news_slider owl-carousel">
              <div class="item">
                <div class="choice_item">
              <img src="img/blog/popular-post/pp-2.jpg" alt="">
              <div class="choice_text">
                <a href="news-details.html"><h4>Dealing With Technical Support 10 with Useful Tips around</h4></a>
                <div class="date">
                  <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
                  <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
                </div>
              </div>
            </div>
              </div>
              <div class="item">
                <div class="choice_item">
              <img src="img/blog/popular-post/pp-3.jpg" alt="">
              <div class="choice_text">
                <a href="news-details.html"><h4>An Ugly Myspace Profile Will Sure Ruin Your Reputation</h4></a>
                <div class="date">
                  <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
                  <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
                </div>
              </div>
            </div>
              </div>
              <div class="item">
                <div class="choice_item">
              <img src="img/blog/popular-post/pp-2.jpg" alt="">
              <div class="choice_text">
                <a href="news-details.html"><h4>Dealing With Technical Support 10 with Useful Tips around</h4></a>
                <div class="date">
                  <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
                  <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
                </div>
              </div>
            </div>
              </div>
              <div class="item">
                <div class="choice_item">
              <img src="img/blog/popular-post/pp-3.jpg" alt="">
              <div class="choice_text">
                <a href="news-details.html"><h4>An Ugly Myspace Profile Will Sure Ruin Your Reputation</h4></a>
                <div class="date">
                  <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
                  <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
                </div>
              </div>
            </div>
              </div>
              <div class="item">
                <div class="choice_item">
              <img src="img/blog/popular-post/pp-2.jpg" alt="">
              <div class="choice_text">
                <a href="news-details.html"><h4>Dealing With Technical Support 10 with Useful Tips around</h4></a>
                <div class="date">
                  <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
                  <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
                </div>
              </div>
            </div>
              </div>
              <div class="item">
                <div class="choice_item">
              <img src="img/blog/popular-post/pp-3.jpg" alt="">
              <div class="choice_text">
                <a href="news-details.html"><h4>An Ugly Myspace Profile Will Sure Ruin Your Reputation</h4></a>
                <div class="date">
                  <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
                  <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
                </div>
              </div>
            </div>
              </div>
            </div>
          </aside>
          <aside class="r_widgets add_widgets text-center">
            <img class="img-fluid" src="img/blog/add-1.jpg" alt="">
          </aside>

          <aside class="r_widgets newsleter_widgets">

          </aside>
        </div>
      </div>
    </div>
  </div>
</section>
