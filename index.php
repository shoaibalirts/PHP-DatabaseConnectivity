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
    $id="";
    function e($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
    if (!empty($_GET['id'])) {
        $id = (int) $_GET['id'];
    } else {
        $id=1;
    }
    // var_dump($_GET['id']);
    ?>

    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=note_app', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
   

    // $query = "SELECT * FROM `notes` WHERE `id`={$id} ";

    // create a statement to prepare a query

    $stmt = $pdo->prepare('SELECT * FROM `notes` WHERE `id`=:id ');// placed a placeholder as id
    // INSERT ROW
    /*
    $title='A title (from PHP)';
    $content = 'The content (from PHP)';
    $stmt = $pdo->prepare("INSERT INTO `notes` (`title`,`content`) VALUES (:title, :content)");
    $stmt->bindValue('title',$title);
    $stmt->bindValue('content',$content);
    */
    
    /* UPDATE ROW
    $stmt=$pdo->prepare("UPDATE `notes` SET `title` = :title, `content` = :content WHERE `id` = :id");
    $stmt->bindValue('id', 14);
    $stmt->bindValue('title', 'TITLE (from Php)');
    $stmt->bindValue('content','CONTENT (from Php)');
    //execute the statement
    $stmt->execute();
    */

    // DELETE ROW
    $stmt2 = $pdo->prepare("DELETE FROM notes WHERE `notes`.`id` = :id"); // placeholder for protecting sql injection because data can come form url or from variable
    $stmt2->bindValue('id',11);
    $stmt2->execute();
    
    /* FETCH A SINGLE ROWS 
    // $note = $stmt->fetch(PDO::FETCH_ASSOC);

    // $note = $stmt->fetch(PDO::FETCH_ASSOC);

    // var_dump($note);
    */
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