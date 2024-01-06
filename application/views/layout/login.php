<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Thepmongkol Engineering Administrator</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url('assets/image/logo.ico'); ?>" type="image/x-icon"/>
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?= base_url('assets/materialize/css/materialize.css');?>" media="screen,projection">
    <link type="text/css" rel="stylesheet" href="<?= base_url('assets/stylesheet/main.css');?>" media="screen,projection">


    <!-- Compiled and minified JavaScript -->
    <script src="<?= base_url('assets/javascript/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/materialize/js/materialize.js');?>"></script>
</head>
<body style="background-image: url('<?= base_url('assets/image/bg.png'); ?>')">
<?= form_open(base_url('auth'));?>
<div class="container">
    <div class="row">
        <div class="section"></div>
        <main>
            <center>
                <div class="container">
                    <div  class="z-depth-3 y-depth-3 x-depth-3 white green-text lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px; margin-top: 100px; solid #EEE;">
                        <div class="section"></div>
                        <div class="section">
                            <img src="<?= base_url('assets/image/tmk_logo.png'); ?>" style="display: block; width: 50%; margin: 0px auto;">
                        </div>

                        <div class="section"><i class="mdi-alert-error red-text"></i></div>


                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type="text" name='username' id='email' required />
                                <label for='email'>Username</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col m12'>
                                <input class='validate' type='password' name='password' id='password' required />
                                <label for='password'>Password</label>
                            </div>
                            <label style='float: right;'>
                                <a><b style="color:transparent;">Forgot Password?</b></a>
                            </label>
                        </div>
                        <br/>
                        <center>
                            <div class='row'>
                                <button style="margin-left:65px;"  type='button' id="logIn" class='col  s6 btn btn-small amber blue-grey-text  waves-effect z-depth-1 y-depth-1'>Login</button>
                            </div>
                        </center>

                    </div>
                </div>
            </center>
        </main>

    </div>
</div>
</form>



<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h5>Login Message</h5>
        <p id="logMessage">กรุณากรอกข้อมูล ให้ครบถ้วน</p>
    </div>
    <div class="modal-footer">
        <a class="modal-close modal-close waves-effect waves-light btn red">ตกลง</a>
    </div>
</div>
<!-- Modal Trigger -->
<a id="dataModal" style="display: none;" class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('#logIn').click(function () {
            var em = $("#email").val();
            var pw = $("#password").val();
            if(em !="" && pw !=""){
                var data = $("form").serialize();
                var url  = $("form").attr("action");
                $.ajax({
                    'type': 'POST',
                    'url': url,
                    'data':data,
                    'success': function(response) {
                        if(response == "email_error"){
                            $('#logMessage').text('อีเมล์ไม่ถูกต้อง!');
                            $('.modal').modal('open');
                        }else if(response == "error_email"){
                            $('#logMessage').text('ไม่มีอีเมล์นี้!');
                            $('.modal').modal('open');
                        }else if(response == "error_password"){
                            $('#logMessage').text('รหัสผ่านไม่ถูกต้อง!');
                            $('.modal').modal('open');
                        }else if(response == "ok"){
                            window.location.href = "<?= base_url(); ?>";
                        }
                    }
                });
            }else{
                $('#logMessage').text('กรุณาระบุอีเมล์หรือรหัสผ่านให้ถูกต้อง!');
                $('.modal').modal('open');
            }
        });
    });
</script>
</body>
</html>
