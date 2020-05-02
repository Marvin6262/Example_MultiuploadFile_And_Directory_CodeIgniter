<!DOCTYPE html>
<html>
<head>
    <title>Upload Image in Codeigniter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php echo form_open_multipart('Welcome/file_data'); //Harus Menggunakan form_open_multipath kalau menggunakan Action diseblahnya ditambah enctype="multipart/form-data" ?>  
<input type="text"  name="Nama" value="" required>
<input type="file"  name="fotopost" value="" required>
<input type="file"  name="fotopost2" value="" required>
<button type="submit" name="submit" value="upload"class="btn btn-primary btn-block">
									submit
									</button>
<?php echo form_close(); ?>


</body>


<?php
foreach ($h->result() as $row){?>
 <img src="<?php echo base_url().'uploads/kk/'.$row ->foto ; //Untuk Memanggil data foto ?>"/>
 <img src="<?php echo base_url().'uploads/ktp/'.$row ->foto2; //Untuk Memanggil data foto ?>"/>
<?php } ?>
</html>

