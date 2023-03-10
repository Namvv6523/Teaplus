// js thuộc phần main <main>

const product = document.querySelectorAll(".product");

product.forEach((element, index) => {
  element.addEventListener("mouseover", function () {
    const activeShow = document.querySelectorAll(".product-icon-cart-heart");
    activeShow[index].classList.add("active_show_cart_heart");
    const productCart = document.querySelectorAll(".product_cart");
    const productHeart = document.querySelectorAll(".product_heart");
    productCart[index].classList.add("active_rotate");
    productHeart[index].classList.add("active_rotate");
  });
  element.addEventListener("mouseout", function () {
    const activeShow = document.querySelectorAll(".product-icon-cart-heart");
    activeShow[index].classList.remove("active_show_cart_heart");
    const productCart = document.querySelectorAll(".product_cart");
    const productHeart = document.querySelectorAll(".product_heart");
    productCart[index].classList.remove("active_rotate");
    productHeart[index].classList.remove("active_rotate");
  });
});

// ---------------show menu choice---------------
// ----------- close and open menu ----------------
const containOverlayProductDetail = document.querySelector(
  ".contain-overlay-product-detail"
);
const productCart = document.querySelectorAll(".product_cart");
const closeShow = document.querySelector(".close_show");
const closeText = document.querySelector(".close-text");

let isClose = false;
productCart.forEach((element, index) => {
  element.addEventListener("click", () => {
    isClose = true;
    if (isClose) {
      containOverlayProductDetail.style.display = "flex";
    }
    console.log(isClose);
  });
});

closeShow.addEventListener("click", () => {
  isClose = false;
  console.log(isClose);

  if (!isClose) {
    containOverlayProductDetail.style.display = "none";
  }
});
closeText.addEventListener("click", () => {
  isClose = false;
  console.log(isClose);

  if (!isClose) {
    containOverlayProductDetail.style.display = "none";
  }
});
// ---------------------- logic tính toán tiền-------------------------

const subtract = document.querySelector(".subtract");
const add = document.querySelector(".add");
const productQuantity = document.querySelector(".product_quantity");
const result = document.querySelector(".result");

const input = document.querySelectorAll(".input");

var quantity = 1;
const handleAdd = () => {
  quantity++;
  return handleQuantity();
};

const handleSubtract = () => {
  quantity--;
  if (quantity <= 0) {
    quantity = 0;
  }
  return handleQuantity();
};

const handleQuantity = () => {
  productQuantity.innerHTML = quantity;
  return quantity;
};
const handleResult = (sugarValue = 0,  sizeValue = 0, iceValue = 0,  toppingValue = 0) => {
  const blockUpPrice = document.querySelector(".block_up-price").value;
  const quantity = handleQuantity();
  const total =
    parseInt(sugarValue, 10) +
    parseInt(sizeValue, 10) +
    parseInt(iceValue, 10) +
    parseInt(toppingValue, 10);

  result.innerHTML = (parseInt(blockUpPrice, 10) + total) * quantity + "đ";
};

input.forEach((element) => {
  element.addEventListener("change", function (e) {
    const sugar = document.querySelectorAll("input[name='sugar']");
    const size = document.querySelectorAll("input[name='size']");
    const iceRock = document.querySelectorAll("input[name='ice-rock']");
    const topping = document.querySelectorAll("input[name='topping']");

    let sugarValue;
    let sizeValue;
    let iceRockValue;
    let toppingValue = 0;
    const arrTopping = [];

    for (var i = 0; i < sugar.length; i++) {
      if (sugar[i].checked) {
        sugarValue = sugar[i].value;
      }
    }
    for (var i = 0; i < size.length; i++) {
      if (size[i].checked) {
        sizeValue = size[i].value;
      }
    }
    for (var i = 0; i < iceRock.length; i++) {
      if (iceRock[i].checked) {
        iceRockValue = iceRock[i].value;
      }
    }
    for (var i = 0; i < topping.length; i++) {
      if (topping[i].checked) {
        toppingValue += parseInt(topping[i].value, 10);
      }
    }

    return getValue(sugarValue, sizeValue, iceRockValue, toppingValue);
  });
});

var getSugarValue = 0;
var getSizeValue = 0;
var getIceRockValue = 0;
var getToppingValue = 0;
function getValue(sugarValue, sizeValue, iceRockValue, toppingValue) {
  handleResult(sugarValue, sizeValue, iceRockValue, toppingValue);
  getSugarValue = sugarValue;
  getSizeValue = sizeValue;
  getIceRockValue = iceRockValue;
  getToppingValue = toppingValue;
}
add.addEventListener("click", () => {
  handleAdd();
  handleResult(getSugarValue, getSizeValue, getIceRockValue, getToppingValue);
  console.log(1);
});
subtract.addEventListener("click", () => {
  handleSubtract();
  handleResult(getSugarValue, getSizeValue, getIceRockValue, getToppingValue);
});
