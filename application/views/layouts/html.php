<html>
    <head>
        <?php
        $this->load->view('layout/header2');
        ?>
    </head>
    <body>
        <?php
                $this->load->view('layout/menu2');
                $this->load->view($page);
                $this->load->view('layout/footer');
            ?>
    </body>
</html>