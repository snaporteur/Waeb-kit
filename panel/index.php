<?php
    if(!isset($_GET["p"])) {header("Location: ?p=1");exit();}
    include '../databases.php';
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
        <a href="?p=1">menu</a><br>
        <a href="?p=2" style="top: 52px;">configurer</a><br>
        <a href="?p=3" style="top: 104px;">paragraphe</a>
    </div>
    <div id="page">
        <?php if($_GET["p"] == "1") { ?>
        <h1><?=$result["name"] ?></h1>
        <p>description : <?=$result["description"] ?></p>
        <p>Waeb kit version : V0.0.1</p>
        <?php } elseif($_GET["p"] == "2") { ?>
        <h1>Parametre classique : </h1>
        <form action="#" method="post">
            <span>Changer le nom du sites : </span>
            <input type="text" name="namesites" placeholder="<?=$result["name"] ?>"><br>
            <span>Changer la description : </span><br>
            <textarea name="descriptionsites" cols="50" rows="3"><?=$result["description"] ?></textarea>
            <input id="settings-submit" type="submit" value="Sauvegarder">
        </form>
        <?php 
            }elseif($_GET["p"] == "3") { 
                ?><form action="" method="post"><?php
                for ($i=1; $i < $result["number_paragraphe"] + 1; $i++) { 
                    $q_paragraphe = $db->prepare("SELECT `text` FROM `paragraphe` WHERE id = :id");
                    $q_paragraphe->execute(["id" => $i]);
                    $result_paragraphe = $q_paragraphe->fetch();
                    echo "<textarea name='$i'>";
                    echo $result_paragraphe["text"];
                    echo "</textarea><br>";
                }
            }
        ?></form>
    </div>
</body>
</html>