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
    <style>
        body {margin: 0px;}
        #leftbar {
            position: fixed;
            top: 0px;
            width: 10%;
            height: 100%;
            background-color: lightgreen;
        }
        #leftbar a {
            position: fixed;
            background-color: limegreen;
            text-decoration: none;
            font-size: 190%;
            width: 10%;
            height: 50px;
            color: white;
            font-family: sans-serif;
        }
        #leftbar a:hover {
            background-color: green;
        }
        #page {
            position: fixed;
            margin-top: 17px;
            left: 11%;
            height: 90%;
            width: 84%;
            padding: 20px;
            border: solid 5px deepskyblue;
            border-radius: 20px;
        }

        /* Style des parametre */

        #settings-submit {
            background-color: greenyellow;
            border-radius: 20px;
        }

        /* Style de page */

        #view {
            position: fixed;
            border: 5px solid gray;
        }

        #hirachie {

        }

        #new-paragraphe {
            position: fixed;
            top: 87%;
            width: 60%;
            height: 9%;
            margin-left: 5px;
            background-color: rgb(7, 244, 240);
            border-radius: 20px;
        }
    </style>
    <title>Panel - <?=$result["name"] ?></title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <div id="leftbar">
        <a href="?p=1">menu</a>
        <a href="?p=2" style="top: 52px;">configurer</a>
        <a href="?p=3" style="top: 104px;">paragraphe</a>
        <a href="?p=4" style="top: 156px;">theme</a>
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
            <textarea name="descriptionsites" cols="50" rows="3"><?=$result["description"] ?></textarea><br>
            <input id="settings-submit" type="submit" value="Sauvegarder">
        </form>
        <?php }elseif($_GET["p"] == "3") { ?>
            <iframe src="pages/index.php" id="view" frameborder="0" height="80%" width="60%" scrolling="auto"></iframe>
            <button id="new-paragraphe"><h1>+ Ajouter paragraphe</h1></button>
            <div id="hirachie">

            </div>
            <script>
                $("#new-paragraphe").click(function() {
                    var add_paragraphe_name = prompt("Entrer le nom du paragraphe : ")
                    if(add_paragraphe_name != "") {
                        window.location.href = "request.php?t=1&name=" + add_paragraphe_name;
                    } else {
                        alert("Nom incorecte")
                    }
                })
            </script>
        <?php } ?>
    </div>
</body>
</html>