<?php
function get_table($table){
    global $db;
    $query = 'SELECT * FROM ' . $table;
    $statment = $db->prepare($query);
    $statment->execute();
    $result = $statment->fetchALL(PDO::FETCH_ASSOC);
     if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
    return $result;
}

function get_table_by_id($id , $table){
    global $db;
    $query = 'SELECT * FROM '.$table .' WHERE id = :id';
    $statment = $db->prepare($query);
    $statment->bindValue(':id', $id);
    $statment->execute();
    $result = $statment->fetch(PDO::FETCH_ASSOC);
     if ($statment->errorCode() !== '00000') {
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();
    return $result;
}

function delete_table($id,$table){
     global $db;
    $query = 'DELETE FROM '.$table.' WHERE ID = :id';
    $statment = $db->prepare($query);
    $statment->bindValue(':id',$id);
    $statment->execute();
    if($statment->errorInfo()== '00000'){
        $error = $statment->errorInfo();
        $statment->closeCursor();
        return $error;
    }
    $statment->closeCursor();

}
//diver
//unique data
function unique($data){
    $seen = [];
    $unique = [];
    foreach($data as $item){
        if(!in_array($item['matricule'],$seen)){
            $seen[] = $item['matricule'];
            $unique[] = $item;
        }
    }
  return $unique;
}
