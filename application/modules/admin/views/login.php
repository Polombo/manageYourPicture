<html>
    <?php 
    include_once("includes/cabeceraAdmin.php");
    ?>
    <body>
        <div id="adminLogin">
            <div id="cabecera">
                    <span>
                    Necesita introducir un usuario y una contraseña para poder acceder a este apartado de la web
                    </span>
            </div>
            <div id="datosform">
                <h1>SIGN IN</h1>
                
                <?php
                //echo base_url();
                echo validation_errors("<p style='color:blue;'>","</p>");
                
                echo form_open(base_url().'admin/submitLogin');
                
                $tmpl = array (
                            'table_open'          => '<table border="0" cellpadding="4" cellspacing="0">',

                            'row_start'           => '<tr>',
                            'row_end'             => '</tr>',
                            'cell_start'          => '<td align="center">',
                            'cell_end'            => '</td>',

                            'row_alt_start'       => '<tr>',
                            'row_alt_end'         => '</tr>',
                            'cell_alt_start'      => '<td align="center">',
                            'cell_alt_end'        => '</td>',

                            'table_close'         => '</table>'
                            );

                $this->table->set_template($tmpl);

                $data = array(
                            'name'        => 'admin',
                            'id'          => 'admin',
                            'value'       => '',
                            'style'       => '',
                            'maxlength'   => '250',
                            'class'       => 'text',
                          );
                
                $data_pass = array(
                            'name'        => 'pass',
                            'id'          => 'pass',
                            'value'       => '',
                            'style'       => '',
                            'maxlength'   => '250',
                            'class'       => 'text',
                          );

                $this->table->add_row('Administrador',  form_input($data));
                $this->table->add_row('Password',  form_password($data_pass));
                $this->table->add_row(form_submit('signin', 'Sign In'));
                echo $this->table->generate();

                echo form_close();
                    
                    
                    
                    ?>
            </div>
        </div>
    </body>
</html>
