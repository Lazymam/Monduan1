<?php

    if(isset($dm)&&(count($dm)>0)){
        extract($dm);
        $idupdate=$id;
    }
?>
<div class="main-content">
                <h3 class="title-page">
                    Sửa danh mục
                </h3>
                
                <form class="addPro" action="index.php?pg=updatecatalog" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên Danh Muc:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên danh muc">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?=$idupdate?>">
                        <button type="submit" name="updatecatalog" class="btn btn-primary">Cập nhật danh mục</button>
                    </div>
                  
                </form>
            </div>

            <script>
                new DataTable('#example');
            </script>