<?php
    include('query.php');
    include('header2.php');
     ?>
<?php
// if(isset($_GET['id'])){
//     $id = $_GET['id'];
//     $query =$pdo->prepare('select ProductName , id from products where id = :id');
//     $query->bindParam('id',$id);
//     $query->execute();
//     $product = $query->fetch(PDO::FETCH_ASSOC);
//     print_r($product);
// }


// Retrieve URL parameters
$ProductName = $_GET['ProductName'];
$Repetition = $_GET['Repetition'];
$Control = $_GET['Control'];
$Comparison = $_GET['Comparison'];
$Value = $_GET['Value'];
$ExpectedValue = $_GET['ExpectedValue'];
$pid = $_GET['pid'];


?>



        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Smoke Tast <?php echo $ProductName  ?></h2>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-Categories-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form action="" method= "post" class="tm-edit-Categories-form">
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                   Test Name 
                                    </label>
                                  
                                    <input value="<?php echo $ProductName?>" id="" name="Tname" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" readonly>
                                <input type="hidden" name="pid" value="<?php $pid?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label for=" Repetition" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                    Test Description
                                    </label>
                                    <input id="" name="Tdes" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="Control" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                    Test Steps
                                    </label>
                                    <input id="" name="Tsteps" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="Comparison" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                    Expected Result
                                    </label>
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="" name="Eresult">
                                        <option selected>Ready</option>
                                        <option selected>Not Ready</option> 
                                        <option selected>check Result</option>
                                        </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                    <button type="submit" name= "Add_S"  class="btn btn-primary">Add
                                        </button>
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
      include('footer.php');
       ?>

    