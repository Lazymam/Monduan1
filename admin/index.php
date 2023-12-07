<?php
include "../dao/global.php";
include "../dao/pdo.php";
include "../dao/danhmuc.php";
include "../dao/sanpham.php";
include "../dao/binh-luan.php";
include "../dao/user.php";

include "view/header.php";
if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];
    switch ($pg) {
        case 'sanphamlist':
            //tim kiếm
            if (isset($_POST['timkiem'])) {
                $kyw=$_POST['kyw'];
            }else {
                $kyw="";
            }
            $sanphamlist =get_dssp_admin($kyw);
             $sanphamlist = get_dssp_new(100);
            include "view/sanphamlist.php";
            break;
        case 'updateproduct':
            // kiem tra va lay du lieu
            if (isset($_POST['updateproduct'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $iddm = $_POST['iddm'];
                $img = $_FILES['img']['name'];
                $id = $_POST['id'];
                // up load hinh anh
                if ($img != "") {
                    $target_file = IMG_PATH_ADMIN . $img;
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                } else {
                    $img = "";
                }
                //insert into
                sanpham_update($name, $img, $price, $iddm, $id);
            }
            $sanphamlist = get_dssp_new(100);
            include "view/sanphamlist.php";
            break;
        case 'sanphamadd':
            $danhmuclist = danhmuc_all();
            include "view/sanphamadd.php";
            break;
        case 'addproduct':
            if (isset($_POST['addproduct'])) {
                //lấy dữ liệu
                $name = $_POST['name'];
                $price = $_POST['price'];
                $iddm = $_POST['iddm'];
                $img = $_FILES['img']['name'];
                //insert into
                sanpham_insert($name, $img, $price, $iddm);
                // uo load hinh anh
                $target_file = IMG_PATH_ADMIN . $img;
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                //trở về trang danh sách sản phẩm
                $sanphamlist = get_dssp_new(20);
                include "view/sanphamlist.php";
            } else {
                $danhmuclist = danhmuc_all();
                include "view/sanphamadd.php";
            }
            break;
        case 'delproduct':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $img = IMG_PATH_ADMIN . get_img($id);
                if (is_file($img)) {
                    unlink($img);
                }
                try {
                    sanpham_delete($id);
                } catch (\Throwable $th) {
                    echo "<h3 style='color:Red;Text-align=center'>Sản phẩm đã có trong giỏ hàng!</h3>";
                }
                ;
            }

            //trở về trang danh sách sản phẩm
            $sanphamlist = get_dssp_new(20);
            include "view/sanphamlist.php";
            break;

        case 'sanphamupdate':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $sp = get_sanphamchitiet($id);
            }
            //trở về trang danh sách sản phẩm
            $danhmuclist = danhmuc_all();
            include "view/sanphamupdate.php";
            break;
        case 'catalog':
            $danhmuclist = catalog_list();
            include "view/catalog.php";
            break;
        case 'catalog_add':
            if (isset($_POST['btnadd'])) {
                $name = $_POST['name'];
                danhmuc_insert($name);
                $tb = "Ban đã action form";
            }
            include "view/catalog_add.php";
            break;
        case 'catalog_del':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                catalog_delete($id);
            }
            $danhmuclist = danhmuc_all();
            include "view/catalog.php";
            break;
        case "updatecatalog":
             // kiem tra va lay du lieu
             if (isset($_POST['updatecatalog'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
               
                //insert into
                danhmuc_update($id, $name);
            }
            $danhmuclist = danhmuc_all();
            include "view/catalog.php";
            break;
        case 'catalog_update':
             if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $dm = danhmuc_select_by_id($id);
            }
            //trở về trang danh sách sản phẩm
            $danhmuclist = danhmuc_all();
            include "view/catalog_update.php";
            break;
        case 'users':
            $user_list = get_user_list();
            include "view/users.php";
            break; 
        case 'users_add':
            if (isset($_POST['btnadd'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $ten = $_POST['ten'];
                $diachi = $_POST['diachi'];
                $email = $_POST['email'];
                $dienthoai = $_POST['dienthoai'];
                user_insert($username, $password,$ten,$diachi,$email,$dienthoai);
                $tb = "Bạn đã thêm thành công!";
            }
            include "view/users_add.php";        
            break;
        case 'users_del':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                user_delete($id);
            }
            $user_list = get_user_list();
            include "view/users.php";
            break;
        case 'users_update':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
               $id = $_GET['id'];
               $us = users_select_by_id($id);
            }
            //trở về trang danh sách sản phẩm
            $user_list = get_user_list();
            include "view/users_update.php";
            break;
            case "updateusers":
                // kiem tra va lay du lieu
                if (isset($_POST['updateusers'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $ten = $_POST['ten'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
                    $dienthoai = $_POST['dienthoai'];
                    $id = $_POST['id'];
                    $tb = "Cập nhật thành công";
            
                    // Insert into
                    if (user_update($username, $password, $ten, $diachi, $email, $dienthoai,$id)) {
                        echo "Update successful";
                    } else {
                        echo "Update failed";
                    }
                }
                $user_list = get_user_list();
                include "view/users.php";
                break;
                     
        case 'binhluan':
                
                $bl_list = binhluan_select_all();
                include "view/binhluan.php";
            break;  
        case 'binhluan_del':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                binhluan_delete($id);
            }
            $bl_list = binhluan_select_all();
            include "view/binhluan.php";
            break; 
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";



?>