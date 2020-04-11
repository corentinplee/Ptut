<?php
if (isset($_POST['key'])){
  // Connexion
	$dsn = 'mysql:host=mysql-corentin-plee.alwaysdata.net;dbname=corentin-plee_bd2';
	$pdo = new PDO($dsn, '202831', 'mabd2020' );

	$name = $_POST['name'];
	$translated_word = $_POST['translated_word'];
	$rowID = $_POST['rowID'];


	if ($_POST['key'] == 'addNew') {
		$sql = $pdo->query("SELECT id FROM Traduction WHERE french_word='$name'");
		$pdo->query("INSERT INTO Traduction (french_word, translated_word)VALUES ('$name','$translated_word')");
		exit('Le mot a été ajouté');
	}
}
?>