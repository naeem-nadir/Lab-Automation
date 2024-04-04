<?php
include('query.php');
include('header.php');
?>
<div class="container">
<div class="row tm-content-row tm-mt-big">
                <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                <div class="container">
                    <div class="bg-white tm-block h-100">
                        
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Unit Test</h2>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Repetition</th>
                                        <th scope="col" class="text-center">Control</th>
                                        <th scope="col" class="text-center">Comparison</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Expected Value</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                            $query = $pdo->query("SELECT units.*, products.ProductName AS ProductName FROM units INNER JOIN products ON units.p_id =  products.id");
                            $allTest = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($allTest as $singleTest) {
                            ?>
                                    <tr>
                                        <th scope="row">
                                            <input type="checkbox" aria-label="Checkbox">
                                        </th>
                                        <td class="text-center"><?php echo $singleTest['ProductName']?></td>
                                        <td class="text-center"><?php echo $singleTest['Repetition']?></td>
                                        <td class="text-center"><?php echo $singleTest['Control']?></td>
                                        <td class="tm-product-name"><?php echo $singleTest['Comparison']?></td>
                                        <td class="text-center"><?php echo $singleTest['Value']?></td>
                                        <td class="text-center"><?php echo $singleTest['ExpectedValue']?></td>
                                        
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

                </div>   
            </div>







<?php
include('footer.php');
?>