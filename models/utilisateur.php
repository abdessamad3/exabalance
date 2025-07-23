<?php

function get_utilisateur(){
    global $db;
    $query = 'SELECT * FROM utilisateur';
    $statment = $db->prepare($query);
    $statment->execute();
    if($statment->errorCode() !== '00000'){
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $utilisateur = $statment->fetchALL();
    $statment->closeCursor();
    return $utilisateur;
}
function get_utilisateur_name ($utilisateur_id){
    if(!$utilisateur_id){
        return "All users";
    }
    global $db;
    $query = 'SELECT * FROM utilisateur WHERE id = :utilisateur_id';
    $statment = $db->prepare($query);
    $statment->bindValue('utilisateur_id',$utilisateur_id);
    $statment->execute();
    $utilisateur = $statment->fetch();
    $statment->closeCursor();
    $utilisateur_name = $utilisateur['name'];
    return $utilisateur_name;

}

function get_utilisateur_by_id($utilisateur_id){
    if(!$utilisateur_id){
        return "All users";
    }
    global $db;
    $query = 'SELECT * FROM utilisateur WHERE id = :utilisateur_id';
    $statment = $db->prepare($query);
    $statment->bindValue('utilisateur_id',$utilisateur_id);
    $statment->execute();
    $utilisateur = $statment->fetch();
    $statment->closeCursor();
    return $utilisateur;

}

function update_utilisateur($utilisateur_id,$utilisateur_data){
    global $db;
        $utilisateur_data['mdp'] = password_hash($utilisateur_data['mdp'], PASSWORD_BCRYPT);
    $query = 'UPDATE utilisateur SET name = :name ,email = :email ,mdp = :mdp  WHERE ID = :utilisateur_id';
    $statment = $db->prepare($query);
    $statment->bindValue(':utilisateur_id',$utilisateur_id);
    $statment->bindValue(':name', $utilisateur_data['name']);
    $statment->bindValue(':email', $utilisateur_data['email']);
    $statment->bindValue(':mdp', $utilisateur_data['mdp']);
    $statment->execute();
    if($statment->errorCode() !== '00000'){
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
}
function delete_utilisateur($utilisateur_id){
    global $db;
    $query = 'DELETE FROM utilisateur WHERE ID = :utilisateur_id';
    $statment = $db->prepare($query);
    $statment->bindValue(':utilisateur_id',$utilisateur_id);
    $statment->execute();
    if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
}
function add_utilisateur($utilisateur_data){
    global $db;
    // $utilisateur_data['mdp'] = password_hash($utilisateur_data['mdp'], PASSWORD_BCRYPT);
    $utilisateur_data['mdp'] = md5($utilisateur_data['mdp']);
    $query = 'INSERT INTO utilisateur (name,email,mdp) VALUES
     (:name,:email,:mdp)';
    $statment = $db->prepare($query);
    $statment->bindValue(':name', $utilisateur_data['name']);
    $statment->bindValue(':email', $utilisateur_data['email']);
    $statment->bindValue(':mdp', $utilisateur_data['mdp']);
    $statment->execute();
    $statment->closeCursor();
}