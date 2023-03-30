const header = document.querySelector(".header-main");
const headerLink = document.querySelectorAll(".header-main-link");
const like = document.querySelector(".like i")
const cart = document.querySelector(".cart i")
if(header){
window.addEventListener("scroll",()=>{
    const scrollY = window.scrollY;
    if(scrollY > 200){
        header.classList.add("active-header");
        header.style.color="black"
        headerLink.forEach((element,index)=>{
            element.style.color="black";
        })
        like.style.color="black";
        cart.style.color="black";
    }
    else{
        header.classList.remove("active-header");
        headerLink.forEach((element,index)=>{
            element.style.color="white";
        })
        like.style.color="white";
        cart.style.color="white";
        
    }
})

}
