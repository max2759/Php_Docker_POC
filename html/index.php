<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>

<div class="container">

<?php include 'header.php'?>

    <?php
    $host = "mysql-server";
    $user = "root";
    $pass = "secret";
    $db = "app1";
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo '<div class="alert alert-success" role="alert">';
        echo "Bien connecté à la DB";
        echo '</div>';
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">';
        echo "Erreur de connexion " . $e->getMessage();
        echo '</div>';
    }

    $sql = "SELECT `Lastname`, `Firstname` FROM users";

    $stmt = $conn->prepare($sql);

    $stmt->execute();
    ?>

    <table class="table table-hover">
        <tr>
            <th>Lastname</th>
            <th>Prénom</th>
        </tr>

        <?php foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
            <tr>
                <td> <?php echo $row['Lastname']; ?></td>
                <td> <?php echo $row['Firstname']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</html>