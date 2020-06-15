<?php
    include("connect.php");
    if ($_FILES['bestand']['name'] != null) {
        $uploadquery = $conn->query("SELECT bestand FROM opdracht");
        $uploaddata =  $uploadquery->fetchAll();
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["bestand"]["name"]);
        var_dump($target_file);
        // var_dump($_FILES);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        /*$finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES['file']['tmp_name']);
        $ok = false;*/

        // Check if image file is an actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["bestand"]["tmp_name"]);
            if($check !== false) {
                echo "Bestand is een afbeelding. - " . $check["mime"] . ".";
                $uploadOk = 1;
            } 
            else {
                echo "Bestand is geen afbeelding.";
                $uploadOk = 0;
            }
        }

        /* Check if filetype is permitted
        if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            die("Upload failed with error " . $_FILES['file']['error']);
            }

        switch ($mime) {
            case 'image/jpeg':
            case 'application/pdf'
            case 'image/png'
            case 'image/gif'
            case 'image/jpg'
            $ok = true;
            default:
            die("Unknown/not permitted file type");
            }*/

            

        // Check file size
        if ($_FILES["bestand"]["size"] > 64000000) {
            echo "Sorry, het bestand is te groot. Het bestand mag niet groter zijn dan 64 MB.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, het bestand is niet geupload.";
        }

        // if everything is ok, try to upload file
        else {
            if (move_uploaded_file($_FILES["bestand"]["tmp_name"], $target_file)) {
                echo "Het bestand ". basename( $_FILES["bestand"]["name"]). " is succesvol geupload.";
                } 
            else {
                echo "Sorry, er ging iets fout bij het uploaden van je bestand.";
                }
        }
    }
?>