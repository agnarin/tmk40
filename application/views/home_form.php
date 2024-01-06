<h4><?= $textheader; ?></h4>
<?= form_open(base_url('home/save'));?>
<input type="hidden" name="frmaction" value="<?= $action; ?>">
<input type="hidden" name="id" value="<?= $id; ?>">
<?php
if($action == 'new' || $action == 'edit'){
    $active = '';
    if($action == 'new'){
        $url_img = base_url('assets/image/photo.svg');
        $image_size = 'style="width:auto; height:300px;"';
    }else{
        $url_img = $url.$image;
        $image_size = '';
        $active = 'active';
        $image_size = 'style="width:100%; height:auto;"';
    }
    ?>
    <div class="row">
        <div class="col s12 m7">
            <img class="materialboxed" id="showImg" src="<?= $url_img; ?>" <?= $image_size; ?> >
            <div class="file-field input-field">
                <div class="btn green">
                    <span>อัพโหลดไฟล์</span>
                    <input id="fileInput" type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="validate" name="filename" id="filename" placeholder="ขนาด 1920X1080 พิกเซล" type="text" value="<?= $image; ?>">
                </div>
            </div>
        </div>
    </div>
    <?php
}else{
    ?>
    <p style="font-size: 1.15rem;" class="error-msg">คุณต้องการลบข้อมูลนี้หรือไม่</p>
    <?php
}
?>
</form>
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
        $('#fileInput').change(function () {
            var filename = $('#filename').val();
            var file_data = $(this).prop('files')[0];
            var form_data = new FormData();
            form_data.append('image', file_data);
            form_data.append('filename', filename);
            form_data.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');
            console.log(form_data);
            $.ajax({
                url:'<?= base_url('home/uploads');?>',
                type:"post",
                enctype: 'multipart/form-data',
                data:form_data, //this is formData
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(result){
                    if(result != ''){
                        var urlimg = '<?= $url; ?>'+result;
                        $('#showImg').attr('src',urlimg);
                        $('#filename').val(result);
                    }
                }
            });
        });
    });
</script>
