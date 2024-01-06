<style>
    nav.pbreadcrumb{
        color: #795548 !important;
        background-color: #fff;
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    .breadcrumb:before {
        content: '\E5CC';
        color: #795548 !important;
        vertical-align: top;
        display: inline-block;
        font-family: 'Material Icons';
        font-weight: normal;
        font-style: normal;
        font-size: 25px;
        margin: 0 10px 0 8px;
        -webkit-font-smoothing: antialiased;
    }
</style>
<section id="showPortfolio">
    <link rel="stylesheet" href="<?= base_url('assets/fancybox/jquery.fancybox.min.css'); ?>"/>
    <script src="<?= base_url('assets/fancybox/jquery.fancybox.min.js'); ?>"></script>
    <div class="container">
        <div class="text-header">ผลงานของเรา</div>
        <nav class="pbreadcrumb">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="<?= base_url(); ?>" class="breadcrumb  brown-text">หน้าหลัก</a>
                    <a href="<?= base_url('portfolio'); ?>" class="breadcrumb brown-text">ผลงานของเรา</a>
                    <a href="javascript:;" class="breadcrumb brown-text"><?= $project->project_name;  ?></a>
                </div>
            </div>
        </nav>
        <div class="show-gallery">
            <div class="row">
                <?php
                foreach ($gallery as $row) {
                    ?>
                    <div class="col s12 m6 xl3">
                        <a data-fancybox="gallery" href="<?= $url_img.$row->image; ?>" data-caption="<?= $row->descr1;?> : <?= $row->descr2;?>">
                            <div class="imageContainer">
                                <div class="imageHolder">
                                    <img class="imageItself" src="<?= $url_img.$row->image; ?>" />
                                </div>
                                <div class="imgtxt" style="display: block;">
                                    <?= $row->descr1;?>
<!--                                    : --><?//= $row->descr2;?>
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