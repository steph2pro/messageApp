<?php

class News {
    private $id;
    private $auteur;
    private $titre;
    private $contenu;
    private $dateAjout;
    private $dateModif;

    public function __construct($auteur, $titre, $contenu, $dateAjout, $dateModif) {
        $this->auteur = $auteur;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->dateAjout = $dateAjout;
        $this->dateModif = $dateModif;
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    public function getAuteur() {
        return $this->auteur;
    }

    public function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function getDateAjout() {
        return $this->dateAjout;
    }

    public function setDateAjout($dateAjout) {
        $this->dateAjout = $dateAjout;
    }

    public function getDateModif() {
        return $this->dateModif;
    }

    public function setDateModif($dateModif) {
        $this->dateModif = $dateModif;
    }

    

    
}