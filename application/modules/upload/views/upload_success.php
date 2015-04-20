<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
<?php 
            $name = str_replace('%20', ' ', $this->uri->segment(3));
            $email = $this->uri->segment(4);
            
            echo "remira $name $email";

foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>

<?php 
if ($item == 'file_name') echo '<img src="'.base_url ().'uploads/images/upload/'.$value.'" alt="Mountain View" style="width:304px;height:228px">';


endforeach; ?>
</ul>

<p><?php echo anchor('users/manage/'.$name.'/'.$email, 'Upload Another File!'); ?></p>

</body>
</html>