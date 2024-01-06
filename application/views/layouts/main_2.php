<html>
<head>
    <?php
    $this->load->view('layouts/header');
    ?>
</head>
<body  class="white">
<?php
$this->load->view('layouts/menu_2');
$this->load->view('pages/'.$page,$data);
$this->load->view('layouts/footer');

?>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });

</script>
</body>
</html>