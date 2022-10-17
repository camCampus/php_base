<?php
$temp_file = tempnam(sys_get_temp_dir(), 'Tux');
echo $temp_file;

//Spécifier l'endroit ou stocker le fichier (le dossier ou ce trouve le fichier upload.php)
$target_dir = "/storage";

//Spécifie ou est le fichier a upload dans array FILES
$target_name = basename($_FILES["upload_img"]["name"]);

$check_upload = 1;


 function pre_r($array){
     echo '<pre>';
     print_r($array);
     echo '</pre>';
 }
 pre_r($_FILES);



try {

    // Check undefined | Multiple Files | $_FILES Corruption Attack
    if (
        !isset($_FILES['upload_img']['error']) ||
        is_array($_FILES['upload_img']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }
    //Check upload error
    $file_error = $_FILES['upload_img']['error'];

    match ($file_error){
        UPLOAD_ERR_OK => 'No error file upload with success',

        UPLOAD_ERR_INI_SIZE =>  throw new RuntimeException('The uploaded file exceeds the upload_max_filesize directive in php.ini'),

        UPLOAD_ERR_FORM_SIZE =>  throw new RuntimeException('The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form'),

        UPLOAD_ERR_PARTIAL =>  throw new RuntimeException('The uploaded file was only partially uploaded'),

        UPLOAD_ERR_NO_FILE =>  throw new RuntimeException('No file was uploaded'),

        UPLOAD_ERR_NO_TMP_DIR =>  throw new RuntimeException('Missing a temporary folder'),

        UPLOAD_ERR_CANT_WRITE =>  throw new RuntimeException('Failed to write file to disk.'),

        UPLOAD_ERR_EXTENSION =>  throw new RuntimeException('A PHP extension stopped the file upload.'),
    };
    //Check file size
    if ($_FILES['upload_img']['size'] > 1048576) {
        throw new RuntimeException('Exceeded filesize limit');
    }

    //Check MIME type
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $file_type = array(
        'jpg'=>'image/jpeg',
        'png'=>'image/png',
        'gif'=>'image/gif'
    );

   ($ext = array_search($finfo->file($_FILES['upload_img']['tmp_name']), $file_type))? : throw new RuntimeException('Invalid file format.');


if (move_uploaded_file($_FILES["upload_img"]["tmp_name"], "./storage/".$target_name)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["upload_img"]["name"])). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

} catch (RuntimeException $e) {
    echo $e->getMessage();
}
