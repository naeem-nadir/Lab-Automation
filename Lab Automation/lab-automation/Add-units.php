<?php
    include('query.php');
    include('header2.php');
     ?>
         <?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query =$pdo->prepare('select ProductName , id from products where id = :id');
    $query->bindParam('id',$id);
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);
    print_r($product);

?>
        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block"> Unit Tast</h2>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-Categories-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                        <form action="Add-smoke.php" method="post" class="tm-edit-Categories-form">

                            <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                   Product Name
                                    </label>
                                    <input type="hidden" name="pid" value="<?php echo $product['id']?>">
                                    <input type="hidden" name="pname" value="<?php echo $product['ProductName']?>">
                                <input value="<?php echo $product['ProductName'] ?>"  id="" name="" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" >
                                </div>
                                <div class="input-group mb-3">
                                    <label for=" Repetition" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                    Repetition
                                    </label>
                                    <input id="" name="repetition" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="Control" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                    Control
                                    </label>
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="" name="control">
                                        <option selected>Pass</option>
                                        <option selected>Fail</option> 
                                        <option selected>check Control</option>
                                        </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="Comparison" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                    Comparison
                                    </label>
                                    <input id="" name="comparison" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                    Value
                                    </label>
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="" name="value">
                                        <option selected>1</option>
                                        <option selected>0</option> 
                                        <option selected>check Value </option>
                                        </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                    Expected Value
                                    </label>
                                    <input id="" name="Evalue" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                  <div class="input-group mb-3">
                                    <input type="hidden" name="id" value="<?php echo $product['id']?>">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                    <button type="submit" name="Add_U" class="btn btn-primary">Add</button>

                                    </div>
                                </div>
              
                            </form>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                            <div class="tm-Categories-img-dummy mx-auto">
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
       }
      include('footer.php');
       ?>