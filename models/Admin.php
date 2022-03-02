<!--QUERIES FOR THE MANAGEMENT OF ADMINISTRATION -->

<?php

class Admin {
    
    protected $database;
    protected $bdd;
    
    public function __construct()
    {
        $this->database = new Database();
        $this->bdd= $this->database ->getBDD();
    }
 
    public function getAdminByPseudo($pseudoAdmin)
    {
        $queryAdmin= $this->bdd->prepare("SELECT idAdmin,pseudo,password
                                    FROM admin 
                                    WHERE pseudo=?");

        $queryAdmin->execute([$pseudoAdmin]);
        
        $admin= $queryAdmin->fetch(); 
        return $admin;
    }
    public function insertAdmin($pseudo,$password)
    {
        $queryAdmin= $this->bdd->prepare("INSERT INTO admin (pseudo,password) VALUES (?,?)");

        $creaAdmin= $queryAdmin->execute([$pseudo,$password]);

        return $creaAdmin;
    }
}    