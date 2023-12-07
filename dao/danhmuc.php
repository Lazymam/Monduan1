<?php
require_once 'pdo.php';

// /**
//  * Thêm loại mới
//  * @param String $ten_danhmuc là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
function danhmuc_insert($name){
    $sql = "INSERT INTO danhmuc(name) VALUES(?)";
    pdo_execute($sql, $name);
}
// /**
//  * Cập nhật tên loại
//  * @param int $ma_danhmuc là mã loại cần cập nhật
//  * @param String $ten_danhmuc là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
function danhmuc_update($id, $name){
    $sql = "UPDATE danhmuc SET name=? WHERE id=?";
    pdo_execute($sql, $name, $id);
}
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
function danhmuc_delete($id){
    $sql = "DELETE FROM danhmuc WHERE id=?";
     if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
     else{
        pdo_execute($sql, $id);
     }
}
function catalog_delete($id){
    $sql = "DELETE FROM danhmuc WHERE id=?";
    // if(is_array($id)){
    //     foreach ($id as $ma) {
    //         pdo_execute($sql, $ma);
    //     }
    // }
    // else{
        pdo_execute($sql, $id);
    // }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_all()
{
    $sql = "SELECT * FROM danhmuc ORDER BY stt DESC";
    return pdo_query($sql);
}
function catalog_list()
{
    $sql = "SELECT * FROM DanhMuc";
    return pdo_query($sql);
}
function showdm($dsdm)
{
    $html_dm = '';
    foreach ($dsdm as $dm) {
        extract($dm);
        $link = 'index.php?pg=sanpham&iddm=' . $id;
        $html_dm .= '<a href="' . $link . '">' . $name . '</a>';
    }
    return $html_dm;
}
function get_name_dm($id)
{
    $sql = "SELECT name FROM danhmuc WHERE id=" . $id;
    $kq = pdo_query_one($sql);
    return $kq["name"];
}

//
function showdm_admin($dsdm, $iddm)
{
    $html_dm = '';
    foreach ($dsdm as $dm) {
        extract($dm);
        $html_dm .= ' <option value="' . $id . '" >' . $name . '</option>';
    }
    return $html_dm;
}
function showdmadmin($dsdm)
{
    $html_dsdm = '';
    $i = 1;
    foreach ($dsdm as $dm) {
        extract($dm);
        $html_dsdm .= '<tr>
        <td>'. $id .'</td>
        <td>'. $name .'</td>
        <td>'. $home .'</td>
        <td>
            <a href="index.php?pg=catalogupdate&id=' . $id . '" class="btn btn-warning"><i
                    class="fa-solid fa-pen-to-square"></i> Sửa</a>
            <a href="index.php?pg=delcatalog&id=' . $id . '" class="btn btn-danger"><i
                    class="fa-solid fa-trash"></i> Xóa</a>
        </td>
    </tr>';
        $i++;
    }
    return $html_dsdm;
}

// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_danhmuc là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
function danhmuc_select_by_id($id){
    $sql = "SELECT * FROM danhmuc WHERE id=?";
    return pdo_query_one($sql, $id);
}
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_danhmuc là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_exist($ma_danhmuc){
//     $sql = "SELECT count(*) FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_value($sql, $ma_danhmuc) > 0;
// }