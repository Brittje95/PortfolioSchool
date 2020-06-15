<?php
//Stap 1: Verbinding maken
include('connect.php');

if(!isset($_GET['id']))
{
    die('Geen id');
}

$id = $_GET['id'];
//print_r($id);
$sql = "SELECT * FROM vak WHERE vakid = '$id'";
//var_dump($_GET['id']);

//Stap 2: Query maken
$query = $conn->query($sql);

//Stap 3: Data ophalen
$vakdata = $query->fetch();

//filter sprints
$sprint = $_GET['sprint'];
$sprintquery = $conn->query("SELECT * FROM opdracht WHERE vakid='$id' AND sprint='$sprint' ORDER BY semester DESC, gate, sprint ASC");
$sprintdata = $sprintquery->fetchall();

//$findsprintquery = $conn->query("SELECT * FROM opdracht WHERE sprint='$sprint'");
//$findsprintdata = $findsprintquery->fetchall();


include('header.php');
?>
    <div class="opdracht"> 
        <h1 class="head"><?=$vakdata['naam']?> - Sprint <?=$sprint = $_GET['sprint'];?></h1> 
        <div class="headtext"><?=$vakdata['toelichting']?></div>

        <?php foreach ($sprintdata as $filtersprintdata){?>
            <div class="opdrachtcontent">
                <h3 class="subhead">Sprint: <?=$filtersprintdata['sprint']?></h3>
                <h3 class="subhead">Gate: <?=$filtersprintdata['gate']?></h3>
                <h3 class="subhead">Semester: <?=$filtersprintdata['semester']?></h3>
                <h3 class="subsubhead"><?=stripslashes($filtersprintdata['titel'])?></h3>
                <div>
                    <?=stripslashes($filtersprintdata['tekst'])?>
                </div>
                <div class="link" >
                    <?php switch (mime_content_type("uploads/".$filtersprintdata['bestand'])) {
                        
                        case 'image/jpeg': ?> <img src="uploads/<?=$filtersprintdata['bestand']?>" alt="" srcset="">
                        <?php break; ?>

                        <?php case 'application/pdf': ?> <a href="uploads/<?=$filtersprintdata['bestand']?>" target="_blank">Bekijk hier het eindverslag</a>
                        <?php break; ?>
                        
                        <?php case 'image/png': ?> <img src="uploads/<?=$filtersprintdata['bestand']?>" alt="" srcset="">
                        <?php break; ?>
                        
                        <?php case 'image/gif': ?> <img src="uploads/<?=$filtersprintdata['bestand']?>" alt="" srcset="">
                        <?php break; ?>
                        
                        <?php case 'image/jpg': ?> <img src="uploads/<?=$filtersprintdata['bestand']?>" alt="" srcset="">
                        <?php break; ?>

                        <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div> 
    <?php include('footer.html'); ?>  
</body>
</html>