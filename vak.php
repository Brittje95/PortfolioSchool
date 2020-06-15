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
$vakdata =  $query->fetch();

// show records
$opdrachtsql = "SELECT * FROM opdracht WHERE vakid = '$id' ORDER BY sprint ASC";
$opdrachtquery = $conn->query($opdrachtsql);
$opdrachtdata =  $opdrachtquery->fetchall();

include('header.php');
?>
    <div class="opdracht"> 
        <h1 class="head"><?=$vakdata['naam']?></h1> 
        <div class="headtext"><?=$vakdata['toelichting']?></div>

        <?php foreach ($opdrachtdata as $filtervakdata){?>
            <div class="opdrachtcontent">
                <h3 class="subhead">Sprint: <?=$filtervakdata['sprint']?></h3>
                <h3 class="subsubhead"><?=stripslashes($filtervakdata['titel'])?></h3>
                <div><?=stripslashes($filtervakdata['tekst'])?></div>
                
                <div class="link" >
                    <?php switch (mime_content_type("uploads/".$filtervakdata['bestand'])) {
                        
                        case 'image/jpeg': ?> <img src="uploads/<?=$filtervakdata['bestand']?>" alt="" srcset=""> 
                        <?php break; ?>

                        <?php case 'application/pdf': ?> <a href="uploads/<?=$filtervakdata['bestand']?>" target="_blank">Bekijk hier het eindverslag</a>
                        <?php break; ?>

                        <?php case 'image/png': ?> <img src="uploads/<?=$filtervakdata['bestand']?>" alt="" srcset="">
                        <?php break; ?>

                        <?php case 'image/gif': ?> <img src="uploads/<?=$filtervakdata['bestand']?>" alt="" srcset="">
                        <?php break; ?>

                        <?php case 'image/jpg': ?> <img src="uploads/<?=$filtervakdata['bestand']?>" alt="" srcset="">
                        <?php break; ?>

                        <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div> 
    <?php include('footer.html'); ?>  
</body>
</html>