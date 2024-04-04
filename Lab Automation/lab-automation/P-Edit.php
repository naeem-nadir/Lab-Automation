<?php
     include('query.php');
    include('header.php');
     ?>
     <?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query =$pdo->prepare('select * , id from products where id = :id');
    $query->bindParam('id',$id);
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);
    print_r($product);
}
?>

        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Edit Product</h2>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form action="" class="tm-edit-product-form" method= "post">
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Product
                                        Name
                                    </label>
                                    <input value="<?php echo $product['id'] ?>" type="hidden" name="pid">
                                    <input  value="<?php echo $product['ProductName'] ?>" id="name" name="pname" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"  >
                                </div>
                                <div class="input-group mb-3">
                                    <label for="stock" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"> 
                                    Units Sold
                                    </label>
                                    <input  value="<?php echo $product['UnitsSold'] ?>"  id="stock" name="Usold" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7" >
                                </div>  
                                <div class="input-group mb-3">
                                    <label for="stock" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label" > In
                                        Stock
                                    </label>
                                    <input  value="<?php echo $product['InStock'] ?>"  id="stock" name="InStock" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7" >
                                </div>  
                                
                                <div class="input-group mb-3">
                                    <label for="expire_date" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Expire
                                        Date
                                    </label>
                                    <input  value="<?php echo $product['ExpireDate'] ?>"  id="expire_date" name="Edate" type="date" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                        data-large-mode="true" >
                                </div>
                              
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">

                                        <button type="submit" name= "update" class="btn btn-primary">Update Products
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-dummy mx-auto">
                                <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"></i>
                            </div>
                            <div class="custom-file mt-3 mb-3">
                                <input id="fileInput" type="file" style="display:none;" />
                                <input type="button" class="btn btn-primary d-block mx-auto" value="Upload ..." onclick="document.getElementById('fileInput').click();"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php
      include('footer.php');
       ?>