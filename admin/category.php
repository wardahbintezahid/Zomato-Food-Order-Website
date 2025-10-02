<?php
require_once("includes/header.php");

$sql = "SELECT * FROM `category`";
$result = mysqli_query($con, $sql);

?>

<!-- All User Table Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>All Category</h5>
                        <form class="d-inline-flex">
                            <a href="add-new-categorys.php"
                                class="align-items-center btn btn-theme d-flex">
                                <i data-feather="plus-square"></i>Add New
                            </a>
                        </form>
                    </div>
                    <div class="table-responsive theme-scrollbar">
                        <div>
                            <table class="table category-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        if ($result) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $id = $row['id'];
                                                $category_name = $row['category_name'];
                                                $category_image = $row['category_image'];
                                                $category_desc = $row['category_desc'];

                                                echo '
                                                    <tr>
                                                        <td>
                                                            <div class="table-image">
                                                                <img src="../images/category/'.$category_image.'" class="img-fluid">
                                                            </div>
                                                        </td>
                                                        <td>'.$category_name.'</td>
                                                        <td>
                                                            <ul
                                                                class="d-flex align-items-center  justify-content-center">
                                                                
                                                                <li>
                                                                    <a href="add-new-categorys.php?id='.$id.'">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="delete-category.php?id='.$id.'"><i class="ri-delete-bin-line"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                ';
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                
<?php
require_once("includes/footer.php");
?>