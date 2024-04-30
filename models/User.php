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
public function login($username, $email) {
  // Vérifier si l'utilisateur existe dans la base de données
  $query = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
  $result = $this->db->query($query);
  
  if ($result->rowCount() > 0) {
      // Utilisateur trouvé, récupérer les informations et les renvoyer sous forme de tableau associatif
      $data = $result->fetch(PDO::FETCH_ASSOC);
      
      return $data;
  } else {
      // Utilisateur non trouvé, retourner null
      return null;
  }
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
public function getUserGroups($userId) {
  $query = "SELECT * FROM groups g
            INNER JOIN user_group ug ON g.id = ug.group_id
            WHERE ug.user_id = :userId";
  $stmt = $this->db->prepare($query);
  $stmt->bindParam(':userId', $userId);
  $stmt->execute();

  $groups = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $groups;
}
}