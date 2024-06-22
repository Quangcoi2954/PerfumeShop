<?php
include "database.php";
?>
<?php
class product{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_category(){
        $query = "SELECT * FROM category ORDER BY categoryID DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function insert_product()
    {
        $categoryID = $_POST["categoryID"];
        $productName = $_POST["productName"];
        $gender = $_POST["gender"];
        $productCapacity = $_POST["productCapacity"];
        $productPrice = $_POST["productPrice"];
        $productDescription = $_POST["productDescription"];
        $productImage = $_FILES["productImage"]["name"];
        $productQuantity = $_POST["productQuantity"];
        move_uploaded_file($_FILES["productImage"]["tmp_name"],"images/".$productImage);
        $query = "INSERT INTO product (
                     categoryID,
                     productName,
                     gender,
                     productCapacity,  
                     productPrice,
                     productDescription,
                     productImage,
                     productQuantity) VALUES ('$categoryID', '$productName', '$gender','$productCapacity', '$productPrice', '$productDescription', '$productImage', '$productQuantity')";
        $result = $this->db->insert($query);
        header('location:productAdd.php');
        return $result;
    }

    public function show_product()
    {
        $query = "SELECT p.*, c.categoryName 
              FROM product p
              LEFT JOIN category c ON p.categoryID = c.categoryID
              ORDER BY p.categoryID DESC";
        $result = $this->db->select($query);
        return $result;
    }








































    public function get_category($categoryID){
        $query = "SELECT * FROM category WHERE categoryID = '$categoryID'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_category($categoryID, $categoryName){
        $query = "UPDATE category SET categoryName = '$categoryName' WHERE categoryID = '$categoryID'";
        $result = $this->db->update($query);
        header('location:categoryList.php');
        return $result;
    }

    public function delete_category($categoryID){
        $query = "DELETE FROM category WHERE categoryID = '$categoryID'";
        $result = $this->db->delete($query);
        header('location:categoryList.php');
        return $result;
    }
}
?>
