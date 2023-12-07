
        <div class="main-content">
          <h3 class="title-page">Bình luận</h3>
          <div class="d-flex justify-content-end">
          </div>
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
              <th>STT</th>
                <th>NỘi dung bình luận</th>
                <th>Ngày bình luận</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($bl_list as $bl) {
                
              echo '
              <tr>
                <td>'. $bl['id'].'</td>
                <td>'. $bl['noidung'] .'</td>
                <td>'. $bl['ngaybl'] .'</td>
                <td>
                    <a href="index.php?pg=binhluan_del&id=' .$bl['id'] . '" class="btn btn-danger"><i
                            class="fa-solid fa-trash"></i> Xóa</a>
                </td>
              </tr>
              ';}
              ?>
           
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
      new DataTable("#example");
    </script>