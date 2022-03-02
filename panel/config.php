<?php include '../databases.php';
    global $db;
    $q = $db->prepare("SELECT * FROM `sites-info`");
    $q->execute();
    $result = $q->fetch();

    if(isset($_POST["namesites"]) or isset($_POST["descriptionsites"])) {
        $q = $db->prepare("UPDATE `sites-info` SET `name` = ':name', `description` = ':description' WHERE `sites-info`.`name` = 'mon sites internet'");
        $q->execute(["name" => $_POST["sitesname"]]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Panel - <?=$result["name"] ?></title>
</head>
<body>
    <div id="leftbar">
        <a href="../panel">menu</a><br>
        <a href="config.php" style="top: 52px;">configurer</a><br>
        <a href="file.php" style="top: 104px;">fichier</a>
    </div>
    <div id="page">
        <h1>Parametre classique : </h1>
        <form action="#" method="post">
            <span>Changer le nom du sites : </span>
            <input type="text" name="namesites" placeholder="<?=$result["name"] ?>"><br>
            <span>Changer la description : </span><br>
            <textarea name="descriptionsites" cols="50" rows="3"><?=$result["description"] ?></textarea>
        </form>
    </div>
</body>
</html>