<div id="principal_Admin">
    
    <H1><?php echo $title;?></H1>

    <?php
    
    echo anchor(base_url() . 'agenda/create/', 'Crear Agenda');

    echo "<br/><br/>";
    //aqui vamos a cargar una pagina con la tabla videos
    //$this->load->module('articulos');

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

//print_r($query);

    if (count($query) == 0) {
        echo "No hay elementos que mostrar";
    } else {
        ?>
        <div id="capa_camisetas">
            <table class="tabla_detalles">
                <tr>
                    <th>Imagen</th>
                    <th>Titulo</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Lugar</th>
                    <th>Txt Abre.</th>
                    <th>Publicado</th>
                    <th>Parrilla</th>
                    <th>Opciones</th>
                </tr>

                <?php
                $i = 0;
                foreach ($query->result() as $value) {

                    $edit_url = base_url() . "agenda/create/" . $value->idagenda;
                    $delete_url = base_url() . "agenda/delete/" . $value->idagenda;

                    /*                     * **************************************** */
                    ?>

                    <tr>

                        <td class="celda_imagen">
                            <img class="" src="<?php echo base_url() ?>fotos/<?php echo $value->imagen; ?>">
                        </td>
                        <td class="">
                            <p class="datos"><?php echo $value->titulo ?></p>
                        </td>
                        <td class="">
                            <p class="datos"><?php echo $value->fecha ?></p>
                        </td>
                        <td title="<?php echo $value->descripcion; ?>">
                            <p class="datos">
                                <?php
                                if (strlen($value->descripcion) > 40) {
                                    echo substr($value->descripcion, 0, 40) . "...";
                                } else {
                                    echo $value->descripcion;
                                }
                                ?>
                            </p>
                        </td>
                        <td class="datos center_text">
                            <p><?php echo $value->lugar; ?></p> 
                        </td>
                        <td class="datos center_text">
                            <p><?php echo $value->txt_corto; ?></p> 
                        </td>
                        <td class="datos center_text">
                            <p><?php echo $value->publicado; ?></p> 
                        </td>
                        <td class="datos center_text">
                            <p><?php echo $value->parrilla; ?></p> 
                        </td>
                        <td class="center_text">

                            <?php
                            echo anchor($edit_url, '<input type="image" src="' . base_url() . 'images/editar.png">');
                            echo "&nbsp;&nbsp;";
                            echo anchor($delete_url, '<input type="image" src="' . base_url() . 'images/eliminar.jpeg">');
                            ?>
                            <!-- <a href="#" onclick="setAccion('editarArticulo');">
                                <input type="image" src="../images/editar.png" />
                            </a>-->
                            <!--<a href="#" onclick="setAccion('eliminarArticulo');">
                                <!--<img id="" class="" src="../images/eliminar.jpeg" title="Eliminar Art.">-->
                                <!--<input type="image" src="../images/eliminar.jpeg" />
                            </a>    -->                          

                        </td>
                    <input type="hidden" name="idagenda" value="<?php echo $value->idagenda; ?>"/>
                    <input type="hidden" name="imagen" value="<?php echo $value->imagen; ?>">
                    <input type="hidden" name="titulo" value="<?php echo $value->titulo; ?>">
                    <input type="hidden" name="descripcion" value="<?php echo $value->descripcion; ?>">
                    <input type="hidden" name="txt_corto" value="<?php echo $value->txt_corto; ?>">
                    <input type="hidden" name="fecha" value="<?php echo $value->fecha; ?>">
                    <input type="hidden" name="lugar" value="<?php echo $value->lugar; ?>">
                    <input type="hidden" name="publicado" value="<?php echo $value->publicado; ?>">
                    <input type="hidden" name="parrilla" value="<?php echo $value->parrilla; ?>">
                    </tr>
                    <?php
                    /*********************************************/
                    $i++;
                }
                ?>
            </table>
        </div>
        <?php
    }
    ?>
</div>