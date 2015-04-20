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
                                <li><?php echo anchor(base_url().'lafundacion/presentacion','PRESENTACION'); ?> </li>
                                <li><?php echo anchor(base_url().'pdfs/estatutos.pdf','ESTATUTOS',array('target' => 'blank')); ?> </li>          
                                <li><?php echo anchor(base_url().'pdfs/patronato.pdf','PATRONATO',array('target' => 'blank')); ?> </li>
                                <li><?php echo anchor(base_url().'pdfs/CUENTAS_ANUALES_EJERCICIO_2013.pdf','MEMORIAS DE ACTIVIDAD',array('target' => 'blank')); ?> </li>
                            </ul>
                        </li>
                        <li id="menu-big" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">PROYECTOS <b class="caret"></b></a>
                            <ul id="dropdown" class="dropdown-menu"  style="text-align: left; 
                                margin: 0; padding: 0;">                       
                                <li><?php echo anchor(base_url().'proyectos/investigacion','INVESTIGACION'); ?> </li>
                                <li><?php echo anchor(base_url().'proyectos/becas','BECAS M. Paz J.C.'); ?> </li>
                                <li><?php echo anchor(base_url().'proyectos/apoyo_afectados','APOYO AFECTADOS'); ?> </li>
                                <!--                                <li class="divider"></li>-->
                                <li><?php echo anchor(base_url().'proyectos/otros_proyectos','OTROS PROYECTOS'); ?> </li>
                            </ul>
                        </li>
                        <li id="menu-big" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">NOTICIAS <b class="caret"></b></a>
                            <ul id="dropdown" class="dropdown-menu"  style="text-align: left; 
                                margin: 0; padding: 0;">
                                <li><?php echo anchor(base_url().'lafundacion/actualidad','ACTUALIDAD'); ?> </li>
                                <li><?php echo anchor(base_url().'lafundacion/agenda','AGENDA'); ?> </li>
                                <li><?php echo anchor(base_url().'lafundacion/saladeprensa','SALA DE PRENSA'); ?> </li>
                                <!--                                <li class="divider"></li>-->
                                <li><?php echo anchor(base_url().'lafundacion/eventos','EVENTOS'); ?> </li>
                            </ul>
                        </li>
                        <li id="menu-big" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">COLABORA <b class="caret"></b></a>
                            <ul id="dropdown" class="dropdown-menu"  style="text-align: left; 
                                margin: 0; padding: 0;">
                                <li><?php echo anchor(base_url().'lafundacion/donante','DONANTE'); ?> </li>
                                <li><?php echo anchor(base_url().'lafundacion/socio','SOCIO'); ?> </li>
                                <li><?php echo anchor(base_url().'lafundacion/empresa_amiga','EMPRESA AMIGA'); ?> </li>
                                <!--                                <li class="divider"></li>-->
                                <li><?php echo anchor(base_url().'lafundacion/voluntario','VOLUNTARIO'); ?> </li>
                            </ul>
                        </li>
                        <li id="menu-big" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">CONTACTO <b class="caret"></b></a>
                            <ul id="dropdown" class="dropdown-menu"  style="text-align: left; 
                                margin: 0; padding: 0;">
                                <li><?php echo anchor(base_url().'lafundacion/contacto','FORMULARIO CONTACTO'); ?> </li>
                                <li><?php echo anchor(base_url().'lafundacion/enlaces_interes','ENLACES INTERES'); ?> </li>
                                <li><?php echo anchor(base_url().'lafundacion/avisolegal','AVISO LEGAL'); ?> </li>                                
                            </ul>
                        </li>                        
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>






