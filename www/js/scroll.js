//Button scroll To Top

const button = document.getElementById('click');

document.addEventListener("scroll", function (e){
    if(window.scrollY >400) {
        button.classList.add("active");
    }else{
    button.classList.remove("active");
    }
});

button.addEventListener("click", function scroll () {
    window.scrollTo({
    top: 0,
    left: 0,
    behavior: 'smooth'

    });
})
