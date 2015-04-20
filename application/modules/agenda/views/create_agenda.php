<?php

if(!isset($update_id)){
    $update_id ="";
    $titulo_pag="ALTA AGENDA";
    $edit =false;
}else{
    if(is_numeric($update_id)){
        $titulo_pag="EDITAR AGENDA";
        $edit =true;
    }else{
        $titulo_pag="ALTA AGENDA";
        $edit =false;
    }
    
}

echo validation_errors('<p style="color: red;font-size: 12px;font-weight: bold; text-align: center;">','</p>');
?>
<div class="datosDiv">
    <?php 
    if(isset($modificado) && $modificado){
        ?>
        <span class="aviso">Agenda modificada Correctamente</span>
        <?php
    }
    ?>
    <H1><?php echo $titulo_pag;?></H1>
    <div id="form">
        <?php
        
        echo form_open(base_url()."agenda/submit_agenda/".$update_id);
        ?>
        <div id ="agenda" class="form_unico">            
            <span class="titulo">Titulo</span>
            <span colspan="">
                <?php
                if(!isset($titulo)){
                    $titulo="";
                }
                ?>
                <input class="txtbox_grande" type="text" name="titulo" value="<?php echo $titulo;?>">
            </span>
            <br>
            <span class="titulo">Imagen</span>
            <br>
            <span>
                <?php
                if(!isset($imagen)){
                    $imagen ="";
                }
                
                ?>
                <input type="checkbox" name="chkfile" id="chkfileAgenda" value="0" onclick="">
                <input disabled class="filebutton" type="file" id="imagenAgenda" name="imagenAgenda" value="<?php echo base_url().'fotos/'.$imagen;?>">
                
            </span>
            <br>
            <span class="titulo vtop">Descripcion</span>
            <span>
                <?php
                if(!isset($descripcion)){
                    $descripcion="";
                }
                ?>
                <textarea class="noresize small_text" name="descripcion" cols="40" rows="3" value="<?php echo $descripcion;?>"><?php echo $descripcion;?></textarea>
            </span>

            <br>
            <span class="titulo">Lugar</span>
            <span colspan="">
                <?php
                if(!isset($link)){
                    $link="";
                }
                ?>
                <input class="txtbox_grande" type="text" name="lugar" value="<?php echo $lugar;?>">
            </span>
            <br>
            <span class="titulo">Texto Abrev.</span>
            <span colspan="">
                <?php
                if(!isset($txtabrev)){
                    $txtabrev="";
                }
                ?>
                <input class="txtbox_mediano" type="text" name="txt_corto" value="<?php echo $txt_corto;?>">
            </span>
            <br>
            <span class="titulo">Fecha:</span>
            <span>
                <?php
                if(!isset($fecha)){
                    $fecha ="";
                }
                ?>
                <input id="" class="datepicker txtbox_mediano" type="text" name="fecha" value="<?php echo $fecha;?>">
            </span>
            <br>
            <span class="titulo">Publicado
                <?php
                if(isset($publicado) && $publicado ==1){
                    $publicado =1;
                    $check=TRUE;
                    echo form_checkbox('publicado',$publicado, $check);
                }else{
                    $publicado =0;
                    $check=FALSE;
                    echo form_checkbox('publicado',$publicado, $check);

                }

                ?>
            </span>
            <span class="titulo">Parrilla
            <?php
            if(isset($parrilla) && $parrilla ==1){
                $parrilla =1;
                $check=TRUE;
                echo form_checkbox('parrilla',$parrilla, $check);
            }else{
                $parrilla =0;
                $check=FALSE;
                echo form_checkbox('parrilla',$parrilla, $check);

            }
            ?>
            <br>
            <?php
            if($edit){
                ?>
                <span>
                    <?php 
                    //$edit_url = "eventos/submit_evento/".$update_id;
                    //echo anchor($edit_url, '<input type="button" name="action" value="Modificar">');
                    echo form_submit('submit', 'Modificar','class="botongris"');
                    ?>
                </span>
                <?php
            }else{
                $edit_url = base_url()."agenda/submit_agenda/";
                ?>
                <span>
                    <?php 
                    //echo anchor($edit_url, '<input type="button" name="action" value="Alta">');
                    echo form_submit('submit', 'Alta','class="botongris"');
                    ?>
                </span>
                <?php
            }
            
            ?>
            </span>
            <br>
        </div>
        
        <?php
        echo form_close();
        ?>
               
    </div>
</div>
