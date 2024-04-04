<?php
include('query.php');
include('header2.php');
?>

            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Products</h2>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <!-- <th scope="col">&nbsp;</th> -->
                                        <th scope="col">Product Name</th>
                                        <th scope="col" class="text-center">Units Sold</th>
                                        <th scope="col" class="text-center">In Stock</th>
                                        <th scope="col">Expire Date</th>
                                        <th scope="col">Status</th>
                                        
                                        <th scope="col">&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody>
    <?php
    $query = $pdo->query("SELECT products.*, categories.C_Name AS categoryName FROM products INNER JOIN categories ON products.c_id = categories.id");
    $allProduct = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($allProduct as $singleProduct) {
    ?>
        <tr>
            <!-- <th scope="row">
                <input type="checkbox" aria-label="Checkbox">
            </th> -->
            <td class="tm-product-name" ><a href="Add-units.php?id=<?php echo $singleProduct['id']?>"><?php echo $singleProduct['ProductName'];?></a></td>
            <td class="text-center"><?php echo $singleProduct['UnitsSold']; ?></td>
            <td class="text-center"><?php echo $singleProduct['InStock']; ?></td>
            <td><?php echo $singleProduct['ExpireDate']; ?></td>
            <td class="tm-product-name"><?php echo $singleProduct['status'];?></td>
        </tr>
    <?php
    }
    ?>
</tbody>

                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row">
                            <div class="tm-table-actions-col-left">
                                <button class="btn btn-danger">Delete Selected Items</button>
                            </div>
                            <div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <span class="tm-dots d-block">...</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link" href="#">14</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title d-inline-block">Product Categories</h2>
                        <table class="table table-hover table-striped mt-3">
                            <tbody>
                                <?php
                            $query = $pdo->query("select * from Categories");
			  $allcategories = $query->fetchAll(PDO::FETCH_ASSOC);
			  foreach($allcategories as $singlecategory){
                      ?>
                                <tr>
                                    <td><?php echo $singlecategory['C_Name']?></td>
                                  
                                </tr>
                                <?php
              }
              ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <?php
          include('footer.php');
            ?>