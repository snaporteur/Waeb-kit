<?php include '../databases.php';
    global $db;
    $q = $db->prepare("SELECT * FROM `sites-info`");
    $q->execute();
    $result = $q->fetch();
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
        <a href="">menu</a><br>
        <a href="config.php" style="top: 52px;">configurer</a><br>
        <a href="file.php" style="top: 104px;">fichier</a>
    </div>
    <div id="page">
        <h1><?=$result["name"] ?></h1>
        <p>description : <?=$result["description"] ?></p>
        <p>Waeb kit version : V0.0.1</p>
    </div>
</body>
</html>