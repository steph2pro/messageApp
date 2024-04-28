<?php
require_once "Database.php";
class User {
    private $id;
  private $profil;
  private $username;
  private $email;
  private $enligne;
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }
  
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
      $this->id = $id;
  }
    
  public function getUsername() {
    return $this->username;
}
public function setusErname($username) {
    $this->username = $username;
}
public function getEmail() {
  return $this->email;
}
public function setEmail($email) {
    $this->email = $email;
}
public function getenligne() {
    return $this->enligne;
}
public function setenligne($enligne) {
    $this->enligne = $enligne;
}
public function getProfil() {
  return $this->profil;
}
public function setProfil($profil) {
    $this->profil = $profil;
}
  public function create($username, $email, $profil, $enligne) {
    $query = "INSERT INTO Users (username, email, profil, enligne) VALUES (:username, :email, :profil, :enligne)";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':profil', $profil);
    $stmt->bindValue(':enligne', $enligne);
    $stmt->execute();
    return $this->db->lastInsertId();
}

public function read($id) {
  $query = "SELECT * FROM Users WHERE id = :id";
  $stmt = $this->db->prepare($query);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update($username, $email, $profil, $enligne,$id) {
  $query = "UPDATE Users SET username = :username, email = :email, profil = :profil, enligne = :enligne WHERE id = :id";
  $stmt = $this->db->prepare($query);
  $stmt->bindValue(':username', $username);
  $stmt->bindValue(':email', $email);
  $stmt->bindValue(':profil', $profil);
  $stmt->bindValue(':enligne', $enligne);
  $stmt->bindValue(':id', $id);
  return $stmt->execute();
}

public function delete($id) {
  $query = "DELETE FROM Users WHERE id = :id";
  $stmt = $this->db->prepare($query);
  $stmt->bindValue(':id', $id);
  return $stmt->execute();
}
public function readAllUsers() {
  $sql = "SELECT * FROM Users";
  $stmt = $this->db->prepare($sql);
  $stmt->execute();
  $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $datas;
}
  public function sendMessage($message, $recipient) {
    // Code pour envoyer un message à un destinataire spécifié
  }

  public function joinGroup($group) {
    // Code pour rejoindre un groupe spécifié
  }

  public function leaveGroup($group) {
    // Code pour quitter un groupe spécifié
  }
}