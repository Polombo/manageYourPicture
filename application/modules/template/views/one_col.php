<html>
    <head></head>
    <body style="background-color: black;">
        
        <table style="width: 80%; height: 100%; margin-left: 10%;">
            <tr>
                <td style="background-color: white;">ONE_COL LAYOUT</td>                
            </tr>
            <tr>
                <td style="background-color: yellowgreen; height: 100%; text-align:center; vertical-align: top;">
                   <?php 
                   $this->load->view($module.'/'.$view_file);
                   ?>
                </td>
            </tr>
        </table>
    </body>
</html>