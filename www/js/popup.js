//Popup : Instagram subscribe

window.addEventListener("load", function(){

  function open(){
		    document.querySelector(".js-popup").classList.add('active');
		    window.localStorage.setItem('popup_instagram', "true");
	}
	     if(!window.localStorage.getItem('popup_instagram')) {
		    setTimeout(open, 5000);
	 }

});

document.querySelector("#close-popup").addEventListener("click", function(){
      document.querySelector(".js-popup").classList.remove('active');
});

