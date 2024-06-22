<?php
    include "header.php";
    include "slider.php";
    include "class/category_class.php";
?>

<?php
    $category = new category;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $categoryName = $_POST['categoryName'];
        $insert_category = $category->insert_category($categoryName);
    }
?>

<div class="admin-content-right">
    <div class="admin-content-right-category_add">
        <h1>Thêm Thương Hiệu</h1>
        <form action="" method="POST">
            <input required name="categoryName" type="text" placeholder="Nhập tên thương hiệu">
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
</section>
</body>
</html>