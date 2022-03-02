<!--ADMIN CONTROLLER ADMINSTRATION CONNECTION - DISCONNECTION AND ADMIB TABEL-->
<?php

require "models/Admin.php";

class AdminController
{
    
    private $admin;

    public function __construct()
    {
        $this->admin = new Admin();
    
}
//To create an administrator account
    // public function createAdmin()
    // {
    //     $pseudo= "isa";
    //     $password=password_hash("1234",PASSWORD_DEFAULT);
        
    //     $creaAdmin= $this->admin->insertAdmin($pseudo,$password);
    // }
    public function connectAdmin()
    {
            $articles= (new Article ())->getAllArticle();
			$template= "admin/homeAdmin";
			if(!empty($_POST))
			{
				$pseudo= htmlentities($_POST['pseudo']);
				$password= htmlentities($_POST['password']);
				$adminConnect= $this->admin ->getAdminByPseudo($pseudo);
				if(!$adminConnect){
					$error = "Merci de ressaisir vos identifiants";
				}
				else
				{
					if(password_verify($password, $adminConnect["password"])==true){
					
						$test= $_SESSION["admin"]=$adminConnect['pseudo'];
					}
					else
					{
						$error = "Merci de ressaisir vos identifiants";
					}
				}
			}
			require "www/layout.phtml";
    }
    
    public function isAdmin()
    {
    	if(isset($_SESSION["admin"]))
    	{
    		return true;
    	} else {
    		return false;
    	}
    }
    
    public function index()
    {
         require "www/admin/homeAdmin.phtml";
    }
    
    public function adminTabel()
    {
        
         $articles = (new Article ())->getAllArticle();
         $template = "admin/homeAdmin";
         require "www/layout.phtml";
    }
    
    public function deconnexion()
    {
    	$_SESSION = array();

        session_destroy();
        header("location:index.php"); 
    }
} 























