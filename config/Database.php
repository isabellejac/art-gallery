<!--CONNECTION WITH THE PHPMYADMIN DATABASE-->
<?php

class Database{
    
    private $bdd;
    
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost:3306;dbname=projet_art_gallery;charset=utf8',"root","root");
}
        
    public function getBDD()
    {
        return $this->bdd;
    }
    
}
   