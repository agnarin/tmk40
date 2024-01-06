<div class="container" style="padding-top: 50px">
    <h4 class="blue-text">สไลด์โฮม</h4>
    <div class="divider blue"></div>
    <div class="row">
        <div class="col s12 m3">
            <div class="card-panel grey lighten-5 teal valign-wrapper">
                <a href="javascript:;" class="tooltipped load-frm" data-position="top" data-tooltip="เพิ่มใหม่" data-act="new" data-id="">
                    <img class="img-add" src="<?= base_url('assets/image/plus.svg');?>">
                </a>
            </div>
        </div>
    </div>
    <?php
    foreach ($gallery as $row) {
        ?>
        <div class="row">
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-image">
                        <img src="<?= $config->urluploadfile; ?>/slide_home/<?= $row->image; ?>" class="width:100%;">
                        <a class="btn-floating halfway-fab edit waves-effect waves-light amber tooltipped load-frm"
                           data-position="top" data-tooltip="แก้ไข" data-id="<?= $row->id; ?>" data-act="edit"><i class="material-icons">create</i></a>
                        <a class="btn-floating halfway-fab waves-effect waves-light red tooltipped load-frm"
                           data-position="top" data-tooltip="ลบ" data-id="<?= $row->id; ?>" data-act="delete"><i class="material-icons">delete</i></a>
                    </div>
                    <div class="card-content">

                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

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
<script>
    $(document).ready(function () {
        $('.modal').modal();
        $('.materialboxed').materialbox();
        $('.card-panel').css("height",'352.531px');
        $('.tooltipped').tooltip();
        $('.load-frm').click(function () {
            var frmaction = $(this).data('act');
            var id        = $(this).data('id');
            var data      = {frmaction:frmaction,id:id,'<?= $this->security->get_csrf_token_name(); ?>':'<?= $this->security->get_csrf_hash(); ?>'};
            $.ajax({
                'type': 'POST',
                'url': '<?= base_url('home/loadfrom');?>',
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
            var filename = $('#filename').val();
            var descr1 = $('#descr1').val();
            var descr2 = $('#descr2').val();
            if(filename != '' && descr1 !='' && descr2 !=''){
                var data = frm.serialize();
                $.ajax({
                    'type': 'POST',
                    'url': '<?= base_url('home/save');?>',
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
            }else{
                $('#modal-error').modal('open');
            }
        });
    });
</script>