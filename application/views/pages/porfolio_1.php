<section id="showPortfolio">
    <link rel="stylesheet" href="<?= base_url('assets/fancybox/jquery.fancybox.min.css'); ?>"/>
    <script src="<?= base_url('assets/fancybox/jquery.fancybox.min.js'); ?>"></script>
    <div class="container">
        <div class="text-header">ผลงานของเรา</div>
        <div class="show-gallery">
            <div class="row">
                <?php
                for ($i=1; $i<9; $i++) {
                    ?>
                    <div class="col s12 m6 xl3">
                        <a data-fancybox="gallery" href="<?= base_url('uploads/ch1/'.$i.'.jpg'); ?>" data-caption="">
                            <div class="imageContainer">
                                <div class="imageHolder">
                                    <img class="imageItself" src="<?= base_url('uploads/ch1/'.$i.'.jpg'); ?>" />
                                </div>
                                <div class="imgtxt">
                                    <!--                                    --><?//= $row->descr1;?>
                                    <br/>
                                    <!--                                    --><?//= $row->descr2;?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>