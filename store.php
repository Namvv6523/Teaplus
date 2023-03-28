
<?php $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : "";                             
$product_price = isset($_POST['product_price']) ? $_POST['product_price'] : 1;                             
$sugar = isset($_POST['sugar']) ? $_POST['sugar'] : 1;                             
$ice = isset($_POST['ice-rock']) ? $_POST['ice-rock'] : 1;                             
$size = isset($_POST['size']) ? $_POST['size'] : 1;                             
$topping = isset($_POST['topping']) ? $_POST['topping'] : 1;                             
$image = isset($_POST['image']) ? $_POST['image'] : "";
$id = isset($_POST['id']) ? $_POST['id'] : 0;
$id_user = $_SESSION['user']['id'];
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
$stringTopping = 0;
if(is_array($topping) && $topping != null){
for($i = 0 ; $i < count($topping);$i++){
    $stringTopping += floatval($topping[$i]);
}
}
$result = ($product_price + floatval($sugar) + floatval($size) + floatval($ice) + floatval($stringTopping)) * floatval($quantity);
$status = 1;
   

insert_giohang($id,$id_user,$product_name,$image,$sugar,$size,$ice,$stringTopping,$product_price,$quantity,$result,$status);
$addProductCart = [$id,$image,$product_name,$product_price,$sugar,$size,$ice,$topping,$quantity,$result];

array_push($_SESSION['mycart'],$addProductCart);
            
// $_SESSION['mycart'] = [];
$cart_result = loadall_cart_idUser($id_user);
?>