<?php
//Stap 1: Verbinding maken
include('connect.php');

//Stap 2: Query maken
$selectquery = $conn->query("SELECT vakid, naam FROM vak");

//Stap 3: Data ophalen
$selectdata =  $selectquery->fetchAll();

include('header.php');
?>
    <div class="content">
        <h1 class="head">Opdracht uploaden</h1>

        <form action="add.php" method="post" id="add-form" enctype="multipart/form-data">

            <div class="lines">
            <p>Titel: <input type="text" name="titel" placeholder="Titel"></p>
            </div>

            <div class="lines">Tekst: </div>
                <div style="width: 750px"><textarea id="editor" name="tekst" form="add-form" class="textarea">Schrijf hier je tekst...</textarea></div>
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
            <style>
                .ck-editor__editable {
                    min-height: 200px!important;
                }
            </style>
            <div class="lines"> 
                    <p class="string">
                        Selecteer bestand:
                    </p>
                    <input type="file" name="bestand" id="bestand">
            </div>

            <div class="lines">
                <p class="string">
                    Sprint: 
                </p>
                    <select class="sprint" name="sprint">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
            </div>

            <div class="lines">Vak:   
                <select name="vakid">
                    <?php foreach ($selectdata as $selectrow){ ?>
                        <option value="<?=$selectrow["vakid"]?>"><?=$selectrow["naam"]?></option>
                    <?php } ?>
                </select>
            </div>

            <input class="submit" type="submit" value="Uploaden">
        </form>   
    </div>
    <?php include('footer.html'); ?>    
</body>
</html>