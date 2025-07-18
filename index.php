<?php
require('models/database.php');
require('models/pess.php');
require('models/utilisateur.php');
require('models/get_pesse.php');
require('models/client.php');
require('models/demo.php');
require('models/article.php');
require('models/fournisseur.php');
session_start();
if (!isset($_SESSION["user_id"])) {
    // include('auth/login.php');
    header("Location: auth/login.php");
    exit();
}
//pesse-----------------------------------------------------------------------------------------------------------------------------------------------

$pesse_id = filter_input(INPUT_POST,'pesse_id',FILTER_DEFAULT);
if(!$pesse_id){
    $pesse_id = filter_input(INPUT_GET,'pesse_id',FILTER_DEFAULT);
}
$matricule = filter_input(INPUT_POST, 'matricule', FILTER_DEFAULT );
if(!$matricule){
    $matricule = filter_input(INPUT_GET, 'matricule', FILTER_DEFAULT );
}
$idclient = filter_input(INPUT_POST, 'idclient', FILTER_VALIDATE_INT);
$idproduit = filter_input(INPUT_POST, 'Idproduit', FILTER_VALIDATE_INT);
$idUtilisateur = filter_input(INPUT_POST, 'IdUtilisateur' , FILTER_VALIDATE_INT);
if(!$idUtilisateur){
    $idUtilisateur = filter_input(INPUT_GET, 'IdUtilisateur', FILTER_VALIDATE_INT);
}
$provenance = filter_input(INPUT_POST, 'Provenance', FILTER_SANITIZE_STRING);
$dateEntree = filter_input(INPUT_POST, 'DateEntree', FILTER_SANITIZE_STRING);
$nCommande = filter_input(INPUT_POST, 'NCommande', FILTER_SANITIZE_STRING);
$poidsBrut = filter_input(INPUT_POST, 'PoidsBrut', FILTER_VALIDATE_FLOAT);
$transporteur = filter_input(INPUT_POST, 'Transporteur', FILTER_SANITIZE_STRING);
$destination = filter_input(INPUT_POST, 'Destination', FILTER_SANITIZE_STRING);
$tare = filter_input(INPUT_POST, 'Tare', FILTER_VALIDATE_FLOAT);
$dateSortie = filter_input(INPUT_POST, 'DateSortie', FILTER_SANITIZE_STRING);
$IdFournisseur = filter_input(INPUT_POST, 'IdFournisseur', FILTER_VALIDATE_INT);

//utilisateur---------------------------------------------------------------------------------------------------------------
$name = filter_input(INPUT_POST,'name',FILTER_DEFAULT);
$email =filter_input(INPUT_POST,'email',FILTER_DEFAULT);
$mdp =filter_input(INPUT_POST,'mdp',FILTER_DEFAULT);

//article--------------------------------------------------------------------------------------------------------------------
$id_article = filter_input(INPUT_POST,'id_article', FILTER_DEFAULT);
if(!$id_article){
    $id_article = filter_input(INPUT_GET,'id_article', FILTER_DEFAULT);
}
$reference = filter_input(INPUT_POST,'reference', FILTER_DEFAULT);
if(!$reference){
    $reference = filter_input(INPUT_GET,'reference', FILTER_DEFAULT);
}
$designation = filter_input(INPUT_POST,'designation', FILTER_DEFAULT);
if(!$designation){
    $designation = filter_input(INPUT_GET,'designation', FILTER_DEFAULT);
}
$prixProduit = filter_input(INPUT_POST,'prixProduit', FILTER_DEFAULT);
if(!$prixProduit){
    $prixProduit = filter_input(INPUT_GET,'prixProduit', FILTER_DEFAULT);
}
$uniteProduit = filter_input(INPUT_POST,'uniteProduit', FILTER_DEFAULT);
if(!$uniteProduit){
    $uniteProduit = filter_input(INPUT_GET,'uniteProduit', FILTER_DEFAULT);
}

