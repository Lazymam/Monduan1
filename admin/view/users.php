<?php
  // $html_userlist=showuser_admin($dsuser);
  $user_list = get_user_list();
?>
        <div class="main-content">
          <h3 class="title-page">Thành Viên</h3>
          <div class="d-flex justify-content-end">
            <a href="index.php?pg=users_add" class="btn btn-primary mb-2"
              >Thêm thành viên</a>
            
          </div>
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
              <th>STT</th>
                <th>Tên thành viên</th>
                <th>Mật khẩu</th>
                <th>Họ và tên</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($user_list as $user) {
                
              echo '
              <tr>
                <td>'. $user['id'].'</td>
                <td>'. $user['username'] .'</td>
                <td>'. $user['password'] .'</td>
                <td>'. $user['ten'] .'</td>
                <td>'. $user['diachi'] .'</td>
                <td>'. $user['email'] .'</td>
                <td>'. $user['dienthoai'] .'</td>
                <td>
                    <a href="index.php?pg=users_update&id=' . $user['id'] . '" class="btn btn-warning"><i
                            class="fa-solid fa-pen-to-square"></i> Sửa</a>
                    <a href="index.php?pg=users_del&id=' .$user['id'] . '" class="btn btn-danger"><i
                            class="fa-solid fa-trash"></i> Xóa</a>
                </td>
              </tr>
              ';}
              ?>
            <!-- <?=$html_userlist;?> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
      new DataTable("#example");
    </script>