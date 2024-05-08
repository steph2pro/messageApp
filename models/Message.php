<?php 
class Message {
  private $conn; // Objet de connexion à la base de données

  // Constructeur prenant en paramètre l'objet de connexion à la base de données
  public function __construct($conn) {
    $this->conn = $conn;
  }
   // Méthode pour créer un nouveau message
  public function createMessage($content, $sender_id, $group_id) {
    $sql = "INSERT INTO messages (content, sender_id, group_id) VALUES (?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$content, $sender_id, $group_id]);
  }

  // Méthode pour récupérer un message par son ID
  public function getMessageById($id) {
    $sql = "SELECT * FROM messages WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // Méthode pour mettre à jour le contenu d'un message
  public function updateMessage($id, $content) {
    $sql = "UPDATE messages SET content = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$content, $id]);
  }

  // Méthode pour supprimer un message par son ID
  public function deleteMessage($id) {
    $sql = "DELETE FROM messages WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$id]);
  return $stmt->execute();
  }
  // Méthode pour afficher les messages d'un groupe par son ID
  public function MessagesofGroup($group_id) {
    $sql = "SELECT * FROM messages WHERE group_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$group_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }



  }