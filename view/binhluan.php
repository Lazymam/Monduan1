<?php
session_start();
include "../dao/pdo.php";
include "../dao/binh-luan.php";
if(isset($_GET['idpro'])){
    // echo $_GET['idpro'];
    $idpro=$_GET['idpro'];
}
if(isset($_POST['guibinhluan'])){
    $idpro=$_POST['idpro'];
    $noidung=$_POST['noidung'];
    $ngaybl=date('H:i:s d/m/y');
    $iduser=$_SESSION['s_user']['id'];
    // $hoten=$_SESSION['s_user']['hoten'];
    binhluan_insert($iduser, $idpro, $noidung, $ngaybl);
}
$dsbl = binhluan_select_all();
$html_bl = "";

foreach ($dsbl as $bl) {
    extract($bl);
    $html_bl .= '<p>' . $noidung . '<br> ' . $iduser . '-(' . $ngaybl . ')</p>';
}

?>
<h1>BÌNH LUẬN</h1>
<?php
if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="idpro" value="<?php echo $idpro; ?>"> 
        <textarea name="noidung" id="" cols="100%" rows="5"></textarea>
        <button type="submit" name="guibinhluan">Gửi bình luận</button>
    </form>
    <?php
} else {
    $_SESSION['trang'] = "sanphamchitiet";
    echo "<a href='../index.php?pg=dangnhap' target='_parent'>Bạn phải đăng nhập mới có thể bình luận ?</a>";
}
?>
<div class="dsbl">
   <?=$html_bl?>
</div>