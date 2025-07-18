<?php
function get_vehicule(){
    global $db;
    $query = 'SELECT * FROM vehicule';
    $statment = $db->prepare($query);
    $statment->execute();
    if($statment->errorCode() !== '00000'){
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $vehicule = $statment->fetchALL(PDO::FETCH_ASSOC);
    $statment->closeCursor();
    return $vehicule;
}

function update_vehicule($vehicule_id,$vehicule_data){
    global $db;
    $query = 'UPDATE vehicule SET matricule = :matricule ,idUtilisateur = :idutilisateur  WHERE ID = :vehicule_id';
    $statment = $db->prepare($query);
    $statment->bindValue(':matricule', $vehicule_data['matricule']);
    $statment->bindValue(':idutilisateur', $vehicule_data['idUtilisateur']);
    $statment->bindValue(':vehicule_id',$vehicule_id);
    $statment->execute();
    if($statment->errorCode() !== '00000'){
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
}
function delete_vehicule($vehicule_id){
    global $db;
    $query = 'DELETE FROM vehicule WHERE ID = :vehicule_id';
    $statment = $db->prepare($query);
    $statment->bindValue(':vehicule_id',$vehicule_id);
    $statment->execute();
    if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
}
function add_vehicule($vehicule_data){
    global $db;
    $query = 'INSERT INTO vehicule (matricule,idUtilisateur) VALUES
     (:matricule,:idUtilisateur)';
    $statment = $db->prepare($query);
    $statment->bindValue(':matricule', $vehicule_data['matricule']);
    $statment->bindValue(':idUtilisateur', $vehicule_data['idUtilisateur']);
    $statment->execute();
    $statment->closeCursor();
}