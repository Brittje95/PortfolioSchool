<?php
//Stap 1: Verbinding maken
include('connect.php');

//Stap 2: Query maken
$query = $conn->query("SELECT * FROM opdracht INNER JOIN vak ON opdracht.vakid = vak.vakid");

//Stap 3: Data ophalen
$data =  $query->fetchAll();

include('header.php');
?>
    <div class="content" style="padding-bottom: 4%;">
        <h1 class="head">CMS</h1>
        <table>
            <tr>
                <th class="tableitem">Titel</th>
                <th class="tableitem">Sprint</th>
                <th class="tableitem">Vak</th>
                <th class="tableitem">Bestand</th>
                <th class="tableitem"></th>
                <th class="tableitem"></th>
                <th class="tableitem"></th>
            </tr>
            <?php foreach ($data as $row) {?>
                <tr>
                    <td class="tableitem"><?=$row['titel'] ?></td>
                    <td class="tableitem"><?=$row['sprint'] ?></td>
                    <td class="tableitem"><?=$row['naam'] ?></td>
                    <td class="tableitem"><?=$row['bestand'] ?></td>
                    <td class="tablebutton"><a class="submit" href="update-form.php?id=<?=$row['id']?>">Bewerken</a></td>
                    <td class="tablebutton"><a class="submit" href="delete.php?id=<?=$row['id']?>">delete</a></td>
                    <td class="tableitem"></td>
                </tr> 
            <?php }?>
        </table>
        <br>
        <a href="add-form.php" class="submit">Toevoegen</a>
    </div>
    <?php include('footer.html'); ?>
</body>
</html>