<?php
//Connexion à la base de données
try{    
    $dsn = 'mysql:dbname=velib;host=127.0.0.1:8889;charset=UTF8';
    $user = 'root';
    $password = 'root';

    $bdd = new PDO($dsn, $user, $password);
}catch (PDOException $e){
     die ('Problème de connexion à la base de données');
}

//ECRIRE LE CODE ICI
//Insertion de données > récupérer données API et les mettre dans ma bdd
// $station0000 = getJsonFromAPI(0000);

$station17033 = getJsonFromAPI(17033);
$station8056 = getJsonFromAPI(8056);
$station8057 = getJsonFromAPI(8057);
$station8028 = getJsonFromAPI(8028);
$station8003 = getJsonFromAPI(8003);
$station16001 = getJsonFromAPI(16001);
$station16103 = getJsonFromAPI(16103);


setVelibData($bdd, 17033, $station17033);
setVelibData($bdd, 8056, $station8056);
setVelibData($bdd, 8057, $station8057);
setVelibData($bdd, 8028, $station8028);
setVelibData($bdd, 8003, $station8003);
setVelibData($bdd, 16001, $station16001);
setVelibData($bdd, 16103, $station16103);

//Récupération de la donnée > récupérer données récupérées




//FONCTIONS
/*
    Récupération de tous les codes stations de Vélib
    @pdo object : variable où l'on a initialisé la base de données
*/
function getAllCodeVelibStationFromBDD($pdo){
    $requete = "SELECT `code_station` FROM stations;";
    $sql = $pdo->prepare($requete);
    $sql->execute();
    if($sql->errorInfo()[0] != 00000 ){
        print_r($sql->errorInfo());
    }
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

/*
    Récupération d'une station de Vélib avec les données de disponnibilités
    @pdo object : variable où l'on a initialisé la base de données
*/
function getOneVelibStationFromBDD($pdo, $codeStation){
    $requete = "SELECT `code_station`, `nom_station`, `ouvert_dispo`, `evelo_dispo`, `velo_dispo`, `total_dispo`, `capacite_dispo` 
    FROM stations
    RIGHT JOIN `dispo` ON stations.code_station = dispo.codeStation_dispo WHERE codeStation_dispo = code_station;";
    $sql = $pdo->prepare($requete);
    $sql->bindValue(':codeStation', $codeStation, PDO::PARAM_INT);
    $sql->execute();
    if($sql->errorInfo()[0] != 00000 ){
        print_r($sql->errorInfo());
    }
    return $sql->fetch(PDO::FETCH_ASSOC);
}
/*
    Récupération de toutes les stations vélib avec les données de disponibilités
    @pdo object : variable où l'on a initialisé la base de données
*/
function getAllVelibStationFromBDD($pdo, $codeStation){
    $requete = "SELECT `code_station`, `nom_station`, `ouvert_dispo`, `evelo_dispo`, `velo_dispo`, `total_dispo`, `capacite_dispo`
    FROM `stations` RIGHT JOIN `dispo` ON `stations`.`code_station` = `dispo`.`codeStation_dispo`;";
    $sql = $pdo->prepare($requete);
    $sql->execute();
    if($sql->errorInfo()[0] != 00000 ){
        print_r($sql->errorInfo());
    }
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

/*
    Ajout ou modification des informations pour une station de Vélib
    @pdo object : variable où l'on a initialisé la base de données
*/
function setVelibData($pdo, $codeStation, $data){

    if(getOneVelibStationFromBDD($pdo, $codeStation)){
        $requeteUpdate = "UPDATE `dispo`
        SET ouvert_dispo = :ouvert_dispo, evelo_dispo = :evelo_dispo, velo_dispo = :velo_dispo, total_dispo = :total_dispo, capacite_dispo = :capacite_dispo 
        WHERE codeStation_dispo = :codeStation;";
        $sqlUpdate = $pdo->prepare($requeteUpdate);
        $sqlUpdate->bindValue(':ouvert_dispo', checkIfOpenStation($data->is_renting), PDO::PARAM_INT);
        $sqlUpdate->bindValue(':evelo_dispo', $data->ebike, PDO::PARAM_INT);
        $sqlUpdate->bindValue(':velo_dispo', $data->mechanical, PDO::PARAM_INT);
        $sqlUpdate->bindValue(':total_dispo', $data->numbikesavailable, PDO::PARAM_INT);
        $sqlUpdate->bindValue(':capacite_dispo', $data->capacity, PDO::PARAM_INT);
        $sqlUpdate->bindValue(':codeStation', $codeStation, PDO::PARAM_INT);
        $sqlUpdate->execute();
        if($sqlUpdate->errorInfo()[0] != 00000 ){
            print_r($sqlUpdate->errorInfo());
        }
    } else {
        $requeteInsert = "INSERT INTO `dispo` (`codeStation_dispo`, `ouvert_dispo`, `evelo_dispo`, `velo_dispo`, `total_dispo`, `capacite_dispo`)
        VALUES (:codeStation, :ouvert_dispo, :evelo_dispo, :velo_dispo, :total_dispo, :capacite_dispo);";
        $sqlInsert = $pdo->prepare($requeteInsert);
        $sqlInsert->bindValue(':ouvert_dispo', checkIfOpenStation($data->is_renting), PDO::PARAM_INT);
        $sqlInsert->bindValue(':evelo_dispo', $data->ebike, PDO::PARAM_INT);
        $sqlInsert->bindValue(':velo_dispo', $data->mechanical, PDO::PARAM_INT);
        $sqlInsert->bindValue(':total_dispo', $data->numbikesavailable, PDO::PARAM_INT);
        $sqlInsert->bindValue(':capacite_dispo', $data->capacity, PDO::PARAM_INT);
        $sqlInsert->bindValue(':codeStation', $codeStation, PDO::PARAM_INT);
        $sqlInsert->execute();
        if($sqlInsert->errorInfo()[0] != 00000 ){
            print_r($sqlInsert->errorInfo());
        }
        
    }

}


/*
    Vérification qu'une station est ouverte
    @data string : valeur OUI/NON de l'ouverture d'une station
*/
function checkIfOpenStation($data){
    return $data == "OUI" ? 1 : 0;
}


/* 
    Récupération des données de l'API VELIB
    @codeArret int : code de l'arrêt de vélib
*/
function getJsonFromAPI($codeArret){
    $source = "http://opendata.paris.fr/api/records/1.0/search/?dataset=velib-disponibilite-en-temps-reel&q=&facet=stationcode&refine.stationcode=".$codeArret;
    $ch = curl_init($source);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec ($ch);
    $error = curl_error($ch); 
    curl_close ($ch);

    if($error){
        error_log($error);
        die('Problème pour la récupération de données');
    }
    return json_decode($data)->records[0]->fields;
}