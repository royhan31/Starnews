<?php
include_once('action/config.php');
$id = $_GET['id'];
$slug = $_GET['slug'];
 ?>
<!--================Home Banner Area =================-->
       <section class="banner_area">
           <div class="banner_inner d-flex align-items-center">
             <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
       <div class="container">
         <div class="banner_content text-center">
           <h2>News Details</h2>
           <div class="page_link">
             <a href="index.html">Home</a>
             <a href="news-details.html">News Details</a>
           </div>
         </div>
       </div>
           </div>
       </section>
       <!--================End Home Banner Area =================-->
       <!--================News Area =================-->
       <?php
        $data = $post->details($id,$slug);
        foreach ($data as $row) {
          $date = $row['created_at'];
          ?>
        <section class="news_area single-post-area p_100">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-8">
       					<div class="main_blog_details">
       						<img class="img-fluid" src="assets/img/<?= $row['image'] ?>" style="width:44rem; height:25rem;" alt="">
       						<h4><?= $row['title']; ?></h4>
       						<div class="user_details">
       							<div class="float-left">
       								<a href=""><?= $row['category']; ?></a>
       							</div>
       							<div class="float-right">
       								<div class="media">
       									<div class="media-body">
       										<h5><?= $row['name']; ?></h5>
       										<p><?= date("d M, Y H:i", strtotime($date)); ?> am </p>
       									</div>
       									<div class="d-flex">
       										<img src="img/blog/user-img.jpg" alt="">
       									</div>
       								</div>
       							</div>
       						</div>
       						<p><?= $row['content']; ?></p>
       					</div>

                        <div class="comments-area">
                          <?php
                          $post_id = base64_decode($id);
                          $comment = $comments->show($post_id);

                           ?>
                            <h4><?= count($comment); ?> Comments</h4>
                            <?php foreach ($comment as $row): ?>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="img/blog/c4.jpg" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><?= $row['name'];?></h5>
                                            <p class="date"><?= date("d M, Y H:i", strtotime($date)); ?> </p>
                                            <p class="comment">
                                                <?= $row['message'];?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="comment-form">
                            <h4>Leave a Reply</h4>
                            <form method="post" action="action/Comment.php">
                                <div class="form-group form-inline">
                                  <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                  </div>
                                  <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control mb-10" name="message" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                </div>
                                <input type="hidden" name="post_id" value="<?= $id; ?>">
                                <input type="hidden" name="slug" value="<?= $slug; ?>">
                                <input type="submit" name="comment" value="Post Comment" class="primary-btn submit_btn">
                            </form>
                        </div>
        			</div>
              <?php
                    }

                $popular = $post->popular($id);
                foreach ($popular as $row) {
                  $post_id = $row['id'];
                  $slug = $row['slug'];
                  $comment = $comments->show($post_id);
                  $date = $row['created_at'];
                    ?>
        			<div class="col-lg-4">
        				<div class="right_sidebar">
        					<aside class="r_widgets news_widgets">
        						<div class="main_title2">
        							<h2>Most Popular News</h2>
        						</div>
        						<div class="choice_item">
									<img class="img-fluid" src="assets/img/<?= $row['image']; ?>" style="width:26rem; height:18rem;" alt="">
									<div class="choice_text">
										<div class="date">
											<a class="gad_btn" href=""><?= $row['category']; ?></a>
											<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; <?= date("F d, Y", strtotime($date)); ?>&nbsp;
										  <i class="fa fa-comments-o" aria-hidden="true"></i> <?= count($comment); ?>
										</div>
										<a href="?news=details&slug=<?= base64_encode($slug); ?>&id=<?= base64_encode($post_id); ?>"><h4><?= $row['title']; ?></h4></a>
										<p><?= substr($row['content'], 0,130) . '...'; ?></p>
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
        				</div>
        			</div>
            <?php
            } ?>
        		</div>
        	</div>
        </section>
        <!--================End News Area =================-->
