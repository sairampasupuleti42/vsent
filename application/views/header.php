<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Kolanukonda Shivaji</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.png"/>

    <?php if (!empty($meta)) { ?>
        <meta property="og:image:width" content="100"/>
        <meta property="og:site_name" content="Aadab Hyderabad"/>

        <meta property="og:title" content="<?php echo !empty($meta['news_title']) ? $meta['news_title'] : ''; ?>"/>
        <meta property="og:url" content="<?php echo !empty($meta['post_slug']) ? base_url('article/' . $meta['post_slug'] . '/') : ''; ?>"/>
        <meta property="og:type" content="Article"/>
        <meta property="og:description" content="<?php echo !empty($meta['description']) ? shortDesc($meta['description'], 10) : ''; ?>"/>

        <meta property="fb:app_id" content="785887824946103"/>
        <link rel="canonical" href="<?php echo !empty($meta['post_slug']) ? base_url('article/' . $meta['post_slug'] . '/') : ''; ?>">
        <meta itemprop="image" content="<?php echo !empty($meta['image']) ? base_url($meta['image']) : ''; ?>"/>

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="<?php echo !empty($meta['news_title']) ? $meta['news_title'] : ''; ?>">
        <meta itemprop="description" content="<?php echo !empty($meta['description']) ? shortDesc($meta['description'], 10) : ''; ?>">
        <meta itemprop="image" content="<?php echo !empty($meta['image']) ? base_url($meta['image']) : ''; ?>">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="Kolanukonda Shivaji | Political Leader">
        <meta name="twitter:title" content="<?php echo !empty($meta['news_title']) ? $meta['news_title'] : ''; ?>">
        <meta name="twitter:description" content="<?php echo !empty($meta['description']) ? shortDesc($meta['description'], 10) : ''; ?>">
        <meta name="twitter:creator" content="Kolanukonda Shivaji">
        <!-- Twitter summary card with large image must be at least 280x150px -->
        <meta name="twitter:image" content="<?php echo !empty($meta['image']) ? base_url($meta['image']) : ''; ?>">
    <?php } ?>
    <link href="//fonts.googleapis.com/css?family=Ramabhadra" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300italic,300,400italic,500,500italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>css/base.css"/>
    <link rel="stylesheet" class="alt" href="<?php echo base_url();?>css/theme/default.css">

    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-min.js"></script>
    <script src="<?php echo base_url();?><?php echo base_url();?>js/modernizr-2.6.2.min.js"></script>
</head>


<body class="wide">
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=785887824946103";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!--<div id="pageloader">
    <div class="loader-item">
        <img src="images/preloader.gif" alt='loader' />
        <div>Loading...</div>
    </div>
</div>-->

<header>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <P class="text-uppercase">Official Spokes Person ,Andhra Pradesh Congress Committee </P>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons">
                        <ul>
                            <li><a href="https://plus.google.com/109082306305362050871" target="_blank" data-toggle="tooltip" title="" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="https://twitter.com/shivaji_kolanu" target="_blank" data-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com/Kolanukonda-Shivaji-130136157602020/" data-toggle="tooltip" title="" target="_blank" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/shivaji-kolanukonda-49016841/" target="_blank" data-toggle="tooltip" title="" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="nav-wrap">
        <div class="container">
            <div id="menuzord" class="menuzord red pull-left">
                <a href="/" class="logo-custom menuzord-brand "><!--<img src="images/25.png" alt="">--> Kolanukonda Shivaji</a>
                <ul class="menuzord-menu">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about-me/">About Me</a></li>
                    <li><a href="/politics/">Politics</a></li>
                    <li><a href="/gallery/">Gallery</a></li>
                    <li><a href="/contact-me/">Contact </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</header>
<script>
    $(document).ready(function () {
        // get current URL path and assign 'active' class
        var pathname = window.location.pathname;
        $('.menuzord-menu > li > a[href="' + pathname + '"]').parent().addClass('active');
    })
</script>