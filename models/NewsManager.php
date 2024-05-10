<?php
require_once "News.php";
require_once "Database.php";
class NewsManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create(News $news) {
        $query = "INSERT INTO news (auteur, titre, contenu, dateAjout, dateModif) VALUES (:auteur, :titre, :contenu, :dateAjout, :dateModif)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':auteur', $news->getAuteur());
        $stmt->bindValue(':titre', $news->getTitre());
        $stmt->bindValue(':contenu', $news->getContenu());
        $stmt->bindValue(':dateAjout', $news->getDateAjout());
        $stmt->bindValue(':dateModif', $news->getDateModif());
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function read($id) {
        $query = "SELECT * FROM news WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(News $news) {
        $query = "UPDATE news SET auteur = :auteur, titre = :titre, contenu = :contenu, dateModif = :dateModif WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':auteur', $news->getAuteur());
        $stmt->bindValue(':titre', $news->getTitre());
        $stmt->bindValue(':contenu', $news->getContenu());
        $stmt->bindValue(':dateModif', $news->getDateModif());
        $stmt->bindValue(':id', $news->getId());
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM news WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    

    public function readAllNews() {
        $sql = "SELECT * FROM news ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datas;
    }
    public function readLimitedNews() {
        $sql = "SELECT * FROM news LIMIT 5";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datas;
    }

    
}
function afficherContenuNews($contenu,$tail) {
        $trimmedContenu = substr($contenu, 0, $tail);
        if (strlen($contenu) > $tail) {
            $trimmedContenu .= '...';
        }
        return $trimmedContenu;
    }