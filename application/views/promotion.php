<div class="container" style="padding-top: 50px">
    <h4 class="blue-text">โปรโมชั่น</h4>
    <div class="divider blue"></div>
    <div class="row">
        <div class="col s12 m2">
            <div class="card-panel grey lighten-5 teal valign-wrapper">
                <a href="javascript:;" class="tooltipped load-frm" data-position="top" data-tooltip="เพิ่มใหม่" data-act="new" data-id="">
                    <img class="img-add" src="<?= base_url('assets/image/plus.svg');?>">
                </a>
            </div>
        </div>
    </div>
    <div class="row">
<?php
        foreach ($promotion as $row) {
?>
            <div class="col s12 m3">
                <div class="card-panel show-promotion">
                    <a class="btn-floating halfway-fab edit waves-effect waves-light amber tooltipped load-frm"
                       data-position="top" data-tooltip="แก้ไข" data-id="<?= $row->id; ?>" data-act="edit"><i
                            class="material-icons">create</i></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red tooltipped load-frm"
                       data-position="top" data-tooltip="ลบ" data-id="<?= $row->id; ?>" data-act="delete"><i
                            class="material-icons">delete</i></a>
                       <div class="title-promotion"><?= $row->promotion_name; ?></div>
                       <div class="promotion-details">
                           <?php
                            $promotion_itm = $this->Product_model->load_promotion_item($row->id);
                            foreach ($promotion_itm as $itm) {
                                ?>
                                <div class="row">
                                    <div class="col s8"><?= $itm->item_name; ?></div>
                                    <div class="col s2"><?= $itm->amount; ?></div>
                                    <div class="col s2"><?= $itm->units; ?></div>
                                </div>
                                <?php
                            }
                            ?>
                       </div>
                        <div class="promotion-price">
                            <div class="row">
                                <div class="col s8">ราคาปกติ</div>
                                <div class="col s2"><?= $row->price_normal; ?></div>
                                <div class="col s2">บาท</div>
                            </div>
                            <div class="row red-text">
                                <div class="col s8">ราคาพิเศษ</div>
                                <div class="col s2"><?= $row->price_special; ?></div>
                                <div class="col s2">บาท</div>
                            </div>
                        </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<div id="modalform" class="modal">
    <div class="modal-content">

    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light blue" id="saveData" type="button">
            ตกลง
        </button>
        <button class="modal-close btn waves-effect waves-light red" type="button">
            ยกเลิก
        </button>
    </div>
</div>
<div id="modal-error" class="modal">
    <div class="modal-content">
        <h4>Message</h4>
        <p style="font-size: 1.05rem;" class="red-text error-msg">กรุณาระบุข้อมูล</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">ตกลง</a>
    </div>
</div>
<div id="modalPdf" class="modal modal-fixed-footer">
    <div class="modal-content">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat right">
            <i class="material-icons" style="font-size: 24px;">close</i>
        </a>
        <iframe id="showPDF" width="100%" style="height:100%"></iframe>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.modal').modal();
        $('.materialboxed').materialbox();
        //var ch = $('.card').first().height();
        $('.tooltipped').tooltip();
        $('.load-frm').click(function () {
            var frmaction = $(this).data('act');
            var id        = $(this).data('id');
            var data      = {frmaction:frmaction,id:id,'<?= $this->security->get_csrf_token_name(); ?>':'<?= $this->security->get_csrf_hash(); ?>'};
            $.ajax({
                'type': 'POST',
                'url': '<?= base_url('promotion/loadfrom');?>',
                'data':data,
                'success': function(response) {
                    $('#modalform').find('div.modal-content').html(response);
                    $('#modalform').modal('open');
                }
            });
        });
        $('#saveData').click(function () {
            var frm =$('#modalform').find('form');
            var url = frm.attr('action');
            var data = frm.serialize();
            $.ajax({
                'type': 'POST',
                'url': '<?= base_url('promotion/save');?>',
                'data':data,
                'success': function(response) {
                    if (response == 'success'){
                        window.location.reload(true);
                    }else{
                        $('.error-msg').text(response);
                        $('#modal-error').modal('open');
                    }
                }
            });
        });
        $(document).on('click','.modalShowPDF',function () {
            var ifrm = $(this).data('src');
            if(ifrm !=""){
                $('#showPDF').attr('src',ifrm);
                $('#modalPdf').modal('open');
            }
        });
    });
</script>