<?php
function get_fournisseur(){
    return get_table('fournisseur');
}
function get_fournisseur_by_id($id_fournisseur){
    return get_table_by_id($id_fournisseur,'fournisseur');
}
function add_fournisseur($data){
    global $db;
    $date = date('Y-m-d H:i:s');
    $query = 'INSERT INTO fournisseur (Nom,ReferenceCommerciale,Ncnss,adresse,ville,telephone,fax,IdUtilisateur,created_at) VALUES
     (:Nom,:ReferenceCommerciale,:Ncnss,:adresse,:ville,:telephone,:fax,:idUtilisateur,:created_at)';
    $statment = $db->prepare($query);
    $statment->bindValue(':Nom', $data['Nom']);
    $statment->bindValue(':ReferenceCommerciale', $data['ReferenceCommerciale']);
    $statment->bindValue(':Ncnss', $data['Ncnss']);
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
function delete_fournisseur($id){
    delete_table($id,'fournisseur');

}
function update_fournisseur($data,$id){
    global $db;
    $date = date('Y-m-d H:i:s');
    $query = 'UPDATE fournisseur set 
    Nom =:Nom,ReferenceCommerciale= :ReferenceCommerciale,
    Ncnss=:Ncnss,adresse=:adresse,
    ville=:ville,telephone=:telephone,
    fax=:fax,IdUtilisateur:=IdUtilisateur,updated_at=:updated_at
    WHERE ID = :id';
    $statment = $db->prepare($query);
    $statment->bindValue(':Nom', $data['Nom']);
    $statment->bindValue(':ReferenceCommerciale', $data['ReferenceCommerciale']);
    $statment->bindValue(':Ncnss', $data['Ncnss']);
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
