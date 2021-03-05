<?php
require_once 'header.php';
?>
<section>
    <div class="owl-carousel" id="alternate-slider">
        <div class="item">
            <img src="/images/slider/main-slider/1.jpg" alt="Slider Image">
            <!-- <div class="blog-post">
                 <div class="blog-outer">
                     <h3 class="blog-title"><a href="#">Who i am - A Mystery Begins</a></h3>
                     <div class="meta">
                         <span><a href="#"><i class="fa fa-tags"></i> People</a></span>
                         <span class="date">25-Apr-15</span>
                         <span><a href="#" data-toggle="tooltip" title="" data-original-title="25" class="like-icons"><i class="fa fa-heart-o"></i></a></span>
                         <span><a href="#" data-toggle="tooltip" title="" data-original-title="12" class="comments-icon"><i class="fa fa-comments-o"></i></a></span>
                     </div>
                     <div class="blog-bottom">
                         <a href="#" class="more-links">Read More</a>
                     </div>
                 </div>
             </div>-->
        </div>
        <div class="item">
            <img src="/images/slider/main-slider/2.jpg" alt="Slider Image">
            <!--<div class="blog-post">
                <div class="blog-outer">
                    <h3 class="blog-title"><a href="#">Local Tram In A City</a></h3>
                    <div class="meta">
                        <span><i class="fa fa-tags"></i> Photography</span>
                        <span class="date">25-Apr-15</span>
                        <span><a class="like-icons" data-original-title="25" title="" data-toggle="tooltip" href="#"><i class="fa fa-heart-o"></i></a></span>
                        <span><a class="comments-icon" data-original-title="12" title="" data-toggle="tooltip" href="#"><i class="fa fa-comments-o"></i></a></span>
                    </div>
                </div>
            </div>-->
        </div>
        <div class="item">
            <img src="/images/slider/main-slider/3.jpg" alt="Slider Image">
            <!--     <div class="blog-post">
                     <div class="blog-outer">
                         <h3 class="blog-title"><a href="#">Bahama's Trip: Waiting For Our Flight</a></h3>
                         <div class="meta">
                             <span><a href="#"><i class="fa fa-tags"></i> Travel</a></span>
                             <span class="date">25-Apr-15</span>
                             <span><a class="like-icons" data-original-title="25" title="" data-toggle="tooltip" href="#"><i class="fa fa-heart-o"></i></a></span>
                             <span><a class="comments-icon" data-original-title="12" title="" data-toggle="tooltip" href="#"><i class="fa fa-comments-o"></i></a></span>
                         </div>
                     </div>
                 </div>-->
        </div>
        <div class="item">
            <img src="/images/slider/main-slider/4.jpg" alt="Slider Image">
            <!--           <div class="blog-post">
                           <div class="blog-outer">
                               <h3 class="blog-title"><a href="#">Journey By A Vintage Car</a></h3>
                               <div class="meta">
                                   <span><a href="#"><i class="fa fa-tags"></i> Journey</a></span>
                                   <span class="date">25-Apr-15</span>
                                   <span><a class="like-icons" data-original-title="25" title="" data-toggle="tooltip" href="#"><i class="fa fa-heart-o"></i></a></span>
                                   <span><a class="comments-icon" data-original-title="12" title="" data-toggle="tooltip" href="#"><i class="fa fa-comments-o"></i></a></span>
                               </div>
                           </div>
                       </div>-->
        </div>
        <div class="item">
            <img src="/images/slider/main-slider/5.jpg" alt="Slider Image">
            <!--<div class="blog-post">
                <div class="blog-outer">
                    <h3 class="blog-title"><a href="#">Skyview Shot From My Home</a></h3>
                    <div class="meta">
                        <span><a href="#"><i class="fa fa-tags"></i> Photography</a></span>
                        <span class="date">25-Apr-15</span>
                        <span><a class="like-icons" data-original-title="25" title="" data-toggle="tooltip" href="#"><i class="fa fa-heart-o"></i></a></span>
                        <span><a class="comments-icon" data-original-title="12" title="" data-toggle="tooltip" href="#"><i class="fa fa-comments-o"></i></a></span>
                    </div>
                </div>
            </div>-->
        </div>
        <div class="item">
            <img src="/images/slider/main-slider/6.jpg" alt="Slider Image">
            <!--<div class="blog-post">
                <div class="blog-outer">
                    <h3 class="blog-title"><a href="#">Skyview Shot From My Home</a></h3>
                    <div class="meta">
                        <span><a href="#"><i class="fa fa-tags"></i> Photography</a></span>
                        <span class="date">25-Apr-15</span>
                        <span><a class="like-icons" data-original-title="25" title="" data-toggle="tooltip" href="#"><i class="fa fa-heart-o"></i></a></span>
                        <span><a class="comments-icon" data-original-title="12" title="" data-toggle="tooltip" href="#"><i class="fa fa-comments-o"></i></a></span>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</section>

