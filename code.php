<?php
session_start();
include('dbcon.php');
if (isset($_POST['update_patient_btn'])) {
    $patient_id = $_POST['patient_id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $etat = $_POST['etat'];
    try {
        $query ="UPDATE patient SET nom='$nom',prenom='$prenom',email='$email',tel='$tel',etat='$etat' WHERE id=$patient_id";
        $requete = $conn->prepare($query);
        $requete->execute();
        if($requete){
            $_SESSION['message'] = "Updated Successfully";
            header('Location:dashboard.php');
            exit(0);
        }else {
            $_SESSION['message'] = "Updated ERROR";
            header('Location:dashboard.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    echo"Error";
}
 
if (isset($_POST['save_patient_btn'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $etat = $_POST['etat'];
    include('dbcon.php');
    $query ="INSERT INTO patient(nom,prenom,email,tel,etat) VALUES('$nom','$prenom','$email','$tel','$etat')";
    $requete = $conn->prepare($query);
    $requete->execute();

    if($requete){
        $_SESSION['message'] = "Inserted Successfully";
        header('Location:dashboard.php');
        exit(0);
    }else {
        $_SESSION['message'] = "Inserted ERROR";
        header('Location:dashboard.php');
        exit(0);
    }
}

if(isset($_POST['delete_client'])){
    $patient_id = $_POST['delete_client'];
    try {
        $query = "DELETE FROM patient WHERE id=$patient_id";
        $requete = $conn->prepare($query);
        $requete->execute();

        if($requete)
        {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: dashboard.php');
            
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not";
            header('Location: dashboard.php');
            exit(0);
        }

    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>