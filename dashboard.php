<?php 
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>AFFICHER</title>
</head>
<body>
  <?php

  if(!isset($_SESSION['test'])){
    header('location:log.php');
  }
  ?>
  <div class="container">
      <div class="row">
        <div class="col-md-12 mt-4">
          <div class="container-fluid sticky-top bg-white shadow-sm">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Medinova</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="index.html" class="nav-item nav-link active l">Home</a>
                            <a href="about.html" class="nav-item nav-link l">About</a>
                            <a href="service.html" class="nav-item nav-link l">Service</a>
                            <a href="contact.html" class="nav-item nav-link l">Contact</a>
                            <a href="log.php" class="nav-item nav-link l">LogOut</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <?php

         if((isset($_SESSION['message']))): ?>
          <h5 style="margin-top: 16px;" class="alert alert-success"><?= $_SESSION['message'];?></h5>
        <?php
         unset($_SESSION['message']);
         endif;
       ?>
       
         
      
          <div class="card" style="margin-top: 15px;">
              <div class="card-header" >
                <h3>
                  Liste des Patients
                  <a href="client-add.php" class="btn btn-primary float-end">Ajouter Patient</a>
                </h3>
              </div>
              <div class="card-body">
             
              
                <table class="table table-bordered table-striped">
                  <thead>
                    <td>Nom</td>
                    <td>Prenom</td>
                    <td>Email</td>
                    <td>Tel</td>
                    <td>Etat</td>
                    <td>Editer</td>
                    <td>Supprimer</td>
                  </thead>
                  <tbody>
                    <?php 
                    
                    $query="SELECT * FROM patient"; 
                    $statement = $conn->prepare($query);
                    $statement->execute();

                    $result = $statement->fetchAll();
                    if($result){
                      foreach($result as $row){
                        ?>
                        <tr>
                          <td><?= $row['nom'];?></td>
                          <td><?= $row['prenom'];?></td>
                          <td><?= $row['email'];?></td>
                          <td><?= $row['tel'];?></td>
                          <td><?= $row['etat'];?></td>
                          <td>
                            <a href="client-edit.php?id=<?= $row['id']; ?>" class="btn btn-primary">Editer</a>
                          </td>
                          <td>
                            <form action="code.php" method="post">
                              <button class="btn btn-danger" name="delete_client" value='<?= $row['id']; ?>'>Supprimer</button>
                            </form>
                          </td>
                
                        </tr>
                        <?php
                      }  
                      }
                    
                    else{
                      ?>
                      <tr><td colspan="6">No Record Found</td></tr>
                      <?php
                    }

                    ?>
                    <tr>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>