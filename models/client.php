<?php
function get_client(){
    return get_table('client');
}
function get_client_by_id($id_client){
    return get_table_by_id($id_client,'client');
}
function add_client($data){
    global $db;
    $date = date('Y-m-d H:i:s');
    $query = 'INSERT INTO client (nom_CLient,adresse,ville,telephone,fax,IdUtilisateur,created_at) VALUES
     (:nom_CLient,:adresse,:ville,:telephone,:fax,:idUtilisateur,:created_at)';
    $statment = $db->prepare($query);
    $statment->bindValue(':nom_CLient', $data['nom_CLient']);
    $statment->bindValue(':adresse', $data['adresse']);
    $statment->bindValue(':ville', $data['ville']);
    $statment->bindValue(':telephone', $data['telephone']);
    $statment->bindValue(':fax', $data['fax']);
    $statment->bindValue(':idUtilisateur', $data['idUtilisateur']);
    $statment->bindValue(':created_at', $date);
    $statment->execute();
    if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
}
function delete_client($id){
    delete_table($id,'client');

}
function update_client($data,$id){
    global $db;
    $date = date('Y-m-d H:i:s');
    $query = 'UPDATE client set 
    nom_CLient =:nom_CLient,adresse=:adresse,
    ville=:ville,telephone=:telephone,
    fax=:fax,IdUtilisateur:=IdUtilisateur,updated_at=:updated_at
    WHERE ID = :id';
    $statment = $db->prepare($query);
    $statment->bindValue(':nom_CLient', $data['nom_CLient']);
    $statment->bindValue(':adresse', $data['adresse']);
    $statment->bindValue(':ville', $data['ville']);
    $statment->bindValue(':telephone', $data['telephone']);
    $statment->bindValue(':fax', $data['fax']);
    $statment->bindValue(':updated_at', $date);
    $statment->bindValue(':id', $id);
    $statment->execute();
    if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
}
?>