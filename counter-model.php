<?php 
function counterConnect() {
  $server = 'localhost';
    $dbname= 'counter';
    $username = 'iClient';
    $password = ''; 
    $dsn = "mysql:host=$server;dbname=$dbname";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    // Create the actual connection object and assign it to a variable
    try {
      $link = new PDO($dsn, $username, $password, $options);
      return $link;
    } catch(PDOException $e) {
      // header('Location: /counter/view/500.php');
      echo 'failed connection.';
      exit;
    }
  }

function getCount() {
  $db = counterConnect();
  $sql = 'SELECT counterNum FROM counter';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $classifications = $stmt->fetch();
  $stmt->closeCursor();
  return $classifications['counterNum'];
}
?>