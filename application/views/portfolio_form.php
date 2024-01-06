<h4><?= $textheader; ?></h4>
<?= form_open(base_url('portfolio/save'));?>
<input type="hidden" name="frmaction" value="<?= $action; ?>">
<input type="hidden" name="id" value="<?= $id; ?>">
<input type="hidden" name="project_id" value="<?= $project_id; ?>">

<?php
if($action == 'new' || $action == 'edit'){
    $active = '';
    if($action == 'new'){
        $descr1  = $project_name;
        $url_img = base_url('assets/image/photo.svg');
    }else{
        $url_img = $url.$image;
        $active = 'active';
    }
?>
<div class="row">
    <div class="col s12 m5">
        <img class="materialboxed" id="showImg" src="<?= $url_img; ?>" width="100%">
        <div class="file-field input-field">
            <div class="btn green">
                <span>อัพโหลดไฟล์</span>
                <input id="fileInput" type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="validate" name="filename" id="filename" placeholder="ขนาด 1280X853 พิกเซล" type="text" value="<?= $image; ?>">
            </div>
        </div>
    </div>
    <div class="col s12 m7">
        <div class="input-field">
            <input  name="descr1" id="descr1" type="text" class="validate" value="<?= $descr1; ?>">
            <label for="descr1" class="active">ไซต์งาน</label>
        </div>
        <div class="input-field">
            <input name="descr2" id="descr2" type="text" class="validate" value="<?= $descr2; ?>">
            <label for="descr2" class="<?= $active; ?>" >รายละเอียด</label>
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
                url:'<?= base_url('portfolio/uploads');?>',
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
