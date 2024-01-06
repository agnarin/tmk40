<style>
    .modal { width: 25% !important ; max-height: 100% !important ; overflow-y: hidden !important ;}
</style>
<div class="container" style="padding-top: 50px">
    <h4 class="blue-text">ผลงาน</h4>
    <div class="divider blue"></div>
    <div class="row">
        <div class="col s6">
            <table  class="bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Site Name</th>
                        <th>
                            <a class="btn-floating waves-effect waves-light green tooltipped load-frm"  data-position="top" data-tooltip="เพิ่มข้อมูลไซต์งาน" data-act="new" data-id=""><i class="material-icons">add</i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach ($project as  $row) {
                    ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row->project_name; ?></td>
                        <td>
                            <a href="<?= base_url('portfolio/show')?>/<?= $row->project_id; ?>" class="btn-floating waves-effect waves-light btn-small btn blue tooltipped"
                               data-position="top" data-tooltip="เพิ่มรูปภาพ"><i
                                        class="material-icons left">collections</i></a>
                            <a class="btn-floating waves-effect waves-light btn-small btn orange tooltipped load-frm"
                               data-position="top" data-tooltip="แก้ไขข้อมูลไซต์งาน" data-act="edit" data-id="<?= $row->project_id; ?>"><i class="material-icons left">create</i></a>
                            <a class="btn-floating waves-effect waves-light btn-small btn red tooltipped load-frm"
                               data-position="top" data-tooltip="ลบข้อมูลไซต์งาน" data-act="delete" data-id="<?= $row->project_id; ?>"><i class="material-icons left">delete</i></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
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
<script>
    $(document).ready(function () {
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('.materialboxed').materialbox();
        $('.card-panel').css("height",'352.531px');
        $('.tooltipped').tooltip();
        $('.load-frm').click(function () {
            var frmaction = $(this).data('act');
            var id        = $(this).data('id');
            var data      = {frmaction:frmaction,project_id:id,'<?= $this->security->get_csrf_token_name(); ?>':'<?= $this->security->get_csrf_hash(); ?>'};
            $.ajax({
                'type': 'POST',
                'url': '<?= base_url('portfolio/loadfromProject');?>',
                'data':data,
                'success': function(response) {
                    $('#modalform').find('div.modal-content').html(response);
                    $('#modalform').modal('open');
                }
            });
        });
        $('#saveData').click(function () {
            var frm =$('#modalform').find('form');
            var project_name = $('#project_name').val();
            if(project_name != ''){
                var data = frm.serialize();
                $.ajax({
                    'type': 'POST',
                    'url': '<?= base_url('portfolio/save_project');?>',
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