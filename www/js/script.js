//Slider 

let slider;

let i = 0

let images =[];

let time = 1000;

//list images

images[0] = "img/drawing-skin-1.jpg";
images[1] = "img/drawing-skin-2.jpg";
images[2] = "img/drawing-flowers-violet.jpg";
images[3] = "img/drawing-skin-2.jpg";

function slideImage(){
    slider.src = images[i];
    console.log(i);
    if(i < images.length - 1){
        i++;
    }else{
        i=0
    }
}
document.addEventListener('DOMContentLoaded', function(){
    slider= document.getElementById('slider');
        if(slider!=null){
            slideImage();
            setInterval(slideImage, time);
        }
})








