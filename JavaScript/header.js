const header = document.querySelector(".header-main");
const headerLink = document.querySelectorAll(".header-main-link");
console.log(headerLink);
window.addEventListener("scroll",()=>{
    const scrollY = window.scrollY;
    if(scrollY > 200){
        header.classList.add("active-header");
        header.style.color="black"
        headerLink.forEach((element,index)=>{
            element.style.color="black";
        })
    }
    else{
        header.classList.remove("active-header");
        
    }
})