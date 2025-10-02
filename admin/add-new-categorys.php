<?php
require_once("includes/header.php");

$id = "";
$category_name = "";
$category_image = "";
$category_desc = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `category` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $category_name = $row['category_name'];
    $category_image = $row['category_image'];
    $category_desc = $row['category_desc'];
}

?>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Category Information</h5>
                        </div>

                        <div class="card-body">
                            <form action="add-category.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="input-items">
                                    <div class="row gy-3">
                                        <div class="col-12">
                                            <div class="input-box">
                                                <h6>Name</h6>
                                                <input type="text" name="category_name" value="<?php echo $category_name; ?>" placeholder="Enter Your Name" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-box">
                                                <h6>Category Image</h6>
                                                <input type="file" name="category_image" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-box">
                                                <h6>Description</h6>
                                                <textarea name="category_desc" rows="4"><?php echo $category_desc; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <input class="btn restaurant-button" type="submit" name="submit" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- New Product Add End -->

<?php
require_once("includes/footer.php");
?>