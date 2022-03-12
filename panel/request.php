<?php include '../databases.php';
    global $db;
    if($_GET["t"] == 1) {
        $q = $db->prepare("INSERT INTO `paragraphe` (`name`) VALUES (':name')");
        $q->execute([":name" => $_GET["name"]]);
    }
?>