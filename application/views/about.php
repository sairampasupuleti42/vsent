<section>
    <div class="breadcrumb">
        <h1>About Me</h1>
    </div>
</section>
<section id="body-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="about-wrap">
                    <?php if (!empty($about)){
                        echo $about['description'];
                    }else{ ?>
                    <h2>Content not uploaded !</h2>
                    <?php }
                    ?>
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
