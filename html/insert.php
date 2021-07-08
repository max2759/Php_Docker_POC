<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">

        <?php
        $host = "mysql-server";
        $user = "root";
        $pass = "secret";
        $db = "app1";
        try {
            $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // preparation requete sql and lier paramètres
            $stmt = $conn->prepare("INSERT INTO users(Lastname, Firstname) VALUES (:Lastname, :Firstname)");
            $stmt->bindParam(':Lastname', $lastname);
            $stmt->bindParam(':Firstname', $firstname);

            //Inserer une ligne

            $lastname = $_POST["lastname"];
            $firstname = $_POST["firstname"];
            $stmt->execute();

            echo '<div class="alert alert-success" role="alert">';
            echo 'Bien ajouté à la DB :)';
            echo '</div>';
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Erreur :(';
            echo '</div>';
        }
        ?>

        <a href="index.php" class="badge-primary">Retour à la page d'accueil</a>
    </div>
</body>       
</html>