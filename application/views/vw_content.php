<!DOCTYPE html>
<html lang="en">
    
    <?php $this->load->view('_partials/head.php'); ?>

    <body class="sb-nav-fixed">

        <?php $this->load->view('_partials/navbar.php'); ?>

        <div id="layoutSidenav">
            
            <div id="layoutSidenav_nav">
                
                <?php $this->load->view('_partials/sidebar.php'); ?>

            </div>

            <div id="layoutSidenav_content">
            
                    <?php $this->load->view($view); ?>
                    
                    <?php $this->load->view('_partials/footer.php'); ?>
                
            </div>
            
        </div>
        
    </body>


    <?php $this->load->view('_partials/js.php'); ?>

</html>