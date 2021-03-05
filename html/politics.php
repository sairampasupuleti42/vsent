<?php
require_once 'header.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
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
                    return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
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

<section>
    <div class="breadcrumb">

        <h1>Politics</h1>
    </div>
</section>
<section id="body-content">
 <div class="masonary-wrap">
        <div class="container-fluid">
            <div class="row">
                <div id="main-slider-boxed-wrap">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-md-6">
                            <div class="owl-carousel" id="main-slider-boxed">
                                <div class="item">
                                    <img src="images/gallery/gallery6.jpg" alt="Slider Image">
                                    <div class="blog-post">
                                        <div class="blog-outer">
                                            <h3 class="blog-title"><a href="#">8 ఏళ్లక్రితం ఇవాళే ...</a></h3>
                                            <div class="meta">
                                                <span class="date">25-Apr-17</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/gallery/gal1.jpg" alt="Slider Image">
                                    <div class="blog-post">
                                        <div class="blog-outer">
                                            <h3 class="blog-title"><a href="#">ఉమ్మడి ఆంద్రప్రదేశ్ నాశనానికి నాందిపలికిన రోజు ఇవాళ...
                                                    ఆ తప్పు ముమ్మాటికి ysr దే</a></h3>
                                            <div class="meta">
                                                <span class="date">2-Sep-17</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/gallery/gal5.jpg" alt="Slider Image">
                                    <div class="blog-post">
                                        <div class="blog-outer">
                                            <h3 class="blog-title"><a href="#">జోహార్ వైఎస్సార్...</a></h3>
                                            <div class="meta">
                                                <span class="date">25-Apr-17</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-3 col-md-3" id="sidebar-post">
                            <div class="row">
                                <div class="col-xs-6 col-lg-12 col-md-12">
                                    <div class="item">
                                        <img src="images/gallery/gal4.jpg" alt="Slider Image">
                                        <div class="blog-post">
                                            <div class="blog-outer">
                                                <h3 class="blog-title"><a href="#">కృష్ణలంక పీడర్ రోడ్ నుంచి హైవే మీదకు వెళ్ళటానికి</a></h3>
                                                <div class="meta">
                                                    <span class="date">25-Apr-17</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-lg-12 col-md-12">
                                    <div class="item">
                                        <img src="images/gallery/gal3.jpg" alt="Slider Image">
                                        <div class="blog-post">
                                            <div class="blog-outer">
                                                <h3 class="blog-title"><a href="#">ఈ రోజు 1 గంట కు కమీషనర్</a></h3>
                                                <div class="meta">
                                                    <span class="date">25-Apr-17</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-3 col-md-3" id="sidebar-post">
                            <div class="row">
                                <div class="col-xs-6 col-lg-12 col-md-12">
                                    <div class="item">
                                        <img src="images/gallery/gal2.jpg" alt="Slider Image">
                                        <div class="blog-post">
                                            <div class="blog-outer">
                                                <h3 class="blog-title"><a href="#">స్వర్గీయ డాక్టర్ వైస్సార్ గారి 8వ వర్దంతే </a></h3>
                                                <div class="meta">
                                                    <span class="date">2-Sep-17</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-lg-12 col-md-12">
                                    <div class="item">
                                        <img src="images/gallery/gal1.jpg" alt="Slider Image">
                                        <div class="blog-post">
                                            <div class="blog-outer">
                                                <h3 class="blog-title"><a href="#">నంద్యాల ఫలితం ద్వారా టీడీపీని ఎదుర్కోవడంలో </a></h3>
                                                <div class="meta">
                                                    <span class="date">25-Apr-17</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    </div>
    <div class="clearfix"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="about-wrap">
                    <img src="images/news/news_one.jpg" alt="About Kolanukonda Shivaji">
                    <div class="blog-text">
                        <p>ఈ రోజు ఆంధ్రభూమి డైలీ మెయిన్ ఎడిషన్లో ఆంధ్రా, తెలంగాణ ఎడిషన్స్లోని ఎడిట్ పేజీలో నేను రాసిన
                            ఆర్టికల్ పబ్లిష్ అయ్యింది.
                            సంపాదక వర్గానికి ధన్యవాదాలు.
                            సెప్టెంబర్ 17 ఉదయం 10 గంటలకు "రైతు ముక్తి యాత్ర" విజయవాడ లోని సిద్దార్థ కాలేజీ ఆడిటోరియం లో
                            జాతీయ రైతు అగ్ర న్నాయకులు పాల్గొనే ఈ సభను జయప్రదం చెయ్యండి.
                            కన్వీనర్ శ్రీ వడ్డే శోభణ్డరీశ్వరరావు
                            శ్రీ ఎర్నేని నాగేంద్రనాధ్
                            శ్రీ ఎంవీస్ నాగిరెడ్డి
                            శ్రీ వై కేశవరావు
                            శ్రీ రావుల వెంకయ్య
                            శ్రీ జెట్టి గురునాడ్ రావు
                            శ్రీ విస్సా కిరణ్కుమార్
                            రైతు-కూలి సంగం అగ్రనాయకత్వం కలసి ఆ రైతు మీటింగ్ నిర్వాహక సంగంగా ఏర్పడటం జరిగింది.
                            దయచేసి బెజవాడ ప్రజలు ఈ మీటింగ్ ని జయప్రదం చేయవలసిందిగా మనవి</p>
                        <div class="clearfix"></div>
                    </div>

                    <br><br>

                </div>
                <br>
                <br>
                <div class="about-wrap">
                    <img src="images/news/news_3.jpg" alt="About Kolanukonda Shivaji">
                    <div class="blog-text">
                            <p class="fs-15">గందరగోళంలో గౌతమ్ రెడ్డి
                                వైఎస్సార్ సీపీ అధికార ప్రతినిధి పూనూరు గౌతమ్ రెడ్డి గారు ఒక టీవీ ఛానల్ ఇంటర్వ్యూలో
                                మాట్లాడుతూ... బడుగులు, బలహీన వర్గాల ఆరాథ్య దైవం, జన నేతగా మా లాంటి వారికి ఎందరికో
                                స్ఫూర్తిగా నిలిచిన వంగవీటి మోహనరంగా గారి హత్య గావించబడటాన్ని సమర్థిస్తూ అనుచిత వ్యాఖ్యలు
                                చేయడాన్ని రంగా అభిమానిగా తీవ్రంగా ఖండిస్తున్నా. దివంగత రంగా, రాధా లను హత్యలు , రౌడీ
                                రాజకీయాలు చేసేవారుగా, పాములతో పోల్చి తూలనాడటం చూస్తా వుంటే తన రాజకీయ భవితవ్యంపై ఆయన
                                గందరగోళంలో ఉన్నట్లు అర్థమవుతోంది. రంగా గారి హత్యపై ఆనాడు ఆంధ్రప్రదేశ్ ప్రజానీకం యావత్తు
                                ఏ విధంగా స్పందించిందో అందరికీ తెలుసు. అనంతరం 1989లో జరిగిన ఎన్నికల్లో సైతం ప్రజానీకం
                                హత్యకు సహకరించిన ఆనాటి తెలుగుదేశం ప్రభుత్వాన్ని గద్దె దింపారు కూడా. గౌతమ్ రెడ్డి వంటి
                                నాయకులకు రంగా గారి గురించి వ్యాఖ్యలు చేసే అర్హత లేదు. రంగా గారిపై నోరు జారినందుకు వెంటనే
                                ప్రజలకు క్షమాపణలు చెప్పాలి.</p>

                            <p class="fs-15"><img src="images/news/news_2.jpg" alt="Slider Image"
                                    class="alignright img-thumbnail">విజయవాడ రాష్ట్ర కాంగ్రెస్ కార్యాలయంలో పెద్దలు మా
                                అగ్రనాయకులు డాక్టర్ కేవీపీ రామచంద్రరావు గారు స్వర్గీయ డాక్టర్ వైస్సార్ గారి 8వ వర్దంతే
                                సందర్భముగా వారికి ఘనమైన నివాళ్ళు లు ఆర్పించటం జరిగింది.
                                ఈ చిత్రము లో డాక్టర్ రఘువీరారెడ్డి గారు కూడా ఉన్నారు.వారి నాయకత్వములో నే జరిగింది.
                            </p>
                            <p class="fs-15"><img src="images/about/about-five.jpg" alt="Slider Image"
                                    class="alignright img-thumbnail">రాష్ట్రంలో పేరుకే ‘ఉచితంగా ఇసుక’... క్రిష్ణా నది రేవులనుండి నాణ్యమైన ఇసుక తెలంగాణ రాజధాని హైదరాబాద్ కు తరలిపోతుంటే ప్రభుత్వం చోద్యం చూస్తోంది. రేవుల వద్ద దళారులు ఇష్టారీతిగా దందా సాగిస్తుంటే అడ్డుకునే దిక్కు లేదు. స్థానిక అవసరాలకు ఇసుక అవసరమైతే వేల రూపాయలు వెచ్చించాల్సి వస్తోంది. టీడీపీ అధికారంలోకి వచ్చి మూడేళ్లు దాటుతున్నా సరైన రీతిలో ఇసుక అమ్మకాలను సాగించడంలో ఘోరంగా విఫలమైంది. గతంలో వున్న ఇసుక రేవుల వేలం విధానంలో ప్రభుత్వానికి కొద్దో గొప్పో ఆదాయమైనా వచ్చేది. ఇప్పుడు పేరుకే ఉచితంగా ఇసుక అంటున్నారు కానీ ఆచరణలో గతంలో కన్నా ఎక్కువ డబ్బు ఖర్చు చేయాల్సిన పరిస్థితి దాపురించింది. అధికార పార్టీ నాయకులే ఇసుక మాఫియాకు అండగా నిలుస్తున్నారు.</p>
                        </div>
                    </div>
            </div>

            <div class="col-sm-4">
                <div class="widgets-box">
                    <div class="sidebar-head bg-2"><span>Recent News</span></div>
                    <div class="sidebar-text">
                        <ul class="sidebar-post">
                            <li>
                                <div class="image-thumb">
                                    <a href="politics.php"><img src="images/gallery/gallery6.jpg" alt=""></a>

                                </div>
                                <div class="post-text">
                                    <h4><a href="politics.php">మహిళజర్నలిస్ట్ హత్యకు నిరసనగా విజయవాడలో జర్నలిస్టుల నిరసన.</a></h4>
                                    <p>News Description Here</p>
                                    <div class="post-date">
                                        <i class="fa fa-clock-o"></i> 21 Sep, 2017
                                    </div>
                                    <div class="post-date">
                                        <a href="politics.php"><i class="fa fa-comments-o"></i>15</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="image-thumb">
                                    <a href="politics.php"><img src="images/gallery/gal1.jpg" alt=""></a>
                                </div>
                                <div class="post-text">
                                    <h4><a href="politics.php">ఈ రోజు ఆంధ్రభూమి డైలీ మెయిన్ ఎడిషన్లో ఆంధ్రా, తెలంగాణ ఎడిషన్స్లోని ఎడిట్ పేజీలో నేను రాసిన ఆర్టికల్ పబ్లిష్ అయ్యింది.</a></h4>
                                    <p>News Description Here</p>
                                    <div class="post-date">
                                        <i class="fa fa-clock-o"></i> 21 Aug, 2017
                                    </div>
                                    <div class="post-date">
                                        <a href="politics.php"><i class="fa fa-comments-o"></i>15</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="image-thumb">
                                    <a href="politics.php"><img src="images/gallery/gallery6.jpg" alt=""></a>
                                </div>
                                <div class="post-text">
                                    <h4><a href="politics.php">గందరగోళంలో గౌతమ్ రెడ్డి</a></h4>
                                    <p>వైఎస్సార్ సీపీ అధికార ప్రతినిధి పూనూరు గౌతమ్ రెడ్డి గారు ఒక టీవీ ఛానల్ ఇంటర్వ్యూలో మాట్లాడుతూ</p>
                                    <div class="post-date">
                                        <i class="fa fa-clock-o"></i> 2 Sep, 2016
                                    </div>
                                    <div class="post-date">
                                        <a href="politics.php"><i class="fa fa-comments-o"></i>15</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
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


<?php
require_once 'footer.php';
?>
