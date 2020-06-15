<?php
    include('connect.php');
    include("upload.php");

    // Evaluates as true because $var is set
    //var_dump($_POST);
    //die;

if (isset($_POST["titel"])) {
    
    $id = $_POST['id'];
    //echo $id;
    
    $titel = addslashes($_POST["titel"]);
    $tekst = addslashes($_POST["tekst"]);
    $bestand = $_FILES["bestand"]["name"];
    $semester = $_POST["semester"];
    $gate = $_POST["gate"];
    $sprint = $_POST["sprint"];
    $vakid = $_POST["vakid"];

    $bestandquery = "";
    if (!empty($bestand)){
        $bestandquery = "bestand='$bestand',";
    }

    // sql to update a record
    if ($vakid == "false"){
        $sql = "UPDATE `opdracht` SET titel='$titel', tekst='$tekst', $bestandquery semester='$semester', gate='$gate', sprint='$sprint' 
        WHERE id=$id";
    } else {
            $sql = "UPDATE `opdracht` SET titel='$titel', tekst='$tekst', $bestandquery semester='$semester', gate='$gate', 
            sprint='$sprint', vakid='$vakid' WHERE id=$id";
    }


    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
    
    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " De opdracht is succesvol aangepast.";
    header("Location: list.php");
}
else {
    echo "Er is iets mis gegaan. Probeer het opnieuw.";
    exit;
}
?>