<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>    

<!-- Navbar-->
<header class="header">
    <nav class="navbar bg-dark navbar-expand-lg py-3">
        <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold">El Cinema</a>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="ConnexionDB2.php" class="nav-link text-uppercase font-weight-bold">Connexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

</body>
</html>

<?php
$conn = new mysqli("pj1468350-001.eu.clouddb.ovh.net", "Utilisateur", "Azer456123789", "sakila", 35207);

if ($conn->connect_errno) 
{
    echo "Error: ". $conn->connect_error;
}

$sql = "SELECT title, description, length, rental_rate, rating FROM film";
$result = $conn->query($sql);
$arr_users = [];
if ($result->num_rows > 0) {
    $arr_users = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<br>
    <table id="userTable">
        <thead>
            <th>Title</th>
            <th>Description</th>
            <th>Length</th>
            <th>Rental Rate</th>
            <th>Rating</th>
        </thead>
        <tbody>
            <?php if(!empty($arr_users)) { ?>
                <?php foreach($arr_users as $user) { ?>
                    <tr>
                        <td><?php echo $user['title']; ?></td>
                        <td><?php echo $user['description']; ?></td>
                        <td><?php echo $user['length']; ?></td>
                        <td><?php echo $user['rental_rate']; ?></td>
                        <td><?php echo $user['rating']; ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
</script>

<link rel="stylesheet" href="public/css/bootstrap.css"/>