<section id="body-content">
    <div class="container">
        <div class="row">
            <!-- xxx Blog Post xxx -->
            <div class="col-sm-8">
                <div class="blog-post">
                    <div class="item-thumbs">
                        <img src="/images/blog/blog-main2.jpg">
                    </div>
                    <div class="blog-outer">
                        <h3 class="blog-title"><a href="/about-me/"> About Me</a></h3>
                    </div>
                    <div class="blog-text">
                        <?php
                        if (!empty($about['description_mini'])) {
                            echo $about['description_mini'];
                        }
                        ?>
                    </div>
                    <div class="blog-bottom">
                        <div class="pull-right"><a href="/about-me/" class="more-links">Read More</a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php if (!empty($post)){
                $post = $post[0]; ?>
                <div class="blog-post">

                    <img src="<?php echo base_url($post['image']); ?>" alt="<?php echo $post['news_title']?>" class="m-auto img-responsive">


                <div class="blog-outer">
                    <h3 class="blog-title"><a
                                href="<?php echo base_url('article/' . $post['post_slug'] . '/') ?>"><?php echo $post['news_title']; ?></a>
                    </h3>
                </div>
                <div class="blog-text">
                    <p class="fs-15">
                        <?php echo $post['description'] ?>
                    </p>
                </div>
                <div class="blog-bottom">
                    <div class="pull-right"><a href="<?php echo base_url('article/' . $post['post_slug'] . '/') ?>"
                                               class="more-links">Read More</a></div>
                    <div class="clearfix"></div>
                </div>
                </div>
            <?php }
            ?>
            <?php
            if (!empty($video_post)) {
                $video_post = $video_post[0];
                ?>
                <div class="blog-post">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="500" height="281"
                            src="<?php echo !empty($video_post['post_video']) ? $video_post['post_video'] : ''; ?>"
                            frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="blog-outer">
                    <h3 class="blog-title"><a
                                href="<?php echo base_url('article/' . $video_post['post_slug'] . '/') ?>">
                            <?php echo $video_post['news_title'] ?></a></h3>
                </div>
                <div class="blog-text">
                    <p class="fs-15">
                        <?php echo shortDesc($video_post['description'], 250) ?>
                    </p>
                </div>
                <div class="blog-bottom">
                    <div class="pull-right"><a
                                href="<?php echo base_url('article/' . $video_post['post_slug'] . '/') ?>"
                                class="more-links">Read More</a></div>
                    <div class="clearfix"></div>
                </div>
                </div><?php }
            ?>


        </div>
        <div class="col-sm-4">
            <div class="widgets-box">
                <div class="sidebar-head"><span>About Me</span></div>
                <div class="sidebar-text">
                    <div class="author-image">
                        <img src="/images/slider/aboutme.jpg" alt="about kolanukonda shivaji" class="img-circle">
                    </div>
                    <h4 class="text-center">Follow Me </h4>
                    <div class="social-icons text-center">
                        <ul>
                            <li><a href="https://plus.google.com/109082306305362050871" target="_blank"
                                   data-toggle="tooltip" title="" data-original-title="Google Plus"><i
                                            class="fa fa-google-plus"></i></a></li>
                            <li><a href="https://twitter.com/shivaji_kolanu" target="_blank" data-toggle="tooltip"
                                   title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com/Kolanukonda-Shivaji-130136157602020/"
                                   data-toggle="tooltip" title="" target="_blank" data-original-title="Facebook"><i
                                            class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/shivaji-kolanukonda-49016841/" target="_blank"
                                   data-toggle="tooltip" title="" data-original-title="LinkedIn"><i
                                            class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="widgets-box">

                <div class="sidebar-head bg-2"><span>Recent News</span></div>
                <div class="sidebar-text">
                    <?php if (!empty($recent_posts)) { ?>
                        <ul class="sidebar-post">
                            <?php foreach ($recent_posts as $post) { ?>
                                <li>
                                    <div class="image-thumb">
                                        <a href="<?php echo base_url('article/' . $post['post_slug'] . '/'); ?>">
                                            <img src="<?php echo base_url($post['thumb_image']); ?>"
                                                 alt="<?php echo $post['news_title'] ?>">
                                        </a>

                                    </div>
                                    <div class="post-text">
                                        <h4><a href="<?php echo base_url('article/' . $post['post_slug'] . '/') ?>">
                                                <?php echo $post['news_title']; ?></a>
                                        </h4>

                                        <div class="post-date">
                                            <i class="fa fa-clock-o"></i> <?php echo date('d M, Y', strtotime($post['created_on'])); ?>
                                        </div>
                                        <div class="post-date">
                                            <!-- <a href="politics.php"><i class="fa fa-comments-o"></i>15</a>-->
                                        </div>
                                    </div>
                                </li>
                            <?php }
                            ?>
                        </ul>
                    <?php }
                    ?>
                </div>
            </div>
            <div class="widgets-box">
                <div class="sidebar-head bg-2"><span>FB Feed</span></div>
                <div class="fb-page" data-href="https://www.facebook.com/Kolanukonda-Shivaji-130136157602020/"
                     data-tabs="timeline" data-width="360" data-height="600" data-small-header="true"
                     data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/Kolanukonda-Shivaji-130136157602020/"
                                class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/Kolanukonda-Shivaji-130136157602020/">Kolanukonda
                            Shivaji</a></blockquote>
                </div>
            </div>
            <div class="widgets-box">
                <div class="sidebar-head bg-2"><span>Twitter Feed</span></div>
                <a class="twitter-timeline" href="https://twitter.com/shivaji_kolanu" data-width="360"
                   data-height="600">Tweets by shivaji_kolanu</a>
                <!--<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>-->
            </div>


        </div>
    </div>
    </div>
</section>