//fournisseur -----------------------------------------------------------------------------------------------------------------------------------
$id_fournisseur = filter_input(INPUT_POST, 'id_fournisseur',FILTER_DEFAULT);
if(!$id_fournisseur){
    $id_fournisseur = filter_input(INPUT_GET,'id_fournisseur',FILTER_DEFAULT);
}
$nom_fournisseur = filter_input(INPUT_POST, 'nom_fournisseur',FILTER_DEFAULT);
if(!$nom_fournisseur){
    $nom_fournisseur = filter_input(INPUT_GET,'nom_fournisseur',FILTER_DEFAULT);
}
$reference_commerciale = filter_input(INPUT_POST, 'reference_commerciale',FILTER_DEFAULT);
if(!$reference_commerciale){
    $reference_commerciale = filter_input(INPUT_GET,'reference_commerciale',FILTER_DEFAULT);
}
$identificateur_fiscal = filter_input(INPUT_POST, 'identificateur_fiscal',FILTER_DEFAULT);
if(!$identificateur_fiscal){
    $identificateur_fiscal = filter_input(INPUT_GET,'identificateur_fiscal',FILTER_DEFAULT);
}
$cnss = filter_input(INPUT_POST, 'cnss',FILTER_DEFAULT);
if(!$cnss){
    $cnss = filter_input(INPUT_GET,'cnss',FILTER_DEFAULT);
}
$adresse = filter_input(INPUT_POST, 'adresse',FILTER_DEFAULT);
if(!$adresse){
    $adresse = filter_input(INPUT_GET,'adresse',FILTER_DEFAULT);
}
$ville = filter_input(INPUT_POST, 'ville',FILTER_DEFAULT);
if(!$adresse){
    $ville = filter_input(INPUT_GET,'ville',FILTER_DEFAULT);
}
$telephone = filter_input(INPUT_POST, 'telephone',FILTER_DEFAULT);
if(!$telephone){
    $telephone = filter_input(INPUT_GET,'telephone',FILTER_DEFAULT);
}
$fax = filter_input(INPUT_POST, 'fax',FILTER_DEFAULT);
if(!$fax){
    $fax = filter_input(INPUT_GET,'fax',FILTER_DEFAULT);
}
//client------------------------------------------------------------------------------------------------------------------------------
$id_client = filter_input(INPUT_POST, 'id_client',FILTER_DEFAULT);
if(!$id_client){
    $id_client = filter_input(INPUT_GET,'id_client',FILTER_DEFAULT);
}
$nom_client = filter_input(INPUT_POST, 'nom_client',FILTER_DEFAULT);
if(!$nom_client){
    $nom_client = filter_input(INPUT_GET,'nom_client',FILTER_DEFAULT);
}
// $adresse = filter_input(INPUT_POST, 'adresse',FILTER_DEFAULT);
// if(!$adresse){
//     $adresse = filter_input(INPUT_GET,'adresse',FILTER_DEFAULT);
// }
// $ville = filter_input(INPUT_POST, 'ville',FILTER_DEFAULT);
// if(!$adresse){
//     $ville = filter_input(INPUT_GET,'ville',FILTER_DEFAULT);
// }
// $telephone = filter_input(INPUT_POST, 'telephone',FILTER_DEFAULT);
// if(!$telephone){
//     $telephone = filter_input(INPUT_GET,'telephone',FILTER_DEFAULT);
// }
// $fax = filter_input(INPUT_POST, 'fax',FILTER_DEFAULT);
// if(!$fax){
//     $fax = filter_input(INPUT_GET,'fax',FILTER_DEFAULT);
// }
$urlError = filter_input(INPUT_GET,'error',FILTER_DEFAULT);


$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action){
        $action = 'list_pesse' ;
    }
}

