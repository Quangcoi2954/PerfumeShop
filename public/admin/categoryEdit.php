<?php
include "header.php";
include "slider.php";
include "class/category_class.php";
?>

<?php
    $category = new category;
    if (!isset($_GET['categoryID']) || $_GET['categoryID']==NULL){
        echo "<script>window.location = 'categoryList.php'</script>";
    }
    else{
        $categoryID = $_GET['categoryID'];
    }
    $get_category = $category->get_category($categoryID);
    if($get_category){
        $result = $get_category->fetch_assoc();
    }
?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $categoryName = $_POST['categoryName'];
        $update_category = $category->update_category($categoryID, $categoryName);
    }
?>
<div class="admin-content-right">
    <div class="admin-content-right-category_add">
        <h1>Sửa Thương Hiệu</h1>
        <form action="" method="POST">
            <input required name="categoryName" type="text" placeholder="Nhập tên thương hiệu" value="<?php echo $result['categoryName'] ?>">
            <button type="submit">Hoàn Tất</button>
        </form>
    </div>
</div>
</section>
</body>
</html>