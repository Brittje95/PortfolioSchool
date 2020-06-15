<?php
//Stap 1: Verbinding maken
include('connect.php');


//Stap 2: Query maken
$menuquery = $conn->query("SELECT vakid, naam FROM vak");
$menudata =  $menuquery->fetchAll();

if (isset($_GET['sprint'])){
$sprint = $_GET['sprint'];
}

$sprintselectquery = $conn->query("SELECT sprint FROM opdracht");
$sprintselectdata = $sprintselectquery->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Portfolio</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="manifest" href="manifest.json">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
</head>

<body>
    <div class="header">
        <nav>
            <ul>
                <li><a <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo "class='active'"; ?> href="index.php">HOME</a></li>
                
                <?php foreach ($menudata as $menurow) {?>  
                    <li>
                        <a <?php if (isset($vakdata)){ if ($menurow['naam'] == $vakdata['naam']) echo "class='active'"; } ?>
                            href="vak.php?id=<?= $menurow['vakid']?>"><?=$menurow['naam']?></a>
                        <ul class="dropdown">
                                <li><a <?php if (isset($sprint)){if (($menurow['naam'] == $vakdata['naam']) && ($sprint == 1)){ echo "class='active'" ;}} ?>
                                        href="sprint.php?id=<?= $menurow['vakid']?>&sprint=1">Sprint 1</a></li>

                                <li><a <?php if (isset($sprint)){if (($menurow['naam'] == $vakdata['naam']) && ($sprint == 2)){ echo "class='active'" ;}} ?>
                                href="sprint.php?id=<?= $menurow['vakid']?>&sprint=2">Sprint 2</a></li>

                                <li><a <?php if (isset($sprint)){if (($menurow['naam'] == $vakdata['naam']) && ($sprint == 3)){ echo "class='active'" ;}} ?>
                                href="sprint.php?id=<?= $menurow['vakid']?>&sprint=3">Sprint 3</a></li>

                                <li><a <?php if (isset($sprint)){if (($menurow['naam'] == $vakdata['naam']) && ($sprint == 4)){ echo "class='active'" ;}} ?>
                                href="sprint.php?id=<?= $menurow['vakid']?>&sprint=4">Sprint 4</a></li>

                                <li><a <?php if (isset($sprint)){if (($menurow['naam'] == $vakdata['naam']) && ($sprint == 5)){ echo "class='active'" ;}} ?>
                                href="sprint.php?id=<?= $menurow['vakid']?>&sprint=5">Sprint 5</a></li>
                          
                        </ul>
                    </li>
                <?php } ?> 
            </ul>
        </nav>  
    </div>