<html>
    <head>
        <?php
        $this->load->view('layouts/header');
        ?>
    </head>
    <body>
        <?php
                $this->load->view('layouts/menu');
                $this->load->view('pages/'.$page,$data);
                $this->load->view('layouts/footer');

            ?>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });

    </script>
        <script>
            $(document).ready(function () {
                $("a.scollmenu").click(function () {
                    var theHref = $(this).attr("href");
                    $("html, body").animate({
                        scrollTop: $(theHref).offset().top
                    }, 500);
                    return false;
                });
            });
        </script>
    </body>
</html>