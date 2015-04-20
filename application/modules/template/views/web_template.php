<?php
/*    HERE WE LOAD 
 *      BOOTSTRAP, CSS'S AND JS'S 
 * 
 */

/*
 * INCLUDES
 */


//echo "TEMPLATE";
include_once 'includes/header.php'; //headers
include_once 'includes/loadcss.php'; //loadcss
include 'includes/top.php'; //top

if (!isset($view_file)) {
    $view_file = "";
}

if (!isset($module)) {
    $module = $this->uri->segment(1);
}

if (($module != "") && ($view_file != "")) {
    $path = $module . "/" . $view_file;
    $this->load->view($path);
}

error_reporting(E_ALL);
setlocale(LC_ALL, "es_ES");
?>
<div class="mov-show">
    <?php
    //include 'includes/menu_down.php'; //top
    ?>
</div>
<?php
include_once 'includes/bottom.php'; //bottom
?>


