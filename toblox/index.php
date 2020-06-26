<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Toblox page, free robux">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Theo">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Toblox</title>
        <link rel="stylesheet" type="text/css" href="./style.css">
        <script type="text/javascript" src="./main.js"></script>
        <link rel="icon" href="./favicon.ico" />
    </head>
    <body>
        <img alt="background" class="imageb" src="./background.webp">
        <img alt="Tap to play" class="play" src="./play.webp">
        <button id = "startButton" class="button" onclick="adplayer.startPreRoll(); removeLaunchButton(); bigButton(); startCounter();">x</button>
        <div class="cookiesAlert"><h4>Nous utilisons des cookies 🍪 pour fonctionner. En poursuivant la navigation, vous acceptez ces cookies.</h4></div>
        <div id="preroll"></div>

<?php
    $maintenance = false;
    $server = $_GET['server'];
    $user = $_GET['user'];
    $action = $_GET['action'];
    $userExist = false;

    if ($maintenance == true) {
        echo "
        <script type='text/javascript'>
            alert('Maintenance en cours ...');
            document.location.href='https://fortool.fr/404';
        </script>";
    }

    try {
        $database = new PDO('mysql: host=localhost; dbname=tipeeestream; charset=utf8', 'admin', 'Rz1vBcXa9SBl', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    
    $result = $database->query('SELECT * FROM profil WHERE id_discord = '.$user);
    $adminresult = $database->query("SELECT * FROM admin WHERE name = 'toblox'");
        
    while($data = $result->fetch()) {
        while($admin = $adminresult->fetch()) {
            $userExist = true;
            $count_day = $data['adin_count'];
            $count = $data['adin_play'];
            $new_count_day = $data['adin_count'] + 1;
            $new_count = $data['adin_play'] + 1;
            $new_total_count = $admin['pubs_vues'] + 1;

            echo "
        <div class='counter'>
            <h1>".$count."</h1>
            <h2>Publicités vues</h2>
            <h3>au total</h3>
            <h1>".$count_day."</h1>
            <h2>Publicités vues</h2>
            <h3>aujourd'hui</h3>
        </div>
    </body>
</html>";

            if ($data['adin_count'] > 0 && $user != '591993601433665558') {
                header("Location: https://fortool.fr/pub_unvailable");
            } else {
                if ($action == '4986256330251215') {
                    $newresult = $database->query('SELECT * FROM profil WHERE id_discord = '.$user);
                    while($newdata = $newresult->fetch()) {
                        if($newdata['adin_count'] < 2 || $user == '591993601433665558'){
                            $database->query("UPDATE profil SET adin_count = ".$new_count_day." WHERE id_discord = ".$user);
                            $database->query("UPDATE profil SET adin_play = ".$new_count." WHERE id_discord = ".$user);
                            $database->query("UPDATE admin SET pubs_vues = ".$new_total_count." WHERE name = 'toblox'");
                            $database->query("INSERT INTO toblox_log (id_discord) VALUES (".$user.")");
                        }
                        header('Location: https://fortool.fr/toblox/?user='.$user);
                    }
                }
            }
        }
    }

    if ($userExist != true) {
        header("Location: https://fortool.fr/404");
    }
?>

<script type="text/javascript">
    window.aiptag = window.aiptag || {cmd: []};
    aiptag.cmd.player = aiptag.cmd.player || [];
    aiptag.cmd.player.push(function() {
        adplayer = new aipPlayer({ 
            AIP_REWARDEDCOMPLETE: function (evt)  { alert("Pub fermée: " + evt); },
            AD_WIDTH: 960,
            AD_HEIGHT: 540,
            AD_FULLSCREEN: false,
            AD_CENTERPLAYER: true,
            LOADING_TEXT: 'Chargement de la publicite',
            PREROLL_ELEM: function(){return document.getElementById('preroll')},
            AIP_COMPLETE: function ()  {
                viewComplete()
            },
        });
    });
</script>
<script async src="//api.adinplay.com/libs/aiptag/pub/FTL/fortool.fr/tag.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var checkAdBlock = document.createElement('div');
    checkAdBlock.innerHTML = '&nbsp;';
    checkAdBlock.className = 'adsbox';
    document.body.appendChild(checkAdBlock);
    if (checkAdBlock.offsetHeight === 0) {
        window.location.href='https://fortool.fr/adblock'
    } else {
        checkAdBlock.remove();
    }
</script>