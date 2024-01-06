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
    <div class="container">
        <div class="text-header">ผลงานของเรา</div>
        <nav class="pbreadcrumb">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="<?= base_url(); ?>" class="breadcrumb brown-text">หน้าหลัก</a>
                    <a href="javascript:;" class="breadcrumb brown-text">ผลงานของเรา</a>
                </div>
            </div>
        </nav>
        <div class="show-gallery">
            <div class="row">
                <?php
                    foreach ($data_img as $img) {
                ?>
                    <div class="col s12 m6 xl3">
                        <a href="<?= base_url('portfolio/show/'.$img->project_id); ?>">
                            <div class="imageContainer">
                                <div class="imageHolder">
                                    <img class="imageItself" src="<?= $url_img.$img->image; ?>" />
                                </div>
                                <div class="imgtxt" style="display: block;">
                                    <?= $img->descr1; ?>
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