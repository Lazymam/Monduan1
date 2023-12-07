
<div class="main-content">
          <h3 class="title-page">Sản phẩm</h3>
          <div class="d-flex justify-content-end">
            <a href="index.php?pg=catalog_add" class="btn btn-primary mb-2"
              >Thêm danh mục</a>
            
          </div>
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
              <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>STT</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
             
                <?php foreach($danhmuclist as $dm): ?>
                <tr>
                <td><?=$dm['id']?></td>
                <td><?=$dm['name']?></td>
                <td><?=$dm['stt']?></td>
                <td>
                <a href="index.php?pg=catalog_update&id=<?=$dm['id']?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>Sửa</a>
                    <a href="index.php?pg=catalog_del&id=<?=$dm['id']?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i>Xóa</a>
            </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
      new DataTable("#example");
    </script>