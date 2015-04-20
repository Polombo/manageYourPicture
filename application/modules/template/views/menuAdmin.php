<div id="contenedor_menu">

    <h2>ELIJA UNA OPCION:</h2>

    <br>
    <div id="header">
        <ul class="nav" style="padding: .5em">
            <li style="padding: .5em">
                <?php
                echo anchor(base_url() . 'admin_dash/manage_users/', 'Users');
                ?>
            </li>        
            <li style="padding: .5em">
                <?php
                echo anchor(base_url() . 'admin/submitLogin', 'Close');
                ?>
            </li>

        </ul>
    </div>
</div><!-- div contenedormenu -->
