<!--GALLERY CONTROLLER MANAGE ALL THE LINKS BETWEEN THE TABS-->
<?php

class GalleryController {
    
    private Article $article;
    
    public function __construct()
    {
      $this->article = new Article();
    }
    
    public function home()
    {
        $template="home";
        require "www/layout.phtml";
    }

    public function about()
    {
        $template ="about";
        require "www/layout.phtml";
    }
    public function pictures()
    {
        $articles= $this ->article ->getArticle("pictures");
        $template="pictures";
        require "www/layout.phtml";
    }
    public function videos()
    {
        $articles= $this->article ->getArticle("videos");
        $template="videos";
        require "www/layout.phtml";
    }
    public function drawing()
    {
        $articles= $this->article ->getArticle("drawing");
        $template="drawing";
        require "www/layout.phtml";
    }
    
    public function homeadmin()
    {
        $articles= $this->article ->getArt();  
        $template="admin/homeAdmin";
        require "www/layout.phtml";
    }
}