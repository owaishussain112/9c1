<?php
include("components/header.php");
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row  bg-light rounded mx-0">
                    <div class="col-md-12">
                        <h3 class="py-3 px-3">All Categories</h3>
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Category Image</th>
                                        <th scope="col" colspan="2">Actoin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $pdo->query("select * from categories");
                                    $catRows = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($catRows as $catValues){
                                        ?>
                                        
                                        
                                        <tr>
                                        <th scope="row"><?php echo $catValues['catId']?></th>
                                        <td><?php echo $catValues['catName']?></td>
                                        <td><img src="<?php echo $catImgAddress.$catValues['catImage']?>" width="80"></td>
                                        <td><a href="" class="btn btn-outline-primary">Edit</a></td>
                                        <td><a href="" class="btn btn-outline-danger">Delete</a></td>
                                    </tr>
                                        <?php
                                    }
                                    ?>
                                 
                                   
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

<?php
include("components/footer.php");
?>