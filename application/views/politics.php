<section>
    <div class="breadcrumb">
        <h1>Politics</h1>
    </div>
</section>
<section id="body-content">
    <?php
    if (!empty($bposts)) {
        ?>

        <div class="masonary-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div id="main-slider-boxed-wrap">
                        <div class="row">
                            <div class="col-xs-12 col-lg-6 col-md-6">
                                <div class="owl-carousel" id="main-slider-boxed">
                                    <?php
                                    foreach ($bposts as $post) {
                                        ?>
                                        <div class="item">
                                            <img src="<?php echo base_url($post['image']);?>" alt="Slider Image">
                                            <div class="blog-post">
                                                <div class="blog-outer">
                                                    <h3 class="blog-title">
                                                        <a href="<?php echo base_url('article/'.$post['post_slug'].'/');?>">
                                                            <?php echo $post['news_title']?>...</a></h3>
                                                    <div class="meta">
                                                        <span class="date"><?php echo date('d-M-y',strtotime($post['created_on']));?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                    ?>

                                </div>
                            </div>
                            <?php if (!empty($brtposts)) { ?>
                                <div class="col-xs-12 col-lg-3 col-md-3" id="sidebar-post">
                                    <div class="row">
                                        <?php foreach ($brtposts as $post) { ?>
                                            <div class="col-xs-6 col-lg-12 col-md-12">
                                                <div class="item">
                                                    <img src="<?php echo base_url($post['image']);?>" alt="Slider Image">
                                                    <div class="blog-post">
                                                        <div class="blog-outer">
                                                            <h3 class="blog-title"><a href="<?php echo base_url('article/'.$post['post_slug'].'/');?>">
                                                                    <?php echo $post['news_title']?>
                                                                </a></h3>
                                                            <div class="meta">
                                                                <span class="date"><?php echo date('d-M-y',strtotime($post['created_on']))?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($brbposts)) { ?>
                                <div class="col-xs-12 col-lg-3 col-md-3" id="sidebar-post">
                                    <div class="row">
                                        <?php foreach ($brbposts as $post) { ?>
                                            <div class="col-xs-6 col-lg-12 col-md-12">
                                                <div class="item">
                                                    <img src="<?php echo base_url($post['image']);?>" alt="Slider Image">
                                                    <div class="blog-post">
                                                        <div class="blog-outer">
                                                            <h3 class="blog-title"><a href="<?php echo base_url('article/'.$post['post_slug'].'/');?>">
                                                                    <?php echo $post['news_title']?>
                                                                </a></h3>
                                                            <div class="meta">
                                                                <span class="date"><?php echo date('d-M-y',strtotime($post['created_on']))?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    <?php }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php if (!empty($posts)) {
                    foreach ($posts as $post) {
                        ?>
                        <div class="about-wrap mb-20">
                            <h2 class="text-bold text-center pt-25"><?php echo $post['news_title']; ?></h2>
                            <img src="<?php echo base_url($post['image']) ?>" class="img-responsive m-auto img-p20"
                                 alt="<?php echo $post['post_slug'] ?>">
                            <div class="blog-text text-justify fs-15">
                                <?php echo $post['description'] ?>
                                <div class="clearfix"></div>
                            </div>
                            <br><br>
                        </div>
                    <?php }
                }
                ?>
            </div>
            <div class="col-sm-4">
                <div class="widgets-box">
                    <div class="sidebar-head bg-2"><span> News updates</span></div>
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
                                                <a href="politics.php"><i class="fa fa-comments-o"></i>15</a>
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
                <div class="sidebar-head bg-2"><span>FB Feed</span></div>
                <div class="fb-page" data-href="https://www.facebook.com/Kolanukonda-Shivaji-130136157602020/"
                     data-tabs="timeline" data-width="360" data-height="600" data-small-header="true"
                     data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/Kolanukonda-Shivaji-130136157602020/"
                                class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/Kolanukonda-Shivaji-130136157602020/">Kolanukonda
                            Shivaji</a></blockquote>
                </div>
                <br><br>
                <div class="widgets-box">
                    <div class="sidebar-head bg-2"><span>Twitter Feed</span></div>
                    <a class="twitter-timeline" href="https://twitter.com/shivaji_kolanu" data-width="360"
                       data-height="600">Tweets by shivaji_kolanu</a>
                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
</section>