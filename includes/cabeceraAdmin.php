<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <title>Administrador</title>

    <!-- Hojas de estilo --> 
    <?php
    /*$link_tipografias = array(
          'href' => base_url().'css/tipografias.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
    );
    
    echo link_tag($link_tipografias);*/
    include_once 'includes/loadcss.php'; //loadcss
    
    $link_admincss = array(
          'href' => base_url().'css/admincss.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
    );
    
    echo link_tag($link_admincss);
    
    $link_datepicker = array(
          'href' => base_url().'css/jquery.ui.datepicker.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
    );
    echo link_tag($link_datepicker);
    
    $link_jquery = array(
          'href' => base_url().'css/jquery-ui.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
    );
    echo link_tag($link_jquery);
    ?>
    <link rel="shortcut icon" href="favicon.ico" />
    <!--
    <script src="<?=base_url()?>js/jquery-1.11.0.js"></script>
    <script src="<?=base_url()?>js/jquery-ui.js"></script>
    <script src="<?=base_url()?>js/jquery.ui.core.js"></script>
    <script src="<?=base_url()?>js/jquery.ui.widget.js"></script>
    <script src="<?=base_url()?>js/jquery.ui.datepicker.js"></script>
    -->
    <script>

        if(typeof jQuery!=='undefined'){
            console.log('jQuery Loaded');
        }	
        else{
            console.log('not loaded yet');
        }
    </script>
    <script src="<?=base_url()?>js/funcionesAdmin.js"></script>
    <!-- 
    <script type="text/javascript" src="js/mootools.js"></script>
    <script type="text/javascript" src="js/moocheck.js"></script> -->

</head>