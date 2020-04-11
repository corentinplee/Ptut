<?php
if (isset($_POST['key'])){
  // Connexion
  $dsn = 'mysql:host=mysql-corentin-plee.alwaysdata.net;dbname=corentin-plee_bd2';
  $pdo = new PDO($dsn, '202831', 'mabd2020' );

 //Récup des données
  if($_POST['key'] == 'getExistingData') {
   $begin = $_POST['begin'];
   $limit = $_POST['limit'];

   $sql = $pdo->query("SELECT id, french_word,translated_word FROM Traduction LIMIT $begin, $limit");
   if($sql->rowcount() > 0){

     $response="";
     while($data = $sql->fetch()) {
      $response .='
      <tr>
      <td id="french_'.$data["id"].'">'.$data["french_word"].'</td>
      <td id="translated_'.$data["id"].'">'.$data["translated_word"].'</td>
      <td>
      <input type ="button" onclick="deleteRow('.$data["id"].')" value="Supprimer" class="btn btn-danger" style>
      </td>      	       
      </tr>    
      ';

    }
    exit($response);
  }else 
  exit('reachedMax');
}
}
?>