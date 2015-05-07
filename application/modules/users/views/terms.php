<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<body>
    <div class="main-wrapper">
        <div class="fields-wrapper">
            <h2>TERMS AND CONDITIONS</h2>
            <p>Please accept the Terms in order to continue...</p>
            <?php
            $name = str_replace('%20', ' ', $this->uri->segment(3));
            $email = $this->uri->segment(4);
            echo validation_errors("<p style='color:blue;'>", "</p>");            
            $attributes = array('name' => 'terms', 'id' => 'terms');
            
            $code = $_GET['code'];
            $nameInsta = $nameInsta;
            
            if ($code == ""){
                //echo "normal";
                echo form_open(base_url() . 'users/submitTerms/' . $name. '/'.$email.'/', $attributes);                
            }else{
                //echo "code $code";
                echo form_open(base_url() . 'users/submitTerms/' . $nameInsta. '/', $attributes);
            }          

            $dataterms = array(
                'name' => 'agree',
                'id' => 'agree',
                'value' => 'accept',
                'checked' => false,
                'style' => 'margin:10px',
            );

            echo form_checkbox($dataterms);

//            $this->table->add_row(form_submit('agree', 'Accept'));
            ?>
            <input id="agree" name="agree" type="button" value="Agree" onclick="checkSubmit()"></button>

            <?php
            //echo $this->table->generate();

            echo form_close();
            ?>
        </div>
    </div>