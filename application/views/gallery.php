<section>
    <div class="breadcrumb">
        <h1><?php echo empty($this->uri->segment(2)) ? 'Gallery' : (!empty($gallery) ? $gallery['gallery_name'] : ''); ?></h1>
    </div>
</section>
<section id="body-content">
    <div class="container">
        <div class="row">
            <?php if (!empty($galleries)) {
                foreach ($galleries as $gallery) {
                    $images = glob(FCPATH . $gallery['gallery_path'] . '/' . "*.*");
                    $i=0;
                    foreach ($images as $image) {
                        if($i==0) {
                            $image = str_replace(FCPATH, '', $image);
                            ?>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <a href="<?php echo base_url('gallery/' . $gallery['gallery_slug'] . '/'); ?>">
                                    <div class="img-thumbs">
                                        <img src="<?php echo $image?>" alt="<?php echo $gallery['gallery_name'] ?>" class="img-responsive"/>
                                        <h4 class="text-center"><?php echo $gallery['gallery_name'] ?></h4>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                        $i++;
                    }
                }
            } else if (!empty($gallery)) {
                ?>

                <?php
                $images = glob(FCPATH . $gallery['gallery_path'] . '/' . "*.*");
                foreach ($images as $image) {
                    $image = str_replace(FCPATH, '', $image);
                    ?>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a class="zoom-gallery" href="<?php echo strtolower($image); ?>">
                            <div class="img-thumbs">
                                <img src="<?php echo $image; ?>" alt="<?php echo $gallery['gallery_name'] ?>" class="img-responsive"/>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            } else { ?>
                <h2>No Gallery Uploaded !</h2>
                <?php
            }
            ?>
        </div>
    </div>
</section>