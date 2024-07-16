<?php
class Personnage{

    public $vie = 100;
    public $atk = 20;
    public $nom;

    public __construct($nom){
        $this->nom = $nom;
    }

    public function regenerer($vie = null){
        if(is_null($vie)){
            $this->vie = 100;
        } else {
            $this->vie += $vie;
        }
    }

    public function mort(){
        return $this->vie<=0;
    }

    public function attaque($cible){
        $cible->vie -=$this->atk;
    }

?>
