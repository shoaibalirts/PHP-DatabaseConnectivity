<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Interactivity</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=note_app', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    // var_dump($pdo);

    // create a statement to prepare a query
    $stmt = $pdo->prepare('SELECT * FROM `notes` ');
    //execute the statement
    $stmt->execute();
    // fetch all results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($results);
    ?>

    <ul>

        <?php foreach ($results as $result): ?>
            <div class="container">
                <li><?php echo "Title: ".$result['title'] ?></li>
                <li><?php echo "Content: ".$result['content'] ?></li>
            </div>
        <?php endforeach; ?>
    </ul>
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