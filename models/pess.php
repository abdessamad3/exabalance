<?php

function get_pesse(){
    global $db;
    $query = 'SELECT * FROM pesse';
    $statment = $db->prepare($query);
    $statment->execute();
    $pesse = $statment->fetchALL();
     if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
    return $pesse;
}
function get_pesse_by_utilisateur($utilisateur_id){
    
    global $db;
    $query = 'SELECT * FROM pesse WHERE idUtilisateur = :idUtilisateur';
    $statment = $db->prepare($query);
    $statment->bindValue(':idUtilisateur', $utilisateur_id);
    $statment->execute();
    $pesse = $statment->fetchALL();
     if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
    return $pesse;
}

function delete_pesse($pesse_id){
    global $db;
    $query = 'DELETE FROM pesse WHERE ID = :pesse_id';
    $statment = $db->prepare($query);
    $statment->bindValue(':pesse_id',$pesse_id);
    $statment->execute();
    if($statment->errorInfo()== '00000'){
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
}
function add_pess($pesse_data){
    global $db;
    $date = date('y-m-d');
    $query = 'INSERT INTO pesse (id,matricule,Idclient,Idproduit,IdUtilisateur,Provenance,DateEntree,NCommande,PoidsBrut,Transporteur,Destination,Tare,DateSortie,IdFournisseur,annuler,created_at) VALUES
     (:id,:matricule,:idclient,:idproduit,:idUtilisateur,:provenance,:dateEntree,:nCommande,:poidsBrut,:transporteur,:destination,:tare,:DateSortie,:id_fournisseur,0,:created_at)';
    $statment = $db->prepare($query);
    $date_timp = strtotime(str_replace("/", "-",date("Y-m-d H:i:s", strtotime($pesse_data['dateEntree']))));
    $statment->bindValue(':id', $pesse_data['matricule'].$date_timp);
    $statment->bindValue(':matricule', $pesse_data['matricule']);
    $statment->bindValue(':idclient', $pesse_data['idclient']);
    $statment->bindValue(':idproduit', $pesse_data['idproduit']);
    $statment->bindValue(':idUtilisateur', $pesse_data['idUtilisateur']);
    $statment->bindValue(':provenance', $pesse_data['provenance']);
    $statment->bindValue(':dateEntree', $pesse_data['dateEntree']);
    $statment->bindValue(':nCommande', $pesse_data['nCommande']);
    $statment->bindValue(':poidsBrut', $pesse_data['poidsBrut']);
    $statment->bindValue(':transporteur', $pesse_data['transporteur']);
    $statment->bindValue(':destination', $pesse_data['destination']);
    $statment->bindValue(':tare', $pesse_data['tare']);
    $statment->bindValue(':DateSortie', $pesse_data['DateSortie']);
    $statment->bindValue(':id_fournisseur', $pesse_data['id_fournisseur']);
    $statment->bindValue(':created_at', $date);
    $statment->execute();
    if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
}
function get_pesse_by_id($id){
    global $db;
    $query = 'SELECT p.*, c.nom_CLient, a.reference, f.Nom FROM pesse as p join client as c ON c.id = p.Idclient
     join article as a on a.id = p.Idproduit
     join fournisseur as f on f.id = p.IdFournisseur WHERE p.id = :id_pesse';
    $statment = $db->prepare($query);
    $statment->bindValue(':id_pesse', $id);
    $statment->execute();
    $pesse = $statment->fetch(PDO::FETCH_ASSOC);
    if($statment->errorCode() !== '00000'){
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
    return $pesse;

}
function annuler_pesse($idpess){
    global $db;
    $query =  'UPDATE pesse SET annuler = 1 WHERE ID = :pess_id';
    $statment = $db->prepare($query);
    $statment->bindValue(':pess_id',$idpess);
    $statment->execute();
     if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
}
function update_pess($idpess,$pesse_data){
    global $db;
    $date = date('y-m-d');  
    $query = 'UPDATE pesse SET matricule = :matricule ,Idclient = :idclient ,
    Idproduit = :idproduit, IdUtilisateur= :idUtilisateur, Provenance= :provenance,
    DateEntree= :dateEntree, NCommande= :nCommande, PoidsBrut= :poidsBrut,
    Transporteur= :transporteur, Destination= :destination, Tare= :tare,
    DateSortie= :DateSortie, IdFournisseur= :id_fournisseur , annuler =0 , updated_at = :updated_at
    WHERE ID = :pess_id';
    $statment = $db->prepare($query);
    $statment->bindValue(':pess_id', $idpess);
    $statment->bindValue(':matricule', $pesse_data['matricule']);
    $statment->bindValue(':idclient', $pesse_data['idclient']);
    $statment->bindValue(':idproduit', $pesse_data['idproduit']);
    $statment->bindValue(':idUtilisateur', $pesse_data['idUtilisateur']);
    $statment->bindValue(':provenance', $pesse_data['provenance']);
    $statment->bindValue(':dateEntree', $pesse_data['dateEntree']);
    $statment->bindValue(':nCommande', $pesse_data['nCommande']);
    $statment->bindValue(':poidsBrut', $pesse_data['poidsBrut']);
    $statment->bindValue(':transporteur', $pesse_data['transporteur']);
    $statment->bindValue(':destination', $pesse_data['destination']);
    $statment->bindValue(':tare', $pesse_data['tare']);
    $statment->bindValue(':DateSortie', $pesse_data['DateSortie']);
    $statment->bindValue(':id_fournisseur', $pesse_data['id_fournisseur']);
    $statment->bindValue(':updated_at', $date);
    $statment->execute();
    if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
}

function get_matricule(){
    global $db;
    $query = 'SELECT matricule FROM pesse';
    $statment = $db->prepare($query);
    $statment->execute();
    $matricule = $statment->fetchALL(PDO::FETCH_ASSOC);
     if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
    return unique($matricule);
}
function get_id_pesse(){
    global $db;
    $query = 'SELECT id FROM pesse WHERE annuler = 0';
    $statment = $db->prepare($query);
    $statment->execute();
    $matricule = $statment->fetchALL(PDO::FETCH_ASSOC);
     if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
    return $matricule;
}

function get_matricule_av(){
    global $db;
    $query = 'SELECT id from pesse WHERE Tare = 0 and annuler = 0';
    $statment = $db->prepare($query);
    $statment->execute();
    $matrocule_av = $statment->fetchAll(PDO::FETCH_ASSOC);
    if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
    return $matrocule_av;
}