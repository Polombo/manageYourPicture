<div id="principal_Admin">

    <H1>MANAGE USERS</H1>

    <?php
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
            <div id="capa_actualidades">
                <table width="600" cellspacing="0" cellpadding="8" border="1"> 
                    <tr style="background-color: navy; color: white;">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>		
                        <th>Sign In Date</th>
                        <th>Terms</th>
                        <th>Upload Date</th>
                        <th>Url Image</th>                        
                    </tr>

                    <?php
                    foreach ($query->result() as $row) {

                        $id = $row->id;
                        $name = $row->name;
                        $email = $row->email;
                        $signIn = $row->sign_in_date;
                        $terms = $row->terms;
                        $upload_date = $row->upload_date;
                        $url_image = $row->url_image;
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>                            
                            <td><?php echo $name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $signIn; ?></td>
                            <td><?php echo $terms; ?></td>
                            <td><?php echo $upload_date; ?></td>
                            <td><?php echo $url_image; ?></td>
                        </tr>

                    <?php } ?>

                </table>
            </div>
        </div>
        <?php
    }
    ?>
</div>