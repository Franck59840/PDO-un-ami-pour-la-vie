<?php
require_once '_connect.php';

$pdo = new \PDO(DSN, USER, PASS);

if ($_POST) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
// Insertion dans la table friend dans les colones lastname et firstname avec les valeurs nom et prenom
    $query = 'INSERT INTO friend(lastname, firstname) VALUES (:nom, :prenom)';
    $statement = $pdo->prepare($query);


    $statement->bindValue(':prenom', $firstname, PDO::PARAM_STR);
    $statement->bindValue(':nom', $lastname, PDO::PARAM_STR);

    $statement->execute();
}
    $query = "SELECT * FROM friend";
    $statement = $pdo->query($query);
    $friends = $statement->fetchAll();
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Friends</title>
 </head>
 <body>
 <h1>Friends</h1>
    <ul>
    <?php
        foreach($friends as $friend)
        {
            echo '<li>' . $friend['firstname'] . " " . $friend['lastname'] . '</li>';

        }

   ?>
    </ul>
    <form  action=" "  method="POST">
        <div>
            <label  for="nom">Nom :</label>
            <input  type="text"  id="nom"  name="firstname" required >
        </div>
        <div>
            <label  for="prenom">Prénom :</label>
            <input  type="text"  id="nom"  name="lastname" required>
        </div>
        <button>ok</button>
    </form>
 </body>
 </html>