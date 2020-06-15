<?php
//Stap 1: Verbinding maken
include('connect.php');

//Stap 2: Query maken
$selectquery = $conn->query("SELECT vakid, naam FROM vak");

//Stap 3: Data ophalen
$selectdata =  $selectquery->fetchAll();

$id = $_GET['id'];
$updatequery = $conn->query("SELECT * FROM opdracht INNER JOIN vak ON opdracht.vakid = vak.vakid WHERE id=$id");
$updatedata =  $updatequery->fetchAll();

foreach ($updatedata as $updaterow) {
    $updatetitel = $updaterow["titel"];
    $updatetekst = $updaterow["tekst"];
    $updatesprint = $updaterow["sprint"];
    $updatevaknaam = $updaterow["naam"];
    $updatebestand = $updaterow["bestand"];
}

include('header.php');
?>
    <div class="content">
        <h1 class="head">Opdracht bewerken</h1>

        <form action="update.php" method="post" id="update-form" enctype="multipart/form-data">

            <div class="lines">
            <p>Titel: <input type="text" name="titel" value="<?php echo $updatetitel; ?>"></p>
            </div>

            <div class="lines">Tekst: </div>
                <div style="width: 750px"><textarea id="editor" Name="tekst" form="update-form" class="textarea"><?php echo $updatetekst; ?></textarea></div>
                
            <script>
            ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
            </script>

            <div class="lines"> 
                    <p class="string">
                        Selecteer bestand:
                    </p>
                    <input type="file" name="bestand" id="updatebestand">
            </div>

            <div class="lines">
                <p class="string">
                    Sprint: 
                </p>
                    <select class="sprint" name="sprint">
                        <option selected="selected"><?php echo $updatesprint; ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
            </div>

            <div class="lines">Vak:   
                <select name="vakid">
                    <option value="false" selected="selected"><?= $updatevaknaam; ?></option>
                    <?php foreach ($selectdata as $selectrow){ ?>
                        <option value="<?=$selectrow["vakid"]?>"><?=$selectrow["naam"]?></option>
                    <?php } ?>
                </select>
            </div>

            <input type="hidden" value="<?= $id ?>" name="id">

            <input class="submit" type="submit" value="Uploaden">
        </form>   
    </div>
    <?php include('footer.html'); ?>    
</body>
</html>