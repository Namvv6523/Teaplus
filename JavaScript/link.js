// Tạo loader chuột hamster 

const container = document.querySelector(".container");
const loading = document.querySelector(".container1");

function redirect (link,time){
    console.log(time);
    container.style.display="none";
    loading.style.display="flex";
    setTimeout(()=>{
        window.location.href=link

    },time)

}