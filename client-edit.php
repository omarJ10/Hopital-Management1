<?php include('dbcon.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>add</title>
</head>
<body>
  <div class="container">
      <div class="row">
        <div class="col-md-12 mt-4">
          <div class="card">
              <div class="card-header">
                <h3>
                  Edit Patient
                  <a href="dashboard.php" class="btn btn-danger float-end">Retour</a>
                </h3>
              </div>
              <div class="card-body">
                <?php 
                if(isset($_GET['id'])){
                    $patient_id = $_GET['id'];
                    $query = "SELECT * FROM patient WHERE id=$patient_id";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetch(PDO::FETCH_OBJ);

                }
                ?>
                <form action="code.php" method="post">
                    <input type="hidden" name="patient_id" value="<?=$result->id?>"/>
                    <div class="mb-3">
                        <label>Nom</label>
                        <input type="text" name="nom" class="form-control" value="<?= $result->nom ?>"/>
                    </div>
                    <div class="mb-3">
                        <label>Prenom</label>
                        <input type="text" name="prenom" class="form-control" value="<?= $result->prenom ?>"/>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"value="<?= $result->email ?>" /> 
                    </div>
                    <div class="mb-3">
                        <label>Tel</label>
                        <input type="text" name="tel" class="form-control" value="<?= $result->tel ?>"/>
                    </div>
                    <div class="mb-3">
                        <label>Etat</label>
                        <input type="text" name="etat" class="form-control" value="<?= $result->etat ?>"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="update_patient_btn" class="btn btn-success">Editer Patient</button>
                    </div>
                </form>
              </div>
          </div>
        </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>