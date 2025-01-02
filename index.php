<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Interactivity</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <p>
        <a href="http://localhost/php/DatabaseInteractivity/?id=<?php echo 2 ?>">Id is 2</a>
    </p>
    <p>
        <a href="http://localhost/php/DatabaseInteractivity/?id=<?php echo 3 ?>">Id is 3</a>
    </p>
    <p>
        <a href="http://localhost/php/DatabaseInteractivity/?id=<?php echo 4 ?>">Id is 4</a>
    </p>

    <?php
    $id=2;
    function e($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    }
    var_dump($_GET['id']);
    ?>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=note_app', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    // var_dump($pdo);
    // $title = addslashes("The Basics I've Learned");

    $query = "SELECT * FROM `notes` WHERE `id`=$id ";

    // create a statement to prepare a query

    $stmt = $pdo->prepare($query);
    //execute the statement
    $stmt->execute();
    // fetch all results
    // $note = $stmt->fetch(PDO::FETCH_ASSOC);
    $note = $stmt->fetch(PDO::FETCH_ASSOC);


    var_dump($note);
    ?>


</body>

</html>
<?php
/*
$zip = new ZipArchive();

 $zip->open(__DIR__ . '/Archive.zip');

 var_dump($zip->count());

 var_dump($zip);

 $numFiles = $zip->count();
 for ($x = 0; $x < $numFiles; $x++) {
    var_dump($zip->getNameIndex($x));
}

var_dump($zip->getFromName('message.txt'));
*/
?>