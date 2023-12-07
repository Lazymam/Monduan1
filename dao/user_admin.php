<?php
function get_user_username_pass($user,$pass){
    $sql = "SELECT * FROM user WHERE username=? AND password=?";
    return pdo_query_one($sql, $user,$pass);
}
function user_insert($username, $password,$ten,$diachi,$email,$dienthoai){
    $sql = "INSERT INTO user(username, password,ten,diachi,email,dienthoai) VALUES (?, ?, ?,?, ?, ?)";
    pdo_execute($sql, $username, $password,$ten,$diachi,$email,$dienthoai);
}

?>  
