<?php
class Group {
    private $id;
    private $name;
    private $members;
  
    private $db; // Objet de connexion à la base de données
  
    public function __construct($db) {
      $this->db = $db;
    }
    
    // Méthode pour créer un groupe
public function createGroup($nomGroupe,$profil, $utilisateurs) {
  // Insérer le groupe dans la base de données
  $query = "INSERT INTO groups (name,profil) VALUES (:nomGroupe,:profil)";
  $stmt = $this->db->prepare($query);
  $stmt->bindValue(':nomGroupe', $nomGroupe);
  $stmt->bindValue(':profil', $profil);
  $stmt->execute();
  $groupId = $this->db->lastInsertId();
  
  // Ajouter les utilisateurs au groupe
  foreach ($utilisateurs as $utilisateur) {
    $query = "INSERT INTO user_group (user_id, group_id) VALUES (:utilisateur, :groupId)";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':utilisateur', $utilisateur);
    $stmt->bindValue(':groupId', $groupId);
    $stmt->execute();
  }
  
  return $groupId;
}
public function addUserToGroup($groupId, $utilisateurs) {
  foreach ($utilisateurs as $utilisateur) {
    $query = "INSERT INTO user_group (user_id, group_id) VALUES (:utilisateur, :groupId)";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':utilisateur', $utilisateur);
    $stmt->bindValue(':groupId', $groupId);
    $stmt->execute();
  }
}
    
    // Méthode pour lire les informations d'un groupe
    public function readGroup($id) {
      $query = "SELECT * FROM groups WHERE id = :id";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Méthode pour mettre à jour les informations d'un groupe
    public function updateGroup($groupId, $nouveauNom) {
      $query = "UPDATE groups SET name = ? WHERE id = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("si", $nouveauNom, $groupId);
      $stmt->execute();
      
      return $stmt->affected_rows;
    }
    
    // Méthode pour supprimer un groupe
    public function deleteGroup($groupId) {
      // Supprimer les enregistrements liés dans la table de liaison user_group
      $query = "DELETE FROM user_group WHERE group_id = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("i", $groupId);
      $stmt->execute();
      
      // Supprimer le groupe lui-même
      $query = "DELETE FROM groups WHERE id = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param("i", $groupId);
      $stmt->execute();
      
      return $stmt->affected_rows;
    }
  
public function readAllGroups() {
  $sql = "SELECT * FROM groups";
  $stmt = $this->db->prepare($sql);
  $stmt->execute();
  $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $datas;
}
public function readAllUsersByGroup($groupId) {
  $query = "SELECT u.* FROM user_group ug 
            INNER JOIN users u ON ug.user_id = u.id
            WHERE ug.group_id = :groupId";
  $stmt = $this->db->prepare($query);
  $stmt->bindValue(':groupId', $groupId);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function addMember($user) {
      // Code pour ajouter un utilisateur en tant que membre du groupe
    }
  
    public function removeMember($user) {
      // Code pour supprimer un utilisateur du groupe
    }
  
    public function sendMessage($message) {
      // Code pour envoyer un message à tous les membres du groupe
    }
  }