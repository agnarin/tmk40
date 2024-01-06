<h4><?= $textheader; ?></h4>
<?= form_open(base_url('product/save'));?>
<input type="hidden" name="frmaction" value="<?= $action; ?>">
<input type="hidden" name="id" value="<?= $id; ?>">
<?php
if($action == 'new' || $action == 'edit'){
    $active = '';
    if($action == 'new'){
        $url_img_product = "https://via.placeholder.com/350";
        $url_img_icon    = "https://via.placeholder.com/350x75";
        $url_pdf         = "";
    }else{
        $url_img_product = $url.'/products/'.$product_image;
        $url_img_icon    = $url.'/products/'.$product_icon;
        $url_pdf         = $url.'/pdf/'.$product_pdf;
        $active = 'active';
    }
    ?>
    <div class="row">
        <div class="col s12 m6">
            <div class="col s12">
                <label>ภาพสินค้า</label>
                <img class="materialboxed" id="showImgProduct" src="<?= $url_img_product; ?>" width="100%">
                <div class="file-field input-field">
                    <div class="btn green">
                        <span>อัพโหลดไฟล์</span>
                        <input class="fileInput" id="fileImageProduct" type="file" data-filefield="#filename_product_image" data-filetype="image" data-showid="#showImgProduct">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="validate" name="product_image" id="filename_product_image" type="text" value="<?= $product_image; ?>">
                    </div>
                </div>
            </div>
            <div class="col s12">
                <label>ภาพไอคอน</label>
                <img class="materialboxed" id="showImgIcon" src="<?= $url_img_icon; ?>" width="100%">
                <div class="file-field input-field">
                    <div class="btn green">
                        <span>อัพโหลดไฟล์</span>
                        <input class="fileInput" id="fileImageIcon" type="file" data-filefield="#filename_product_icon" data-filetype="image" data-showid="#showImgIcon">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="validate" name="product_icon" id="filename_product_icon" type="text" value="<?= $product_icon; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="col s12">
                <div class="input-field">
                    <input  name="product_name" id="product_name" type="text" class="validate" value="<?= $product_name; ?>">
                    <label for="product_name" class="<?= $active; ?>">ชื่อสินค้า</label>
                </div>
                <div class="input-field">
                    <input name="price" id="price" type="text" class="validate" value="<?= $price; ?>">
                    <label for="price" class="<?= $active; ?>" >ราคา</label>
                </div>
            </div>
            <div class="col s2">
                <a class="modalShowPDF" id="modalShowPDF" href="javascript:;" data-src="<?= $url_pdf; ?>">
                    <img src="<?= base_url('assets/image/show_pdf.png'); ?>" width="100%">
                </a>
                <div style="display:block; text-align: center; font-size: 12px;">แสดงตัวอย่าง</div>
            </div>
            <div class="col s10">
                <label>ไฟล์ PDF</label>
                <div class="file-field input-field">
                    <div class="btn green">
                        <span>อัพโหลดไฟล์</span>
                        <input class="fileInput" id="filePDF" type="file" data-filefield="#filename_product_pdf" data-filetype="pdf" data-showid="#modalShowPDF">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="validate" name="product_pdf" id="filename_product_pdf" type="text" value="<?= $product_pdf; ?>">
                    </div>
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
        $('#fileImageProduct').change(function () {
            var fieldInputId = $(this).data('filefield');
            var fileTtpe     = $(this).data('filetype');
            var fileId       = $(this).data('showid');
            var filename     = $(fieldInputId).val();
            var file_data    = $(this).prop('files')[0];
            var form_data    = new FormData();
            form_data.append('fileData', file_data);
            form_data.append('filename', filename);
            form_data.append('fileType', fileTtpe);
            form_data.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');
            $.ajax({
                url:'<?= base_url('product/uploads');?>',
                type:"post",
                enctype: 'multipart/form-data',
                data:form_data, //this is formData
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(result){
                    console.log(result);
                    if(result != ''){
                        var urlimg = '<?= $url; ?>/products/'+result;
                        $(fileId).attr('src',urlimg);
                        $(fieldInputId).val(result);
                    }
                }
            });
        });
        $('#fileImageIcon').change(function () {
            var fieldInputId = $(this).data('filefield');
            var fileTtpe     = $(this).data('filetype');
            var fileId       = $(this).data('showid');
            var filename     = $(fieldInputId).val();
            var file_data    = $(this).prop('files')[0];
            var form_data    = new FormData();
            form_data.append('fileData', file_data);
            form_data.append('filename', filename);
            form_data.append('fileType', fileTtpe);
            form_data.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');
            $.ajax({
                url:'<?= base_url('product/uploads');?>',
                type:"post",
                enctype: 'multipart/form-data',
                data:form_data, //this is formData
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(result){
                    console.log(result);
                    if(result != ''){
                        var urlimg = '<?= $url; ?>/products/'+result;
                        $(fileId).attr('src',urlimg);
                        $(fieldInputId).val(result);
                    }
                }
            });
        });
        $('#filePDF').change(function () {
            var fieldInputId = $(this).data('filefield');
            var fileTtpe     = $(this).data('filetype');
            var fileId       = $(this).data('showid');
            var filename     = $(fieldInputId).val();
            var file_data    = $(this).prop('files')[0];
            var form_data    = new FormData();
            form_data.append('fileData', file_data);
            form_data.append('filename', filename);
            form_data.append('fileType', fileTtpe);
            form_data.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');
            $.ajax({
                url:'<?= base_url('product/uploads');?>',
                type:"post",
                enctype: 'multipart/form-data',
                data:form_data, //this is formData
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(result){
                    console.log(result);
                    if(result != ''){
                        var urlimg = '<?= $url; ?>/pdf/'+result;
                        $(fileId).attr('data-src',urlimg);
                        $(fieldInputId).val(result);
                    }
                }
            });
        });
    });
</script>
