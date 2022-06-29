<?php
include_once "../includes/functions.inc.php";
require_once  (__DIR__.'../../model/historique.class.php');

class Historiquecontr extends Historique{
    
    private $date;
    private $action;
    private $nom;
    private $modif;
    private $auteur;

    public function __construct($date, $action, $nom, $modif, $auteur){
        $this->date = $date;
        $this->action = $action;
        $this->nom = $nom;
        $this->modif = $modif;
        $this->auteur = $auteur;
    }

    public function createHistorique(){
        $this->insertHistorique($this->date, $this->action, $this->nom, $this->modif, $this->auteur);
        
    }
}