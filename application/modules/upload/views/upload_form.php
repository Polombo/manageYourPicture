<?php
// Turn off all error reporting
error_reporting(0);
?>

<html>
    <head>
        <title>Upload Form</title>
    </head>
    <body>


        <?php
        //echo $error; 
        $name = str_replace('%20', ' ', $this->uri->segment(3));
        $email = $this->uri->segment(4);
        
        $url_image = str_replace('./', '', $url_image);

//                echo "miraUploadFOrm $url_image";
//                echo base_url();
        //$this->load->model('mdl_upload');
        // $image = $this->mdl_upload->getUrlImage($email);
        // echo "$image $url_image";
        // exit;

        if ($url_image !== "") {
            echo '<div class="main-wrapper">
                <p> You alredy have a picture uploaded, if you want to change it upload another picture...<p>
                        <div class="fields-wrapper">';
            echo '<img src="' . base_url() . $url_image . '">';
            echo '</div></div>';
        }
        ?>

        <?php echo form_open_multipart('upload/do_upload/' . $name . '/' . $email);
        ?>

        <input type="file" name="userfile" size="20" />

        <br /><br />

        <input type="submit" value="upload" />

    </form>

</body>
</html>