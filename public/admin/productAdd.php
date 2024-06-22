<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>

<?php
    $product = new product;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
//        var_dump($_POST, $_FILES);
//        $categoryName = $_POST['categoryName'];
        $insert_category = $product->insert_product($_POST, $_FILES);
    }
?>

<div class="admin-content-right">
    <div class="admin-content-right-product_add">
        <h1>Thêm Sản Phẩm</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <select name="categoryID" id="">
                <option value="#">--Chọn thương hiệu--</option>
                <?php
                    $show_category = $product->show_category();
                    if($show_category){
                        while($result = $show_category->fetch_assoc()){


                ?>
                <option value="<?php echo $result['categoryID'] ?>"><?php echo $result['categoryName'] ?></option>
                <?php
                        }
                    }
                ?>
            </select>
            <label for="">Nhập tên sản phẩm<span style="color: red">*</span></label>
            <input name="productName" required type="text">
            <select name="gender" id="">
                <option value="#">--Giới tính--</option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Unisex">Unisex</option>
            </select>
            <label for="">Dung tích (ml)<span style="color: red">*</span></label>
            <input name="productCapacity" required type="number" min="1">
            <label for="">Nhập giá sản phẩm<span style="color: red">*</span></label>
            <input name="productPrice" required type="text">
            <label for="">Nhập mô tả sản phẩm<span style="color: red">*</span></label>
            <textarea name="productDescription" id="editor2" cols="30" rows="10"></textarea>
            <label for="">Chọn ảnh sản phẩm<span style="color: red">*</span></label>
            <input name="productImage" type="file">
            <label for="">Nhập số lượng<span style="color: red">*</span></label>
            <input name="productQuantity" required type="number" min="1">
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
</section>
</body>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('editor2')
</script>
</html>