<?php
   // insert vào table cart
   function cart_insert($idpro, $price,$name,$img,$soluong,$thanhtien, $idbill){
      $sql = "INSERT INTO cart(idpro, price, name,img,soluong,thanhtien,idbill) VALUES (?, ?, ?, ?, ?, ?, ?)";
      pdo_execute($sql, $idpro, $price,$name,$img,$soluong,$thanhtien, $idbill);
  }
  
  

  function viewcart(){
   $html_cart='';
   $i=1;
   $cart_items = [];

   // Kiểm tra nếu có yêu cầu xóa sản phẩm
   if (isset($_GET['remove'])) {
       $index = $_GET['remove'];
       if (isset($_SESSION['giohang'][$index])) {
           unset($_SESSION['giohang'][$index]);
           // Cập nhật lại session giỏ hàng
           $_SESSION['giohang'] = array_values($_SESSION['giohang']);
       }
   }

   foreach ($_SESSION['giohang'] as $sp) {
       $found = false;

       // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
       foreach ($cart_items as &$item) {
           if ($item['name'] === $sp['name']) {
               // Sản phẩm đã tồn tại, cộng thêm vào số lượng
               $item['soluong'] += (int)$sp['soluong'];
               $found = true;
               break;
           }
       }

       // Nếu sản phẩm chưa tồn tại, thêm vào giỏ hàng
       if (!$found) {
           $cart_items[] = $sp;
       }
   }

   foreach ($cart_items as $index => $item) {
       extract($item);
       $tt = (int)$price * (int)$soluong;

       $html_cart .= '
           <tr>
               <td>' . $i . '</td>
               <td><img src="layout/images/' . $img . '" alt="" style="width:100px"></td>
               <td>' . $name . '</td>
               <td>' . $price . '</td>
               <td>' . $soluong . '</td>
               <td>' . $tt . '</td>
               <td><a href="index.php?pg=viewcart&remove=' . $index . '">Xóa</a></td>
           </tr>
       ';

       $i++;
   }

   return $html_cart;
}
function get_tongdonhang(){
   $tong=0;
   foreach ($_SESSION['giohang'] as $sp) {
      extract($sp);
      $tt=(Int)$price*(Int)$soluong;
      $tong+=$tt;
   }
   return $tong;
}

?>