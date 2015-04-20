<html>
    <head></head>
    <body style="background-color: black">
        
        <table style="background-color: white; width: 80%; height: 100%; margin-left: 10%;">
            <tr>
                <td style="text-align:center;"><h2>ADMIN</h2></td>
            </tr>
            <tr>
                <td style="height: 100%; vertical-align: top; text-align:center; vertical-align: top;">
                    <?php 
                    $this->load->view($module."/".$view_file);
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>
