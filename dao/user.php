<?php
// require_once 'pdo.php';

function user_insert($username, $password,$ten,$diachi,$email,$dienthoai){
    $sql = "INSERT INTO user(username, password,ten,diachi,email,dienthoai) VALUES (?, ?, ?,?, ?, ?)";
    pdo_execute($sql, $username, $password,$ten,$diachi,$email,$dienthoai);
}
function users_insert($username, $password, $email){
    $sql = "INSERT INTO user(username, password, email) VALUES (?, ?, ?)";
    pdo_execute($sql, $username, $password, $email);
}

function user_insert_id($username, $password,$ten, $diachi, $email, $dienthoai){
    $sql = "INSERT INTO user(username,password,ten, diachi, email, dienthoai) VALUES (?,?,?,?,?,?)";
    return pdo_execute_id($sql,$username, $password, $ten, $diachi, $email, $dienthoai);
    ;
}
function user_update($username, $password, $ten, $diachi, $email, $dienthoai,$id) {
    $sql = "UPDATE user SET username=?, password=?, ten=?, diachi=?, email=?, dienthoai=? WHERE id=?";
    pdo_execute($sql, $username, $password, $ten, $diachi, $email, $dienthoai, $id);
}

function user_delete($id){
    $sql = "DELETE FROM user WHERE id=?";
     if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
     else{
        pdo_execute($sql, $id);
     }
}

function users_select_by_id($id){
    $sql = "SELECT * FROM user WHERE id=?";
    return pdo_query_one($sql, $id);
}
function checkuser($username,$password){
   $sql="Select * from user where username=? and password=?"; 
   return pdo_query_one($sql, $username,$password);
    // if(is_array($kq)&&(count($kq))){
    //     return $kq["id"];
    // }else{
    //     return 0;
    // }
    }
// function get_user($id){
//     $sql="Select * from user where id=? ";
//     return pdo_query_one($sql, $id);
// }
// function showuser_admin($dsuser)
// {
//     $html_dsuser = '';
//     $i = 1;
//     foreach ($dsuser as $ds) {
//         extract($ds);
//         $html_dsuser .= '<tr>
//         <td>'. $id .'</td>
//         <td>'. $name .'</td>
//         <td>'. $home .'</td>
//         <td>
//             <a href="index.php?pg=catalogupdate&id=' . $id . '" class="btn btn-warning"><i
//                     class="fa-solid fa-pen-to-square"></i> Sửa</a>
//             <a href="index.php?pg=delcatalog&id=' . $id . '" class="btn btn-danger"><i
//                     class="fa-solid fa-trash"></i> Xóa</a>
//         </td>
//     </tr>';
//         $i++;
//     }
//     return $html_dsuser;
// }
function get_user_list(){
    $sql = "SELECT * FROM user";
    return pdo_query($sql);
}
// function user_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro){
//     $sql = "UPDATE user SET mat_khau=?,ho_ten=?,email=?,hinh=?,kich_hoat=?,vai_tro=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat==1, $vai_tro==1, $ma_kh);
// }

//function users_delete($id){
//    $sql = "DELETE FROM user  WHERE id=?";
//     if(is_array($id)){
//         foreach ($id as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//        pdo_execute($sql, $id);
//     }
//}

// function user_select_all(){
//     $sql = "SELECT * FROM user";
//     return pdo_query($sql);
// }

// function user_select_by_id($ma_kh){
//     $sql = "SELECT * FROM user WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function user_exist($ma_kh){
//     $sql = "SELECT count(*) FROM user WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function user_select_by_role($vai_tro){
//     $sql = "SELECT * FROM user WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function user_change_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE user SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }