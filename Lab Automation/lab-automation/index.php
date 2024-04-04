       <?php
       include('query.php');
      include('header.php');
       ?>
      <?php
  if(!isset($_SESSION['U_Email'])){
     echo "<script>
     location.assign('login.php');
     </script>";
  }
    ?>
       

            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title"></h2>
                        <canvas id="lineChart"></canvas>
                    </div>
                  
                    <?php
                  $query = "SELECT SUM(ProductName) AS total_ProductName FROM products";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    ?>
                </div>
                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title"></h2>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
                <div class="tm-col tm-col-small">
                    <div class="bg-white tm-block h-100">
                        <canvas id="pieChart" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
                <?php
                   $query = "SELECT ProductName FROM products WHERE status = 'Pending'";
                   $stmt = $pdo->prepare($query);
                   $stmt->execute();
                   $pendingProducts = $stmt->fetchAll(PDO::FETCH_COLUMN);
                   
                   ?>
                <div class="tm-col tm-col-small">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">Pending Product List</h2>
                        <ol class="tm-list-group">
                        <?php
            // Iterate over the pending products and generate list items
            foreach ($pendingProducts as $product) {
                echo '<li class="tm-list-group-item">' . htmlspecialchars($product) . '</li>';
            }
            ?>
                        </ol>
                    </div>
                </div>
         
                <?php
                   $query = "SELECT ProductName FROM products WHERE status = 'approved'";
                   $stmt = $pdo->prepare($query);
                   $stmt->execute();
                   $pendingProducts = $stmt->fetchAll(PDO::FETCH_COLUMN);
                   
                   ?>
                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-8">
                                <h2 class="tm-block-title d-inline-block">Approved Product List</h2>

                            </div>
                            <div class="col-4 text-right">
                                <a href="products.php" class="tm-link-black">View All</a>
                            </div>
                        </div>
                        <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                        <?php
            // Iterate over the pending products and generate list items
            foreach ($pendingProducts as $product) {
                echo '<li class="tm-list-group-item">' . htmlspecialchars($product) . '</li>';
            }
            ?>
                           
                        </ol>
                    </div>
                </div>
              
                <?php
                   $query = "SELECT ProductName FROM products WHERE status = 'Rejected'";
                   $stmt = $pdo->prepare($query);
                   $stmt->execute();
                   $pendingProducts = $stmt->fetchAll(PDO::FETCH_COLUMN);
                   
                   ?>
                <div class="tm-col tm-col-small">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">Rejected Product List</h2>
                        <ol class="tm-list-group">
                        <?php
            // Iterate over the pending products and generate list items
            foreach ($pendingProducts as $product) {
                echo '<li class="tm-list-group-item">' . htmlspecialchars($product) . '</li>';
            }
            ?>
                        </ol>
                    </div>
                </div>
            </div>
           <?php
           include('footer.php');
           ?>