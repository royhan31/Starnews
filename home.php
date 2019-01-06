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
      <?php $data = $post->postBanner();
      foreach ($data as $row) {
        $date = $row['created_at'];
        $id = $row['id'];

         ?>
      <div class="carousel-item <?php if(current($data[0])==$id){echo 'active';} ?>">
        <div class="banner_content text-center">
          <div class="date">
            <a class="gad_btn" href="#"><?= $row['category']; ?></a>
            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><?= date("d F, Y", strtotime($date)); ?></a>
            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i></a>
          </div>
          <h3><?= $row['title']; ?></h3>
          <?= $row['content']; ?>
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
<section class="choice_area p_120">
  <div class="container">
    <div class="main_title2">
      <h2>Breaking News</h2>
    </div>
    <div class="row choice_inner">
      <div class="col-lg-3 col-md-6">
        <div class="choice_item">
          <img class="img-fluid" src="assets/landing/img/blog/choice/choice-1.jpg" alt="">
          <div class="choice_text">
            <div class="date">
              <a class="gad_btn" href="#">Gadgets</a>
          <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
          <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
            </div>
            <a href="news-details.html"><h4>Myspace Layouts The Missing Element already</h4></a>
            <p>Planning to visit Las Vegas or any other vacational resort where casinos</p>
          </div>
        </div>
      </div>
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
        <div class="tavel_food mt-100">
          <div class="main_title2">
        <h2>Travel and food</h2>
      </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="row choice_small_inner">
                <div class="col-lg-6 col-sm-6">
                  <div class="choice_item small">
                <img class="img-fluid" src="assets/landing/img/blog/popular-post/pp-4.jpg" alt="">
                <div class="choice_text">
                  <a href="news-details.html"><h4>Technical Support 10 with Dealing With</h4></a>
                  <div class="date">
                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
                  </div>
                </div>
              </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                  <div class="choice_item small">
                <img class="img-fluid" src="assets/landing/img/blog/popular-post/pp-5.jpg" alt="">
                <div class="choice_text">
                  <a href="news-details.html"><h4>Technical Support 10 with Dealing With</h4></a>
                  <div class="date">
                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
                  </div>
                </div>
              </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                  <div class="choice_item small">
                <img class="img-fluid" src="assets/landing/img/blog/popular-post/pp-6.jpg" alt="">
                <div class="choice_text">
                  <a href="news-details.html"><h4>Technical Support 10 with Dealing With</h4></a>
                  <div class="date">
                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
                  </div>
                </div>
              </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                  <div class="choice_item small">
                <img class="img-fluid" src="img/blog/popular-post/pp-7.jpg" alt="">
                <div class="choice_text">
                  <a href="news-details.html"><h4>Technical Support 10 with Dealing With</h4></a>
                  <div class="date">
                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
                  </div>
                </div>
              </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="choice_item">
            <img class="img-fluid" src="img/blog/popular-post/pp-8.jpg" alt="">
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
          <aside class="r_widgets social_widgets">
            <div class="main_title2">
              <h2>Social Networks</h2>
            </div>
            <ul class="list">
              <li><a href="#"><i class="fa fa-facebook"></i> 983Likes <span>Like our page</span></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i> 983Followers <span>Follow Us</span></a></li>
              <li><a href="#"><i class="fa fa-youtube-play"></i> 9835Subscriber <span>Subscribe</span></a></li>
              <li><a href="#"><i class="fa fa-vimeo"></i> 59874Subscriber <span>Subscribe</span></a></li>
              <li><a href="#"><i class="fa fa-pinterest"></i> 36958Followers <span>Follow Us</span></a></li>
              <li><a href="#"><i class="fa fa-rss"></i>RSS Subscribe <span>Subscribe</span></a></li>
            </ul>
          </aside>
          <aside class="r_widgets newsleter_widgets">

          </aside>
        </div>
      </div>
    </div>
  </div>
</section>