switch($action){
    //start login ------------------------------------------------------------------------------------------------------------------------------
    case 'logout' :
        include("auth/logout.php"); 
    break;
    case 'login' :
        $urlError= $urlError;
        include('auth/login.php'); 
    break;
    //end login ------------------------------------------------------------------------------------------------------------------------------
    //start utilisateur -----------------------------------------------------------------------------------------------------------------------
    case 'list_utilisateur':
        $utilisateurs = get_utilisateur();
        $get_utilisateur_by_id = get_utilisateur_by_id($idUtilisateur);
            include('view/utilisateur_list.php');
        break;
    case 'add_utilisateur' :
        if($name && $email && $mdp){
            $data = array( 'name'=>$name, 'email'=> $email, 'mdp'=> $mdp);
            add_utilisateur($data);
            header("location: .?action=list_utilisateur");
        } else {
            $error = "invalid pesse data. check all fields and try again";
            include('view/error.php');
            exit();
        }
    break;
    case 'update_utilisateur' : 
        if($idUtilisateur && $name && $email && $mdp){
            $data = array('name'=>$name, 'email'=> $email, 'mdp'=> $mdp);
            $error = update_utilisateur($idUtilisateur,$data);
            if($error){
                $error = json_encode($error);
                include('view/error.php');
            }else {
                header("location: .?action=list_utilisateur");
            }
        }else { 
        }
        break;
    case 'delete_utilisateur' : 
        if($idUtilisateur){
            $error = delete_utilisateur($idUtilisateur);
            if($error){
                $error = json_encode($error);
                include('view/error.php');
            }else{
                header("location: .?action=list_utilisateur");
            }
        }else{

        }
        break;
        //end utilisateur ---------------------------------------------------------------------------------------------------
        //start article --------------------------------------------------------------------------------------------------------
        case 'list_article' : 
            $articles = get_article();
            $article = get_article_by_id($id_article);
        include('view/article_view.php');
        break;
        case 'article_update' :
            $article = get_article_by_id($id_article);
            $articles = get_article();
            include('view/article_view.php');
        break;
        case 'function_add_article' :
            if($reference){
                $data = array(
                    'reference' => $reference,
                    'designation'=> $designation,
                    'prixProduit' => $prixProduit,
                    'uniteProduit' => $uniteProduit,
                    'idUtilisateur'=> $idUtilisateur
                );
                $error = add_article($data);
                if($error){
                    $error= json_encode($errror);
                header("location: .?action=list_artilce&error=".$error);
                }else {
                $success="le fournisseur a bien été ajouter";
                header("location: .?action=list_artilce&success=".$success);  
                }
                break;
            }else{
                $error = "invalid article data. check all fields and try again";
                header("location: .?action=list_artilce&error=".$error);
                exit();
            }
        break;
        case "function_update_article" :
            if($reference){
                $data = array(
                    'reference' => $reference,
                    'designation'=> $designation,
                    'prixProduit' => $prixProduit,
                    'uniteProduit' => $uniteProduit,
                    'idUtilisateur'=> $idUtilisateur
                );
                $error = update_article($data,$id_article);
                if($error){
                    $error= json_encode($errror);
                header("location: .?action=list_artilce&error=".$error);
                }else {
                    $success="le fournisseur a bien été modifier";
                header("location: .?action=list_artilce&success=".$success);
                }
                break;
            }else{
                $error = "invalid article data. check all fields and try again";
                header("location: .?action=list_artilce&error=".$error);
                exit();
            }
        break;
        case 'function_delete_article' : 
        if($id_article){
            $error = delete_article($id_article);
            if($error){
                $error = json_encode($error);
                header("location: .?action=list_artilce&error=".$error);
            }else{
                $success="le fournisseur a bien été suprimer";
                header("location: .?action=list_artilce&success=".$success);
            }
        }else{
                $error = "invalid article data. check all fields and try again";
                header("location: .?action=list_artilce&error=".$error);
                exit();
            }
            
        break;
        //end article -------------------------------------------------------------------------------------------------------------------------------------
        //start fournisseur---------------------------------------------------------------------------------------------------------------------------------
        case 'list_fournisseur' : 
            $fournisseurs = get_fournisseur();
            if($id_fournisseur){
                $fournisseur = get_fournisseur_by_id($id_fournisseur);
            }
        include('view/fournisseur_view.php');
        break;
        case 'fournisseur_update' :
            $fournisseurs = get_fournisseur();
            if($id_fournisseur){
                $fournisseur = get_fournisseur_by_id($id_fournisseur);
            }
            include('view/fournisseur_view.php');
        break;
        case 'function_add_fournisseur' :
            if($nom_fournisseur){
                $data = array(
                    'Nom' => $nom_fournisseur,
                    'ReferenceCommerciale'=> $reference_commerciale,
                    'Ncnss' => $cnss,
                    'adresse' => $adresse,
                    'ville' => $ville,
                    'telephone' => $telephone,
                    'fax' => $fax,
                    'idUtilisateur'=> $idUtilisateur
                );
                $error = add_fournisseur($data);
                if($error){
                    $error= json_encode($errror);
                    header("location: .?action=list_fournisseur&error=".$error);
                }else {
                    $success="le fournisseur a bien été ajouter";
                header("location: .?action=list_fournisseur&success=".$success);
                }
                break;
            }else{
                $error = "invalid fournisseur data. check all fields and try again";
                header("location: .?action=list_fournisseur&error=".$error);
                exit();
            }
        break;
        case "function_update_fournisseur" :
            if($nom_fournisseur){
                $data = array(
                    'Nom' => $nom_fournisseur,
                    'ReferenceCommerciale'=> $reference_commerciale,
                    'Ncnss' => $cnss,
                    'adresse' => $adresse,
                    'ville' => $ville,
                    'telephone' => $telephone,
                    'fax' => $fax,
                    'idUtilisateur'=> $idUtilisateur
                );
                $error = update_fournisseur($data,$id_fournisseur);
                if($error){
                    $error= json_encode($error);
                header("location: .?action=list_fournisseur&error=".$error);
                }else {
                    $success="le fournisseur a bien été modifier";
                header("location: .?action=list_fournisseur&success=".$success);
                }
                break;
            }else{
                $error = "invalid fournisseur data. check all fields and try again";
                header("location: .?action=list_fournisseur&error=".$error);
                exit();
            }
        break;
        case 'function_delete_fournisseur' : 
        if($id_fournisseur){
            $error = delete_fournisseur($id_fournisseur);
            if($error){
                $error = json_encode($error);
                header("location: .?action=list_fournisseur&error=".$error);
            }else{
                $success="le fournisseur a bien été suprimer";
                header("location: .?action=list_fournisseur&success=".$success);
            }
        }else{
                $error = "invalid fournisseur data. check all fields and try again";
                header("location: .?action=list_fournisseur&error=".$error);
                exit();
            }
        break;
        //end fournisseur--------------------------------------------------------------------------------------------------------------------------
        //start client------------------------------------------------------------------------------------------------------------------------------
        case 'list_client' : 
            $clients = get_client();
            if($id_client){
                $client = get_client_by_id($id_client);
            }
        include('view/client_view.php');
        break;
        case 'client_update' :
            $clients = get_client();
            if($id_client){
                $client = get_client_by_id($id_client);
            }
            include('view/client_view.php');
        break;
        case 'function_add_client' :
            if($nom_client){
                $data = array(
                    'nom_CLient' => $nom_client,
                    'adresse' => $adresse,
                    'ville' => $ville,
                    'telephone' => $telephone,
                    'fax' => $fax,
                    'idUtilisateur'=> $idUtilisateur
                );
                $error = add_client($data);
                if($error){
                    $error= json_encode($errror);
                    header("location: .?action=list_client&error=".$error);
                }else {
                    $success="le client a bien été ajouter";
                    header("location: .?action=list_client&success=".$success);
                }
                break;
            }else{
                $error = "invalid client data. check all fields and try again";
                header("location: .?action=list_client&error=".$error);
                exit();
            }
        break;
        case "function_update_client" :
            if($nom_client){
                $data = array(
                    'nom_CLient' => $nom_client,
                    'adresse' => $adresse,
                    'ville' => $ville,
                    'telephone' => $telephone,
                    'fax' => $fax,
                    'idUtilisateur'=> $idUtilisateur
                );
                $error = update_client($data,$id_client);
                if($error){
                   $error = json_encode($error);
                header("location: .?action=list_client&error=".$error);
                }else {
                    $success="le client a bien été modifier";
                header("location: .?action=list_client&success=".$success);
                }
                break;
            }else{
                $error = "invalid client data. check all fields and try again";
                header("location: .?action=list_client&error=".$error);
                exit();
            }
        break;
        case 'function_delete_client' : 
        if($id_client){
            $error = delete_client($id_client);
            if($error){
                $error = json_encode($error);
                header("location: .?action=list_client&error=".$error);
            }else{
                 $success="le client a bien été suprimer";
                header("location: .?action=list_client&success=".$success);
            }
        }else{
                $error = "invalid client data. check all fields and try again";
                header("location: .?action=list_client&error=".$error);
                exit();
            }
        break;
        //end client ------------------------------------------------------------------------------------------------------------------------------------
        //start pesse -----------------------------------------------------------------------------------------------------------------------------------
    case 'function_add_pesse' :  
        if($matricule && $idclient && $idproduit && $idUtilisateur && $dateEntree && $IdFournisseur){
            $data = array(
                'matricule' => $matricule,
                'idclient' => $idclient,
                'idproduit' => $idproduit,
                'idUtilisateur' => $idUtilisateur,
                'provenance' => $provenance,
                'dateEntree' => $dateEntree,
                'nCommande' => $nCommande,
                'poidsBrut' => $poidsBrut,
                'transporteur' => $transporteur,
                'destination' => $destination,
                'tare' => $tare,
                'DateSortie' => $dateSortie,
                'id_fournisseur' => $IdFournisseur,
                // 'annuler' => $annuler, // Uncomment and define $annuler if needed
            );
            $error =add_pess($data);
            if($error){
                $error = json_encode($error);
                header("location: .?action=list_pesse&error=".$error);
            }else{
                $success="la pesse a bien été ajouter";
                header("location: .?action=list_pesse&success=".$success);
            }
            break;
        } else {
            $error = "invalid pesse data. check all fields and try again";
            include('view/error.php');
            exit();
        }
    break;
    case 'function_update_pesse' :   
        if($matricule && $idclient && $idproduit && $idUtilisateur && $dateEntree && $pesse_id && $IdFournisseur){
            $data = array(
                'matricule' => $matricule,
                'idclient' => $idclient,
                'idproduit' => $idproduit,
                'idUtilisateur' => $idUtilisateur,
                'provenance' => $provenance,
                'dateEntree' => $dateEntree,
                'nCommande' => $nCommande,
                'poidsBrut' => $poidsBrut,
                'transporteur' => $transporteur,
                'destination' => $destination,
                'tare' => $tare,
                'DateSortie' => $dateSortie,
                'id_fournisseur' => $IdFournisseur,
                // 'annuler' => $annuler, // Uncomment and define $annuler if needed
            );
            $error =update_pess($pesse_id,$data);
            if($error){
                $error = json_encode($error);
                header("location: .?action=final_pesse&pesse_id=" . urlencode($pesse_id)."&error=". $error);
            }else{
                $success = 'la pesse a bien été modifier';
                header("location: .?action=final_pesse&pesse_id=" . urlencode($pesse_id)."&success=". $success);
            }
            break;
        } else {
            $error = "invalid pesse data. check all fields and try again";
            include('view/error.php');
            header("location: .?action=list_pesse&error=". $error);
            exit();
        }
    break;
    case 'function_delete_pesse' : 
        if($pesse_id){
            $error = delete_pesse($pesse_id);
            if($error){
                $error = json_encode($error);
                header("location: ?action=list_pesse&error=".$error);
            }else{
                $success= 'la pesse a bien été suprimer ';
                header("location: ?action=list_pesse&success=".$success);
            }
        }
        break;
    case 'function_annuler_pesse' : 
        if($pesse_id){
            $error = annuler_pesse($pesse_id);
            if($error){
                $error = json_encode($error);
                header("location: ?action=list_pesse&error=".$error);
            }else{
                $success= 'la pesse a bien été annuler ';
                header("location: ?action=list_pesse&success=".$success);
            }
        }
        break;
        case 'list_pesse' :
            $poids = getpesse();
            $matricules_av = get_matricule_av();
            $matricules = get_matricule();
            $id_pesses = get_id_pesse();
            $articles = get_article('article');
            $fournisseurs = get_fournisseur('fournisseur');
            $clients = get_client('client') ;
            $pesse_by_id = get_pesse_by_id($matricule);
            $date = date('Y-m-d\TH:i',strtotime('-1 hour'));
            include('view/pesse_list.php');
            break;
        case 'pesse_update' :
            $poids = getpesse();
            $matricules_av = get_matricule_av();
            $matricules = get_matricule();
            $id_pesses = get_id_pesse();
            $articles = get_article('article');
            $fournisseurs = get_fournisseur('fournisseur');
            $clients = get_client('client') ;
            $pesse_by_id = get_pesse_by_id($pesse_id);
            $date = date('Y-m-d\TH:i',strtotime('-1 hour'));
            include('view/pesse_list.php');
            break;
        // case 'pesse_recherche_all' :
        //     $matricules = get_matricule();
        //     break; 
        // case 'pesse_recherche_available' : 
        //     $matricules = get_matricule_av();
        //     break; 
        case 'final_pesse' : 
            $poids = getpesse();
            $matricules_av = get_matricule_av();
            $matricules = get_matricule();
            $id_pesses = get_id_pesse();
            $articles = get_article('article');
            $fournisseurs = get_fournisseur('fournisseur');
            $clients = get_client('client') ;
            $pesse_by_id = get_pesse_by_id($pesse_id);
            $date = date('Y-m-d\TH:i',strtotime('-1 hour'));
            include('view/pesse_list.php');
            break;
        case 'rien':
            break;
    default :
    include('view/Error404.php');
    
    
}

?>