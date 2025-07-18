<?php
function get_article(){
    return get_table('article');
}
function get_article_by_id($id_article){
    return get_table_by_id($id_article,'article');
}
function add_article($data){
    global $db;
    $date = date('Y-m-d H:i:s');
    $query = 'INSERT INTO article (reference,designation,prixProduit,uniteProduit,IdUtilisateur,created_at) VALUES
     (:reference,:designation,:prixProduit,:uniteProduit,:idUtilisateur,:created_at)';
    $statment = $db->prepare($query);
    $statment->bindValue(':reference', $data['reference']);
    $statment->bindValue(':designation', $data['designation']);
    $statment->bindValue(':prixProduit', $data['prixProduit']);
    $statment->bindValue(':uniteProduit', $data['uniteProduit']);
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
function delete_article($id){
    delete_table($id,'article');

}
function update_article($data,$id){
    global $db;
    $date = date('Y-m-d H:i:s');
    $query = 'UPDATE article set 
    reference = :reference, designation = :designation,
    prixProduit = :prixProduit, uniteProduit = :uniteProduit,
    IdUtilisateur = :idUtilisateur, updated_at = :updated_at
    WHERE ID = :id';
    $statment = $db->prepare($query);
    $statment->bindValue(':reference', $data['reference']);
    $statment->bindValue(':designation', $data['designation']);
    $statment->bindValue(':prixProduit', $data['prixProduit']);
    $statment->bindValue(':uniteProduit', $data['uniteProduit']);
    $statment->bindValue(':idUtilisateur', $data['idUtilisateur']);
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
