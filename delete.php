    <?php
        include('connect.php');

        $id = $_GET['id'];
        // sql to delete a record, use exec() because no results are returned.
        $conn->exec($sql = "DELETE FROM opdracht WHERE id='$id'");
        echo "Record deleted successfully";
        //redirect back to list
        header("Location: list.php");
        exit;
    ?>