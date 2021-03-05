<style>
    #body-content {
        padding: 10px 0;
    }
</style>
<section>
    <div class="breadcrumb">
        <h1>&nbsp;</h1>
    </div>
</section>
<?php
if (!empty($post)) {
    ?>

    <section id="body-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="post-wrap">
                        <div class="post-header">
                            <h1><?php echo !empty($post['news_title']) ? $post['news_title'] : ''; ?></h1>
                            <div class="post-shares">
                                <div class="social-share">
                                    <ul class="list-inline">
                                        <!--<li><b class="views-icon"><i class="fa fa-eye" aria-hidden="true"></i> Views :<span class="views">
509</span></b></li>-->
                                        <li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('article/'.$post['post_slug'].'/')?>&amp;title=<?php echo $post['news_title'];?>" id="fbshare" class="fb-share-button" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" data-mobile-iframe="true">
                                                <img src="<?php echo base_url('images/social/facebook.png');?>" alt="Facebook Share" class="social-share facebook">
                                            </a></li>
                                        <li><a href="https://plus.google.com/share?url=<?php echo base_url('article/'.$post['post_slug'].'/')?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php echo base_url('images/social/google-plus.png');?>" alt="Share on Google+"></a></li>
                                        <li><a href="https://twitter.com/share" class="twitter-share-button" data-show-count="true"><img src="<?php echo base_url('images/social/twitter.png');?>" alt="Tweet on Twitter"></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="post-body">

                            <div class="post-image">
                                <?php if (!empty($post['image'])) {
                                    echo "<img src='" . base_url($post['image']) . "' alt='" . $post['news_title'] . "'/>";
                                } ?>
                            </div>
                            <div class="post-content text-justify fs-15">
                                <?php echo !empty($post['description']) ? $post['description'] : ''; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="sidebar-head bg-2"><span>FB Feed</span></div>
                    <div class="fb-page" data-href="https://www.facebook.com/Kolanukonda-Shivaji-130136157602020/" data-tabs="timeline" data-width="360" data-height="600" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/Kolanukonda-Shivaji-130136157602020/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Kolanukonda-Shivaji-130136157602020/">Kolanukonda Shivaji</a></blockquote>
                    </div>
                    <br><br>
                    <div class="widgets-box">
                        <div class="sidebar-head bg-2"><span>Twitter Feed</span></div>
                        <a class="twitter-timeline" href="https://twitter.com/shivaji_kolanu" data-width="360" data-height="600">Tweets by shivaji_kolanu</a>
                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php
} else {
    ?>
    404
    <?php
}
?>
