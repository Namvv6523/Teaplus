export default function handleUpgradeCart(isClickQuantity) {
  const upgradeCart = document.querySelector(".upgrade-cart");
  const containUpgradeCart = document.querySelector(".contain-upgrade-cart");
  const rotateUpgradeCart = document.querySelector(".rotate-upgrade-cart");
  const formSubmitCart = document.querySelector(".form-submit-cart");
  if (isClickQuantity) {
    upgradeCart.classList.add("active-upgrade-cart");
    containUpgradeCart.classList.add("active-upgrade-cart");
    containUpgradeCart.style.pointerEvents = "auto";
    upgradeCart.addEventListener("click", function (e) {
        e.preventDefault();
        rotateUpgradeCart.style.display="inline-block";
        setTimeout(() => {        
        rotateUpgradeCart.style.display="none";
        upgradeCart.classList.remove("active-upgrade-cart");
        containUpgradeCart.classList.remove("active-upgrade-cart");
        formSubmitCart.submit();
        isClickQuantity = false;
      }, 2000);
    });
  }
}

// js thuộc phần main <main>

// ---------------------- logic tính toán tiền-------------------------

const subtract = document.querySelectorAll(".subtract");
const add = document.querySelectorAll(".add");
const productQuantity = document.querySelectorAll(".product_quantity");


const inputQuantity1 = document.querySelectorAll("input[name='quantity1[]']");
if(inputQuantity1){
var arrayBooleanValue = [];
var booleanValueLength = inputQuantity1.length;     
for( var i=0; i<booleanValueLength;i++)
{
  arrayBooleanValue.push(true);
}




var cart = [
  {
    quantity:  arrayBooleanValue[0] ? inputQuantity1[0].value : null,
  },
  {
    quantity: arrayBooleanValue[1] ? inputQuantity1[1].value : null,
  },
  {
    quantity: arrayBooleanValue[2] ? inputQuantity1[2].value : null,
  },
  {
    quantity:  arrayBooleanValue[3] ? inputQuantity1[3].value : null,
  },
  {
    quantity: arrayBooleanValue[4] ? inputQuantity1[4].value : null,
  },
  {
    quantity: arrayBooleanValue[5] ? inputQuantity1[5].value : null,
  },
  {
    quantity: 1,
  },
  {
    quantity: 1,
  },
  {
    quantity: 1,
  },
];

var quantity = 1;
const handleAdd = (index) => {
  if (cart[index]) {
    // Nếu đã có sản phẩm trong đơn hàng, tăng số lượng sản phẩm lên 1
    cart[index].quantity++;
  } else {
    // Nếu chưa có sản phẩm trong đơn hàng, khởi tạo số lượng sản phẩm là 1
    cart[index] = 1;
  }

  return handleQuantity(index);
};

const handleSubtract = (index) => {
    if (cart[index].quantity) {
      // Nếu đã có sản phẩm trong đơn hàng, giảm số lượng sản phẩm 
    cart[index].quantity--;
  } else {
    // Nếu chưa có sản phẩm trong đơn hàng, khởi tạo số lượng sản phẩm là 1
    cart[index] = 1;
  }
  return handleQuantity(index);
};

const handleQuantity = (index) => {
  if (index || index === 0) {
    productQuantity[index].innerHTML = cart[index].quantity;
    inputQuantity1[index].value = cart[index].quantity;
  }
  return cart[index].quantity;
};


const handleTotalCash = (index) =>{
  const totalCash = document.querySelectorAll(".totalCash");
  const inputTotalCash = document.querySelectorAll("input[name='totalCash[]']");
  const inputSugar = document.querySelectorAll("input[name='sugar']");
  const inputSize = document.querySelectorAll("input[name='size']");
  const inputToppping = document.querySelectorAll("input[name='toppping']");
  const inputPrice = document.querySelectorAll("input[name='price']");

  const inputQuan = handleQuantity(index)
  const sum = ( parseInt(inputPrice[index].value,10) +  parseInt(inputSugar[index].value,10) + parseInt(inputSize[index].value,10) + parseInt(inputToppping[index].value,10)) * parseInt(inputQuan,10)
  console.log(sum);
  inputTotalCash[index].value = sum;
  const localStringSum = sum.toLocaleString();
  totalCash[index].innerHTML = localStringSum + "đ";

}

let isClickQuantity = false;
add.forEach((ele, index) => {
  ele.addEventListener("click", () => {
    handleAdd(index);
    isClickQuantity = true;
   
    handleUpgradeCart(isClickQuantity);
    handleTotalCash(index);
  });
});
subtract.forEach((ele, index) => {
  ele.addEventListener("click", () => {
    handleSubtract(index);
    isClickQuantity = true;
    handleUpgradeCart(isClickQuantity);
    handleTotalCash(index);
  });
});
// ---------------------------------------Phần thanh toán tiền------------------------------
const formPay = document.querySelector(".form-pay");


const  validate = (e)=>{
  // const listener = function (e) {
  //   e.preventDefault();
  // };
    e.preventDefault()
    const inputUser = document.querySelector("input[name='user']").value;
    const inputPhone = document.querySelector("input[name='number-phone']").value;
    const inputAddress = document.querySelector("input[name='address']").value;
    const note = document.querySelector(".note");
    let isSubmit = true;
    if(inputUser.length == 0 || inputPhone.length == 0 || inputAddress.length == 0){
      note.style.display = "block";
      isSubmit = false;
    }
    else{
      isSubmit = true;
    }
    if(isSubmit){
      formPay.submit();

    }
    

}
if(formPay){
formPay.addEventListener("submit",validate);
}


    const required = ["user","number-phone","address"];
    const inputInfo = document.querySelectorAll(".input-info");
    const buyNow = document.querySelector(".buy-now");

inputInfo.forEach((input,index)=>{
    const nameAtribute = input.getAttribute("name");
  input.addEventListener("change",(e)=>{
    const inputUser = document.querySelector("input[name='user']").value;
    const inputPhone = document.querySelector("input[name='number-phone']").value;
    const inputAddress = document.querySelector("input[name='address']").value;
    if(inputUser.length != 0 && inputPhone.length != 0 && inputAddress.length != 0){
      buyNow.classList.add("active-upgrade-cart")
    }
    else{
      buyNow.classList.remove("active-upgrade-cart")

    }
  })
})
}



