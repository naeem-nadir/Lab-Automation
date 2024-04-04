<?php
    include('query.php');
    include('header.php');
     ?>
     <?php
if(isset($_GET['id'])){
    $id =$_GET['id'];
    $query =$pdo->prepare('select *, id from Categories where id= :id');
    $query->bindparam('id',$id);
    $query->execute();
    $cat = $query->fetch(PDO::FETCH_ASSOC);
}
?>
        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Edit Categories</h2>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-Categories-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form action="" method= "post" class="tm-edit-Categories-form">
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Categories
                                        Name
                                    </label>
                                    <input type="hidden" name="cid" value="<?php echo $cat['id']?>">
                                    <input value="<?php echo $cat['C_Name'] ?>" id="name" name="cname" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" >
                                </div>
                                <div class="input-group mb-3">
                                    <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Description</label>
                                    <input value="<?php echo $cat['C_Description'] ?>" id="name" name="cDes" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <button type="submit" name= "Updat-C"  class="btn btn-primary">Updat
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