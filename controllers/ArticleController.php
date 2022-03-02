<!--ARTICLE CONTROLLER MANAGE THE CONTENT ALL ARTICLES-->
<?php

require 'models/Article.php';

class ArticleController
{
    
    private Article $article;
    private Admin $admin;

    
    public function __construct()
    {
      $this->article = new Article();
      $this->adminController = new AdminController();
      
    }
    

    public function addArticle()
    {
            $template = "articles/addArticle";
  
        if($this->adminController->isAdmin() == true){
            
            $categories = $this->article->getAllCategory();
            
            if(!empty($_POST)){
                $idCategorie= htmlentities($_POST['idCategorie']);
                $titre= htmlentities($_POST['titleArticle']);
                $description= htmlentities($_POST['contenu']);
                $media= $_FILES['media']['name'];
                $uploads_dir= 'img';
           
            // Upload articles for tabs pictures/videos/drawing
            
            if (!empty($_FILES['media']['name'])){
                
                $tmp_name= $_FILES["media"]["tmp_name"];
                $media= $_FILES["media"]["name"];
                
                move_uploaded_file($tmp_name, "$uploads_dir/$media");
                }
                
                $addArticle= $this->article->addArticle($idCategorie, $titre, $description, $media);
                if($addArticle){
                    $error= "L'article a bien été enregistré dans la base de données";
                }
                else{
                    $error= "Une erreur est survenue lors de l'insertion de l'article";
                }
            }
            require "www/layout.phtml";
            
            }
            else {
            header('Location:index.php');
            exit();
            }   
        }

    public function modifyArticle(){
            
        $template= "articles/modifyArticle";
            if($this->adminController->isAdmin() == true){
                
                if(isset($_GET['idArticle'])){
                    $modifyArticle = $this->article->getArticleById($_GET['idArticle']);
                    $categories = $this->article->getAllCategory();
                }
                    if(!empty($_POST)){
                        $titre= htmlentities($_POST['titleArticle']);
                        $description= htmlentities($_POST['contenu']);
                        $idCategorie= htmlentities($_POST['idCategorie']);
                        $idArticle= htmlentities($_POST['idArticle']);
                        $media= $_FILES['media']['name'];
                        $uploads_dir= 'img';
               
                        // Upload articles for tabs pictures/videos/drawing
                        
                            if(!empty($_FILES['media']['name'])) {
                            
                            $tmp_name= $_FILES["media"]["tmp_name"];
                            $media= $_FILES["media"]["name"];
                            
                            move_uploaded_file($tmp_name, "$uploads_dir/$media");
                            
                            $modifyArticle= $this->article->modifyArticle($idArticle,$idCategorie, $titre,$description, $media);
                            }                                                              
    
                        
                    if($modifyArticle){
                        $error= "L'article a bien été modifié";
                            
                    }else{
                        $error= "Une erreur est survenue lors de modification de l'article";
                        }
                        header('Location:index.php?action=admin&error='.$error);
                    }
                require "www/layout.phtml";
            }
            else{
                header('Location:index.php');
                exit();
            }
        }

    public function deleteArticle(){
            
            $template= "admin/homeAdmin";
            
            if($this->adminController->isAdmin() == true){
            
            $deleteArticle= $this->article->deleteArticle($_GET['idArticle']);
            
            $error= "Une erreur est survenue lors de la suppression du produit";  
            
                if($deleteArticle){
                    $error= "Votre article a bien été supprimé";
                                 }
                else{
                    $error= "Une erreur est survenue lors de la suppression du produit";
                    }
                    header('Location:index.php?action=admin&error='.$error);
                  
            require "www/layout.phtml";
       
            header('Location:index.php');
            exit();
            }
    }
}
    
    
    
    