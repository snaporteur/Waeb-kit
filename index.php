<?php include 'databases.php';
    global $db;
    $q = $db->prepare("SELECT * FROM `sites-info`");
    $q->execute();
    $result = $q->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>acceuil - <?=$result["name"]?></title>
</head>
<body>
    <h1></h1>
</body>
</html>