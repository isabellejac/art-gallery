//Confirm remove Article Administration Tabel

const removeArticle = document.querySelectorAll('.remove-article');

if(removeArticle!=null){
    removeArticle.forEach(function(article){
        article.addEventListener("click", e=>{
            const isConfirm = window.confirm("Etes-vous sûr de vouloir supprimer cet article?");
            if(!isConfirm){
                e.preventDefault;
            }
        });
    });
}