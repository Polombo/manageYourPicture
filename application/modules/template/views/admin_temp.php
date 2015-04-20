<html>
    <?php 
    include_once("includes/cabeceraAdmin.php");
    //include_once('includes/constantes.php');
    ?>
    <body>
        <?php
        //CARGAMOS EL MENU DEL ADMINISTRADOR
        $this->load->view('menuAdmin');
        
        ?>
        <br><br>
        <div id='principal_Admin'>
            <?php
            if (!isset($view_file)) {
                $view_file = "";
            }

            if (!isset($module)) {
                $module = $this->uri->segment(1);
            }

            if (($module!="") && ($view_file!="")) {
                $path = $module."/".$view_file;
                $this->load->view($path);
            }
            ?>
        </div>
    </body>
</html>
