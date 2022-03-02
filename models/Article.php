<!--QUERIES FOR THE MANAGEMENT OF WEBSITE ARTICLES -->

<?php

class Article{
    
    protected $bdd;
    protected $dataBase;
	

	public function __construct(){
		
		$this->dataBase = new Database();
		$this->bdd = $this->dataBase->getBDD();
	}
//Queries to select the category to insert in the right tabel : pictures-videos-drawing    
        public function getArticle($categorie) {
		$query= $this->bdd->prepare("SELECT idArticle,categories.idCategorie,titre,description,date,media
                                        FROM articles 
                                      INNER JOIN categories
                                      ON articles.idCategorie = categories.idCategorie
                                      WHERE categories.nomCategorie=?");
		$query->execute([$categorie]);
		$categories=  $query->fetchAll();
		return $categories;
	}
	
	    public function getAllCategory(){
        $query= $this->bdd->prepare("SELECT idCategorie, nomCategorie
                            FROM categories");
        $query->execute();
        $categories= $query->fetchAll();
        return $categories;
	    }
	    
//Queries to select articles	    
        public function getAllArticle() {
		$query= $this->bdd->prepare("SELECT idArticle, idCategorie, titre, description, date, media  
                                        FROM articles 
                                        ");
		$query->execute();
		$articles=  $query->fetchAll();
		return $articles;
	}
	
    public function getArt($articles){
        $query= $this->bdd->prepare("SELECT idArticle,idCategorie,titre,description,date,media
                                        FROM articles");
        $query->execute($articles);
        $articles =  $query->fetchAll();
        return $articles;
    }
    
    public function getArticleById(string $idArticle):array  
    {
        $query= $this->bdd->prepare("SELECT idArticle,categories.idCategorie, categories.nomCategorie, titre,description,date,media    
											FROM articles
											INNER JOIN categories
											ON articles.idCategorie = categories.idCategorie
											WHERE `idArticle`=?");
        
        $query->execute([$idArticle]);
        $articles= $query->fetch();
        
        return $articles;
    } 

//Queries to add an article  
    public function addArticle($idCategorie, $titre, $description, $media){
    	
		$query=  $this->bdd->prepare("INSERT INTO `articles`(`idCategorie`, `titre`, `description`, `date`, `media`)
								            VALUES(?,?,?,NOW(),?)");
             
        
        $addArticle= $query->execute([$idCategorie, $titre, $description, $media]);    	
    	
    	return $addArticle;
    }
//Queries to remove an article          
        public function deleteArticle($idArticle){
    	
		$query =  $this -> bdd ->prepare("DELETE FROM `articles` WHERE `idArticle`=?");
             
        $deleteArticle = $query -> execute([$idArticle]);    	
    	return $deleteArticle;
    }

//Queries to modify an article   
    public function modifyArticle($idArticle,$idCategorie, $titre,$description, $media){
    	
    	$query= $this->bdd->prepare("UPDATE `articles` 
   	                                  SET `idCategorie`= ?,`titre`= ?,`description`= ?,`media`= ?
  	                                  WHERE idArticle = ?");
		
		$modifyArticle= $query-> execute([$idCategorie, $titre,$description,$media,$idArticle]);
		
    	return $modifyArticle;
		
   }
}