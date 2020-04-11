<?php
if (isset($_POST['key'])){
  // Connexion
	$dsn = 'mysql:host=mysql-corentin-plee.alwaysdata.net;dbname=corentin-plee_bd2';
	$pdo = new PDO($dsn, '202831', 'mabd2020' );

	$name = $_POST['name'];
	$translated_word = $_POST['translated_word'];
	$rowID = $_POST['rowID'];


	if ($_POST['key'] == 'deleteRow') {
		$pdo->query("DELETE FROM Traduction WHERE id='$rowID'");
		exit('Le mot a été supprimé');
	}
}
?>