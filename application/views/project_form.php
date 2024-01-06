<h5><?= $textheader; ?></h5>
<?= form_open(base_url('portfolio/save_project'));?>
<input type="hidden" name="frmaction" value="<?= $action; ?>">
<input type="hidden" name="project_id" value="<?= $project_id; ?>">
<?php
if($action == 'new' || $action == 'edit'){
    $active = '';
    if($action != 'new'){
        $active = 'active';
    }
?>
    <div class="row">
        <div class="col s12">
            <div class="input-field">
                <input  name="project_name" id="project_name" type="text" class="validate" value="<?= $project_name; ?>">
                <label for="project_name" class="<?= $active; ?>">ไซต์งาน</label>
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

