<div class="main-content">
    <h3 class="title-page">
        Thêm danh mục
    </h3>

    <form class="addPro" action="index.php?pg=catalog_add" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name">Tên danh mục:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm">
        </div>


        <div class="form-group">
            <button type="submit" name="btnadd" class="btn btn-primary">Thêm danh mục</button>
        </div>
        <?php if(isset($tb)&&($tb!="")){ 
            echo $tb;
        }
        ?>
    </form>
</div>

<script>
    new DataTable('#example');
</script>