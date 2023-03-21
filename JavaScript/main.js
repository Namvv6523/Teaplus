const product = document.querySelectorAll(".product");


product.forEach((element,index)=>{
    element.addEventListener("mouseover",function(){
        const activeShow = document.querySelectorAll(".product-icon-cart-heart");
        activeShow[index].classList.add("active_show_cart_heart");
        const productCart = document.querySelectorAll(".product_cart");
        const productHeart = document.querySelectorAll(".product_heart");
        productCart[index].classList.add('active_rotate');
        productHeart[index].classList.add('active_rotate');
    })
    element.addEventListener("mouseout",function(){
        const activeShow = document.querySelectorAll(".product-icon-cart-heart");
        activeShow[index].classList.remove("active_show_cart_heart");
        const productCart = document.querySelectorAll(".product_cart");
        const productHeart = document.querySelectorAll(".product_heart");
        productCart[index].classList.remove('active_rotate');
        productHeart[index].classList.remove('active_rotate');
    })
})