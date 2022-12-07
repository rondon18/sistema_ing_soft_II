<?php

// Codigo adaptado de https://www.w3schools.com/php/php_file_upload.asp

$direct_objetivo = "img/subidas/";

$t = explode('.', $_FILES["fileToUpload"]["name"]);
var_dump($t);

$nombre_archivo = "super_foto.".$t[1];


$archivo_objetivo = $direct_objetivo . $nombre_archivo;
$estado_subida = 1;
$filetype_imagen = strtolower(pathinfo($archivo_objetivo,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
  $estado_subida = 1;
} else {
  $estado_subida = 0;
}

// Verifica si el archivo existe
if (file_exists($archivo_objetivo)) {
  unlink($archivo_objetivo);
  $estado_subida = 1;

}

// Validacion de tamaño del archivo subido
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $estado_subida = 0;
}

// Limitar los formatos elegibles de JPG, JPEG, PNG y GIF
if ($filetype_imagen != "jpg" && $filetype_imagen != "png" && 
  $filetype_imagen != "jpeg" && $filetype_imagen != "gif" ) {
  $estado_subida = 0;
}

// Check if $estado_subida is set to 0 by an error
if ($estado_subida == 0) {
  // Establecer nula la imagen en BD
} 
// Intenta subir la imagen
else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $archivo_objetivo)) {
    // Caso exitoso
    echo "Operacion exitosa";
  } else {
    // Caso Fallido
    // Establecer nula la imagen en BD
  }
}
var_dump($_FILES['fileToUpload']) ?? NULL;
var_dump($_FILES["fileToUpload"]["name"]) ?? NULL;
?>


<!DOCTYPE html>
<html>
<body>

<form action="test.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>