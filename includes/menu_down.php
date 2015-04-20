<script>
    $(document).ready(function() {
        $("#menu_up").on("click", "ul.inline>li a", function(event) {
            var direccion = $(this).attr('href');
            $("#menu_up .active").removeClass("active");
            $(this).find('li:first').addClass("active");
            $(this).parent().addClass('active');
        });
    });
</script>  
<div class="mov-show">
    <div class="row">
        <div class="span0">   
            <nav id="menu" ><!--class="hidden-phone"-->
                <div class="b-e cont990">
                    <div class="b-i" id="menu_up">
                        <ul class="inline" id="">
                            <li id="menu-big" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">LA FUNDACION <b class="caret"></b></a>
                                <ul id="dropdown" class="dropdown-menu"  style="text-align: left; 
                                    margin: 0; padding: 0;">
                                    <li><?php echo anchor(base_url() . 'lafundacion/presentacion', 'PRESENTACION'); ?> </li>
                                    <li><a href="#">ESTATUTOS</a></li>
                                    <!--                                <li class="divider"></li>-->
                                    <li><a href="#">PATRONATO</a></li>
                                    <li><a href="#">MEMORIAS DE ACTIVIDAD</a></li>
                                </ul>
                            </li>
                            <li id="menu_business" class="menu_business">
                                <a href="proyectos.php" id="header_business_title" class="i18n_string">PROYECTOS</a>
                            </li>                            
                            <li id="menu_map" class="menu_map">
                                <a href="noticias.php" id="header_coverage_title" class="i18n_string">NOTICIAS</a>
                            </li>
                            <li id="menu_support" class="menu_support">
                                <a href="colabora.php" id="header_help_title" class="i18n_string">COLABORA</a>
                            </li>
                            <li id="menu_support" class="menu_support">
                                <a href="contacto.php" id="header_help_title" class="i18n_string">CONTACTO</a>
                            </li>                        
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>





