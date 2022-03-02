<?php include '../databases.php';
    global $db;
    $q = $db->prepare("SELECT * FROM `sites-info`");
    $q->execute();
    $result = $q->fetch()
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
    <iframe src="../explorer.php" frameborder="0" height="90%" width="100%" id="page"></iframe>
</body>
</html>