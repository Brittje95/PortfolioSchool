<?php 
include("connect.php"); 
include("upload.php");

// Evaluates as true because $var is set
if (isset($_POST["titel"])) {
    
    $titel = addslashes($_POST["titel"]);
    $tekst = addslashes($_POST["tekst"]);
    $bestand = $_FILES["bestand"]["name"];
    $semester = $_POST["semester"];
    $gate = $_POST["gate"];
    $sprint = $_POST["sprint"];
    $vakid = $_POST["vakid"];

    // sql to insert a record
    $sql = "INSERT INTO opdracht (titel, tekst, bestand, semester, gate, sprint, vakid) VALUES ('$titel', '$tekst', '$bestand', '$semester', '$gate', 
    '$sprint', '$vakid')";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Bestand uploaden is geslaagd.";
    header("Location: list.php");
}
else {
    echo "Er is iets mis gegaan. Probeer het opnieuw.";
    exit;
}
?>