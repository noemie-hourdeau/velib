<?php
    include('apiVelib.php')
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma carte</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class=container>
        <div class="carte">
            <div id="vel17033" class="caseVelo"><?=$_station17033['total_dispo'];?></div>
            <div id="vel8056" class="caseVelo"><?=$_station8056['total_dispo'];?></div>
            <div id="vel8057" class="caseVelo"><?=$_station8057['total_dispo'];?></div>
            <div id="vel8028" class="caseVelo"><?=$_station8028['total_dispo'];?></div>
            <div id="vel8003" class="caseVelo"><?=$_station8003['total_dispo'];?></div>
            <div id="vel16001" class="caseVelo"><?=$_station16001['total_dispo'];?></div>
            <div id="vel16103" class="caseVelo"><?=$_station16103['total_dispo'];?></div>
        </div>
        <div class="infos" id="infos">
            <div id="infos17033" class="infosVelo">
                <div class="identificationStation">
                    <div class="name"><?=$_station17033["nom_station"];?></div>
                    <div class="code"><?=$_station17033["code_station"];?></div>
                </div>

                <div class="disponibilite">
                    <div class="nbVelosTotal">
                        <img src="img/total.png" alt="total" class='picto'>
                        <span><?=$_station17033["total_dispo"];?></span>
                    </div>
                    <div class="nbVelosMecanique">
                        <img src="img/bike.png" alt="bike" class='picto'>
                        <span><?=$_station17033["velo_dispo"];?></span>
                    </div>
                    <div class="nbVelosElectric">
                        <img src="img/ebike.png" alt="ebike" class='picto'>
                        <span><?=$_station17033["evelo_dispo"];?></span>
                    </div>
                </div>

                
                
            </div>
            <div id="infos8056" class="infosVelo">
            <div class="identificationStation">
                    <div class="name"><?=$_station8056["nom_station"];?></div>
                    <div class="code"><?=$_station8056["code_station"];?></div>
                </div>

                <div class="disponibilite">
                    <div class="nbVelosTotal">
                        <img src="img/total.png" alt="total" class='picto'>
                        <span><?=$_station16001["total_dispo"];?></span>
                    </div>
                    <div class="nbVelosMecanique">
                        <img src="img/bike.png" alt="bike" class='picto'>
                        <span><?=$_station8056["velo_dispo"];?></span>
                    </div>
                    <div class="nbVelosElectric">
                        <img src="img/ebike.png" alt="ebike" class='picto'>
                        <span><?=$_station8056["evelo_dispo"];?></span>
                    </div>
                </div>
            </div>
            <div id="infos8057" class="infosVelo">
            <div class="identificationStation">
                    <div class="name"><?=$_station8057["nom_station"];?></div>
                    <div class="code"><?=$_station8057["code_station"];?></div>
                </div>

                <div class="disponibilite">
                    <div class="nbVelosTotal">
                        <img src="img/total.png" alt="total" class='picto'>
                        <span><?=$_station8057["total_dispo"];?></span>
                    </div>
                    <div class="nbVelosMecanique">
                        <img src="img/bike.png" alt="bike" class='picto'>
                        <span><?=$_station8057["velo_dispo"];?></span>
                    </div>
                    <div class="nbVelosElectric">
                        <img src="img/ebike.png" alt="ebike" class='picto'>
                        <span><?=$_station8057["evelo_dispo"];?></span>
                    </div>
                </div>
            </div>
            <div id="infos8028" class="infosVelo">
            <div class="identificationStation">
                    <div class="name"><?=$_station8028["nom_station"];?></div>
                    <div class="code"><?=$_station8028["code_station"];?></div>
                </div>

                <div class="disponibilite">
                    <div class="nbVelosTotal">
                        <img src="img/total.png" alt="total" class='picto'>
                        <span><?=$_station8028["total_dispo"];?></span>
                    </div>
                    <div class="nbVelosMecanique">
                        <img src="img/bike.png" alt="bike" class='picto'>
                        <span><?=$_station8028["velo_dispo"];?></span>
                    </div>
                    <div class="nbVelosElectric">
                        <img src="img/ebike.png" alt="ebike" class='picto'>
                        <span><?=$_station8028["evelo_dispo"];?></span>
                    </div>
                </div>
            </div>
            <div id="infos8003" class="infosVelo">
            <div class="identificationStation">
                    <div class="name"><?=$_station8003["nom_station"];?></div>
                    <div class="code"><?=$_station8003["code_station"];?></div>
                </div>

                <div class="disponibilite">
                    <div class="nbVelosTotal">
                        <img src="img/total.png" alt="total" class='picto'>
                        <span><?=$_station8003["total_dispo"];?></span>
                    </div>
                    <div class="nbVelosMecanique">
                        <img src="img/bike.png" alt="bike" class='picto'>
                        <span><?=$_station8003["velo_dispo"];?></span>
                    </div>
                    <div class="nbVelosElectric">
                        <img src="img/ebike.png" alt="ebike" class='picto'>
                        <span><?=$_station8003["evelo_dispo"];?></span>
                    </div>
                </div>
            </div>
            <div id="infos16001" class="infosVelo">
            <div class="identificationStation">
                    <div class="name"><?=$_station16001["nom_station"];?></div>
                    <div class="code"><?=$_station16001["code_station"];?></div>
                </div>

                <div class="disponibilite">
                    <div class="nbVelosTotal">
                        <img src="img/total.png" alt="total" class='picto'>
                        <span><?=$_station16001["total_dispo"];?></span>
                    </div>
                    <div class="nbVelosMecanique">
                        <img src="img/bike.png" alt="bike" class='picto'>
                        <span><?=$_station16001["velo_dispo"];?></span>
                    </div>
                    <div class="nbVelosElectric">
                        <img src="img/ebike.png" alt="ebike" class='picto'>
                        <span><?=$_station16001["evelo_dispo"];?></span>
                    </div>
                </div>
            </div>
            <div id="infos16103" class="infosVelo">
            <div class="identificationStation">
                    <div class="name"><?=$_station16103["nom_station"];?></div>
                    <div class="code"><?=$_station16103["code_station"];?></div>
                </div>

                <div class="disponibilite">
                    <div class="nbVelosTotal">
                        <img src="img/total.png" alt="total" class='picto'>
                        <span><?=$_station16103["total_dispo"];?></span>
                    </div>
                    <div class="nbVelosMecanique">
                        <img src="img/bike.png" alt="bike" class='picto'>
                        <span><?=$_station16103["velo_dispo"];?></span>
                    </div>
                    <div class="nbVelosElectric">
                        <img src="img/ebike.png" alt="ebike" class='picto'>
                        <span><?=$_station16103["evelo_dispo"];?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>