<footer>

    <div class="footer-inner">
        <div class="container text-center">
            <p><a href="#">Home</a> | <a href="about.php">About Me</a> | <a href="#">Politics</a> | <a href="contact.php">Contact</a></p>
            <div>© 2017 - Kolanukonda Shivaji  All Rights Reserved.</div>
            <div>Developed By fadeIn Developers</div>
        </div>
    </div>
</footer>

<div id="back-top">
    <a class="img-circle" href="#top">
        <i class="fa fa-angle-up"></i>
    </a>
</div>


<!-- JQuery Plugins-->
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script type='text/javascript' src="<?php echo base_url();?>js/menuzord.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/owl.carousel.min.js"></script>
<script type='text/javascript' src="<?php echo base_url();?>js/jflickrfeed.min.js"></script>
<script type='text/javascript' src="<?php echo base_url();?>js/jquery.fancybox.js"></script>
<script type='text/javascript' src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
<script type='text/javascript' src="<?php echo base_url();?>js/site-custom.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
    $(document).ready(function () {
        $('.zoom-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function (item) {
                    return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank"></a>';
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300, // don't foget to change the duration also in CSS
                opener: function (element) {
                    return element.find('img');
                }
            }

        });
    });
</script>
</body>
</html>
