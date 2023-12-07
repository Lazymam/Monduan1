<?php
   $html_cart = viewcart();
   $tongdonhang = get_tongdonhang();

   // Lưu giá trị tổng thanh toán vào session
   $_SESSION['tongdonhang'] = $tongdonhang;
?>
<div class="containerfull">
    <div class="bgbanner">GIỎ HÀNG</div>
</div>

<section class="containerfull">
    <div class="container">
        <div class="col9 viewcart">
            <?php
            // Kiểm tra nếu có sản phẩm trong giỏ hàng
            if (!empty($_SESSION['giohang'])) {
                echo '<h2>ĐƠN HÀNG</h2>';
                echo '<table>';
                echo '<tr>';
                echo '<th>STT</th>';
                echo '<th>Hình</th>';
                echo '<th>Tên sản phẩm</th>';
                echo '<th>Đơn giá</th>';
                echo '<th>Số lượng</th>';
                echo '<th>Thành tiền</th>';
                echo '<th>Thao tác</th>';
                echo '</tr>';
                echo $html_cart;
                echo '</table>';
                echo '<a href="index.php?pg=viewcart&del=1">Xóa rỗng đơn hàng</a>';
            } else {
                echo '<p>Giỏ hàng trống</p>';
            }
            ?>
        </div>
        <div class="col3">
            <?php
            // Kiểm tra nếu có sản phẩm trong giỏ hàng
            if (!empty($_SESSION['giohang'])) {
                echo '<h2>ĐƠN HÀNG</h2>';
                echo '<div class="total">';
                echo '<h3>Tổng: ' . $tongdonhang . '</h3>';
                echo '</div>';
                echo '<div class="coupon">';
                echo '<form action="index.php?pg=viewcart&voucher=1" method="post">';
                echo '<input type="hidden" name="tongdonhang" value="' . $tongdonhang . '">';
                echo '<input type="text" name="mavoucher" placeholder="Nhập voucher">';
                echo '<button type="submit" class="btn_ma">Áp mã</button>';
                echo '</form>';
                echo '</div>';
                echo '<div class="total">';
                echo '<h3>Tổng thanh toán: ' . $tongdonhang . '</h3>';
                echo '</div>';
                echo '<a href="index.php?pg=index"><button>Tiếp tục đặt hàng</button></a>';
                echo '<a href="index.php?pg=donhang"><button>Thanh Toán</button></a>';
            } else {
                // Nếu giỏ hàng rỗng, hiển thị nút "Tiếp tục đặt hàng"
                echo '<a href="index.php?pg=index"><button>Tiếp tục đặt hàng</button></a>';
            }
            ?>
        </div>
    </div>
</section>
