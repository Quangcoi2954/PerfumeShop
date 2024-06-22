<?php
include "header.php";
include "slider.php";
include "class/category_class.php";
?>

<?php
$category = new category;
$show_category = $category->show_category();
?>
<div class="admin-content-right">
    <div class="admin-content-right-category_list">
        <h1>Danh Sách Thương Hiệu</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Thương hiệu</th>
                <th>Tùy chỉnh</th>
            </tr>
            <?php
                if($show_category){
                    $i = 0;
                    while($result = $show_category->fetch_assoc()){
                        $i++;

            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $result['categoryID'] ?></td>
                <td><?php echo $result['categoryName'] ?></td>
                <td><a href="categoryEdit.php?categoryID=<?php echo $result['categoryID'] ?>">Sửa</a> | <a href="categoryDelete.php?categoryID=<?php echo $result['categoryID'] ?>">Xóa</a></td>
            </tr>
            <?php
                    }
                }
            ?>
        </table>
    </div>
</div>
</section>
</body>
</html>