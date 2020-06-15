<?php
//Stap 1: Verbinding maken
include('connect.php');

//Stap 2: Query maken
$query = $conn->query("SELECT * FROM opdracht INNER JOIN vak ON opdracht.vakid = vak.vakid ORDER BY semester DESC, gate, sprint");

//Stap 3: Data ophalen
$data =  $query->fetchAll();

include('header.php');
?>
    <div class="content" style="padding-bottom: 4%;">
        <h1 class="head">CMS - Bestandsbeheer</h1>
        <a href="add-form.php" class="submit">Toevoegen</a>
        <br><br>
        <table>
            <tr>
                <th class="tableitem">Titel</th>
                <th class="tableitem">Sem.</th>
                <th class="tableitem">Gate</th>
                <th class="tableitem">Sprint</th>
                <th class="tableitem">Vak</th>
                <th class="tableitem">Bestand</th>
                <th class="tableitem"></th>
            </tr>
            <?php foreach ($data as $row) {?>
                <tr>
                    <td class="tableitem"><?=$row['titel'] ?></td>
                    <td class="tableitem"><?=$row['semester'] ?></td>
                    <td class="tableitem"><?=$row['gate'] ?></td>
                    <td class="tableitem"><?=$row['sprint'] ?></td>
                    <td class="tableitem"><?=$row['naam'] ?></td>
                    <td class="tableitem"><?=$row['bestand'] ?></td>
                    <td class="tablebutton"><a class="submit" href="update-form.php?id=<?=$row['id']?>">Bewerken</a></td>
                    <td class="tablebutton"><a class="submit" href="delete.php?id=<?=$row['id']?>">Verwijderen</a></td>
                    <td class="tableitem"></td>
                </tr> 
            <?php }?>
        </table>
    </div>
    <?php include('footer.html'); ?>
</body>
</html>