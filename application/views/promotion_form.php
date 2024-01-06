<style>
    .save-itm,.del-itm{
        cursor: pointer;
    }
</style>
<h4><?= $textheader; ?></h4>
<?= form_open(base_url('promotion/save'));?>
<input type="hidden" name="frmaction" value="<?= $action; ?>">
<input type="hidden" id="promotionID" name="id" value="<?= $id; ?>">
<?php
if($action == 'new' || $action == 'edit'){
    $active = '';
    if($action != 'new'){
        $active = 'active';
    }
    ?>
    <div class="row">
        <div class="col s12 m5">
            <div class="input-field col s12">
                <input id="promotion_name" name="promotion[promotion_name]" type="text" class="validate" value="<?= $promotion_name; ?>">
                <label for="promotion_name" class="<?= $active; ?>">รายการ โปรโมชั่น</label>
            </div>
            <div class="input-field col s12">
                <input id="price_normal" name="promotion[price_normal]" type="text" class="validate" value="<?= $price_normal; ?>">
                <label for="price_normal" class="<?= $active; ?>">ราคาปกติ</label>
            </div>
            <div class="input-field col s12">
                <input id="price_special" name="promotion[price_special]" type="text" class="validate" value="<?= $price_normal; ?>">
                <label for="price_special" class="<?= $active; ?>">ราคาพิเศษ</label>
            </div>
        </div>
        <div class="col s12 m7">
            <div class="row">
                <div class="col s9">
                    รายละเอียดโปรโมชั่น
                </div>
                <div class="col s3">
                    <a class="add-pro-itm green tooltipped" data-position="top" data-tooltip="เพิ่มรายการ"><i class="material-icons">add</i></a>
                </div>
            </div>
            <div class="show-list-itm" style="display:block; width:100%; height: auto">
                <?php
                if($action == 'new'){
                    ?>
                    <div class="row list-itm" style="position: relative;">
                        <div class="input-field col s6">
                            <input id="item_name_1" name="item_name[]" type="text" class="validate" value="">
                            <label for="item_name_1">รายการ</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="amount_1" name="amount[]" type="text" class="validate" value="">
                            <label for="amount_1">จำนวน</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="units_1" name="units[]" type="text" class="validate" value="">
                            <label for="units_1">หน่วย</label>
                        </div>
                        <div class="col s2">
                            <div class="show-del-itm">
                                <a class="red-text tooltipped del-itm" data-position="top" data-tooltip="ลบรายการ" data-id="" data-idx="1">
                                    <i class="material-icons">close</i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }else {
                    $i = 0;
                    foreach ($promotion_list as $row) {
                        $i++;
                        ?>
                        <div class="row list-itm" style="position: relative;">
                            <input type="hidden" class="hidID" name="item_id[]" value="<?= $row->id; ?>">
                            <div class="input-field col s6">
                                <input id="item_name_<?= $i; ?>" name="item_name[]" type="text" class="validate item_name"
                                       value="<?= $row->item_name; ?>">
                                <label for="item_name_<?= $i; ?>" class="<?= $active; ?>">รายการ</label>
                            </div>
                            <div class="input-field col s2">
                                <input id="amount_<?= $i; ?>" name="amount[]" type="text" class="validate amount"
                                       value="<?= $row->amount; ?>">
                                <label for="amount_<?= $i; ?>" class="<?= $active; ?>">จำนวน</label>
                            </div>
                            <div class="input-field col s2">
                                <input id="units_<?= $i; ?>" name="units[]" type="text" class="validate units"
                                       value="<?= $row->units; ?>">
                                <label for="units_<?= $i; ?>" class="<?= $active; ?>">หน่วย</label>
                            </div>
                            <div class="col s2">
                                <div class="show-del-itm">
                                    <a class="red-text tooltipped del-itm" data-position="top" data-tooltip="ลบรายการ"
                                       data-id="<?= $row->id; ?>" data-idx="<?= $i; ?>">
                                        <i class="material-icons">close</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
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
    $(document).ready(function () {
        $('.add-pro-itm').click(function () {
            var cnt = $('.list-itm').length;
            var elm = '';
                elm += '<div class="row list-itm" style="position: relative;">';
            <?php
            if($action == 'edit'){
            ?>
            elm += '<input class="hidID" type="hidden" name="item_id[]">';
            <?php
            }
            ?>
                elm += '<div class="input-field col s6">';
                elm += '<input id="item_name_1" name="item_name[]" type="text" class="validate item_name" value="">';
                elm += '<label for="item_name_1">รายการ</label>';
                elm += '</div>';
                elm += '<div class="input-field col s2">';
                elm += '<input id="amount_1" name="amount[]" type="text" class="validate amount" value="">';
                elm += '<label for="amount_1">จำนวน</label>';
                elm += '</div>';
                elm += '<div class="input-field col s2">';
                elm += '<input id="units_1" name="units[]" type="text" class="validate units" value="">';
                elm += '<label for="units_1">หน่วย</label>';
                elm += '</div>';
                elm += '<div class="col s2">';
                elm += '<div class="show-del-itm">';
                <?php
                if($action == 'edit'){
                ?>
                elm += '<a class="blue-text tooltipped save-itm" data-position="top" data-tooltip="บันทึกรายการ" data-id="">';
                elm += '<i class="material-icons">save</i>';
                elm += '</a>';
                <?php
                    }
                ?>
                elm += '<a class="red-text tooltipped del-itm" data-position="top" data-tooltip="ลบรายการ" data-id="">';
                elm += '<i class="material-icons">close</i>';
                elm += '</a>';
                elm += '</div>';
                elm += '</div>';
                elm += '</div>';
            $(".show-list-itm").append(elm);
        });

        $(document).on('click','.del-itm',function () {
            var id = $(this).data('id');
            if(id){
                var data = {id:id,'<?= $this->security->get_csrf_token_name(); ?>':'<?= $this->security->get_csrf_hash(); ?>'};
                $.ajax({
                    'type': 'POST',
                    'url': '<?= base_url('promotion/del_itm');?>',
                    'data':data
                });
            }
            $(this).parents(".list-itm").remove();
        });

        $(document).on('click','.save-itm',function () {
            //var id = $(this).data('id');
            var promotionID = $('#promotionID').val();
            var item_name   = $(this).parents(".list-itm").find('.item_name').val();
            var amount      = $(this).parents(".list-itm").find('.amount').val();
            var units       = $(this).parents(".list-itm").find('.units').val();
            var data = {promotion_id:promotionID,item_name:item_name,amount:amount,units:units,'<?= $this->security->get_csrf_token_name(); ?>':'<?= $this->security->get_csrf_hash(); ?>'};
            var dataID = '';
            $.ajax({
                    'type': 'POST',
                    'url': '<?= base_url('promotion/add_itm');?>',
                    'data':data,
                    async: false,
                    success:function (response) {
                        dataID = response;
                    }
                });
            if(dataID !=''){
                $(this).parents(".list-itm").find('.hidID').val(dataID);
                $(this).parents(".list-itm").find('.del-itm').attr('data-id',dataID);
                $(this).hide();
            }

        });

    });
</script>