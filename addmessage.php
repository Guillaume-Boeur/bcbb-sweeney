<?php 
try
{
// On se connecte à MySQL
$bdd = new PDO('mysql:host=g4yltwdo6z0izlm6.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=qzd0dusw8ob73fdo;charset=utf8','hpya3i8f0c3nymfm','xvxw1nfar44r7iin');

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
die('Erreur : '.$e->getMessage());
}
if (isset($_POST["message_content"],$_POST["date"],$_POST["topic_id"],$_POST["user_id"])) {
$create_message = $bdd->prepare('INSERT INTO messages(content, creation_date, topics_id, users_id)
VALUES(:content, :creation_date, :topics_id, :users_id)');
$create_message->execute(array(
'content' => $_POST["message_content"],
'creation_date' => $_POST["date"],
'topics_id' => $_POST["topic_id"],
'users_id' => $_POST["user_id"]
));
} 

header("location:messages.php?topic_id=".$_POST['topic_id']."&topic_title=".$_POST['topic_title']);
?>