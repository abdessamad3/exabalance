<?php
session_start();
        require_once "../models/database.php";
/**
 * __DIR__ is a magic constant in PHP that returns the directory of the current script.
 * In this context, it is used to build the path to the database.php file relative to this script's location.
 */
global $db;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Check if username/email exists
    $query = "SELECT * FROM utilisateur WHERE name = :name";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':name',$username);
    // $stmt->bindValue(':mdp',$password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // if ($user && password_verify($password, $user["mdp"])) {
        if ($user && $username == $user['name']&& password_verify($password,$user['mdp'])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["name"] = $user["name"];
        header("Location: ../?action=list_pesse");
        exit();
    } else {
        header("Location: login.php?error=authentification_non_valide");
        exit();
    }
}
?>