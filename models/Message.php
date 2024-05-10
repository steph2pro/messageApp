<?php
require_once 'C:\xampp\htdocs\messageApp\controllers\services.php';
class Message
{
  protected $id;
  protected $sender;
  protected $recipient;
  protected $content;
  protected $time;

  private $db; // Objet de connexion à la base de données

  public function __construct($db)
  {
    $this->db = $db;
  }

  // public function __construct($sender, $recipient, $content, $time) {
  //   $this->sender = $sender;
  //   $this->recipient = $recipient;
  //   $this->content = $content;
  //   $this->time = $time;
  // }

  public function sendMessage($content, $sender, $recipient, $time)
  {
    // Préparer la requete SQL
    $query = "INSERT INTO messages (sender, recipient, content, time) VALUES (:sender, :recipient, :content, :time)";

    // Préparer et exécuter la requête
    $stmt = $this->db->prepare($query);

    $stmt->bindParam(':sender', $sender);
    $stmt->bindParam(':recipient', $recipient);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':time', $time);



    try {
      $stmt->execute();
      $message_id = $this->db->lastInsertId();
      $_SESSION["user"]["message_id"] = $message_id;
      return true; // Succès de l'envoi du message
    } catch (PDOException $e) {
      // En cas d'erreur, afficher un message d'erreur
      echo "Erreur lors de l'envoi du message : " . $e->getMessage();
      return false; // Échec de l'envoi du message
    }
  }


  // Méthode pour lire un message depuis la base de données
  public function readMessage($id)
  {
    // Préparer la requête SQL
    $query = "SELECT * FROM messages WHERE id = :id";

    // Préparer et exécuter la requête
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Récupérer le message depuis la base de données
    $message = $stmt->fetch(PDO::FETCH_ASSOC);

    return $message;
  }

  // Méthode pour lire tous les messages depuis la base de données
  public function readAllMessage()
  {
    // Préparer la requête SQL
    $query = "SELECT * FROM messages";

    // Préparer et exécuter la requête
    $stmt = $this->db->prepare($query);
    // $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Récupérer le message depuis la base de données
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $messages;
  }

  public function readGroupMessages($group_id) {
    $sql = "SELECT * FROM messages WHERE recipient = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$group_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function compareDates($date1, $date2) {
    $timestamp1 = strtotime($date1);
    $timestamp2 = strtotime($date2);
  
    if ($timestamp1 < $timestamp2) {
      return -1; // La première date est antérieure à la deuxième date
    } elseif ($timestamp1 > $timestamp2) {
      return 1; // La première date est postérieure à la deuxième date
    } else {
      return 0; // Les deux dates sont identiques
    }
  }
}
