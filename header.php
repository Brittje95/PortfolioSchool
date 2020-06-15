<?php
//Stap 1: Verbinding maken
include('connect.php');


//Stap 2: Query maken
$menuquery = $conn->query("SELECT vakid, naam FROM vak");
$menudata =  $menuquery->fetchAll();

if (isset($_GET['semester'])){
$semester = $_GET['semester'];
}

if (isset($_GET['gate'])){
    $gate = $_GET['gate'];
    }

if (isset($_GET['sprint'])){
    $sprint = $_GET['sprint'];
    }

$selectquery = $conn->query("SELECT semester, gate, sprint FROM opdracht");
$selectdata = $selectquery->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="/portfolio/img/icons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/portfolio/img/icons/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="/portfolio/manifest.json">
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
</head>

<body>
    <div class="header">
        <nav>
            <ul>
                <li><a <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo "class='active'"; ?> href="index.php">Home</a></li>
                
                <?php foreach ($menudata as $menurow) {?>  
                    <li><a <?php if (isset($vakdata)){ if ($menurow['naam'] == $vakdata['naam']) echo "class='active'"; } ?>
                            href="vak.php?id=<?= $menurow['vakid']?>"><?=$menurow['naam']?></a>
                    </li>
                <?php } ?> 
            </ul>
        </nav>  
    </div>
    <!-- <div class="grid-container">
        <div class="grid-item">  
            <p>Filter</p>
            <script>
                let filteritems = ['vak', 'semester', 'gate', 'sprint'];

                let result = filteritems.filter(filteritem => filteritem.length > 5);

                console.log(result);
            </script>
        </div>
    </div> -->