<?php include '../../databases.php';
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
    <style>
        body {margin-top: -21px;margin-left: 0px;margin-right: 0px;}
        #up {
            position: fixed;
            background-image: url("https://cdn.pixabay.com/photo/2021/10/11/18/58/lake-6701636_960_720.jpg");
            height: 50%;
            width: 100%;
        }
        #up #text {
            position: fixed;
            left: 45%;
            top: 15%;
            background-color: rgba(101, 101, 101, 0.20);
            color: white;
        }
        #paragraphe {
            position: fixed;
            top: 50%;
            width: 100%;
            margin-top: 10px;
            background-color: rgb(176, 175, 175);
        }
    </style>
    <title>acceuil - <?=$result["name"] ?></title>
</head>
<body>
    <div id="up"><center>
        <h1 id="text"><?=$result["name"] ?></h1>
        <h3 id="text" style="padding-top: 50px;padding-left: 25px;"><?=$result["description"] ?></h3>
    </center></div>
    <div id="paragraphe">
        <?php
            for ($i = 1; $i <= $result["count_paragraphe"]; $i++) {
                global $db;
                $q_paragraphe = $db->prepare("SELECT * FROM `paragraphe` WHERE id = :id;");
                $q_paragraphe->execute(["id" => $i]);
                $result_paragraphe = $q_paragraphe->fetch();
                ?><div class="<?=$result_paragraphe["id"] ?>" id="paragraphe">
            <h3><?=$result_paragraphe["name"] ?></h3>
            <p><?=$result_paragraphe["text"] ?></p>
        </div><?php
            }
        echo "\n";?>
    </div>
</body>
</html>