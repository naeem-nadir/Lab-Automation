<?php
 include('dbcon.php');
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// LOGIN QUERY
if (isset($_POST['login'])) {
    $Email = $_POST['Email'];
    $password = $_POST['password'];

    $query = $pdo->prepare("SELECT * FROM users WHERE U_Email = :Email AND U_Password = :password");
    $query->bindParam(':Email', $Email);
    $query->bindParam(':password', $password);
    $query->execute();

    $res = $query->fetch(PDO::FETCH_ASSOC);

    if ($res) {
        if ($res['role'] == 1) {
            $_SESSION['U_Email'] = $res['U_Email'];
            header('location: index.php'); 
            exit();
        } else if ($res['role'] == 2) {
            $_SESSION['U_Email'] = $res['U_Email'];
            header('location: tester.php'); 
            exit();
        } else {
            echo "<script>alert('Role not recognized');</script>"; 
        }
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
}

// Process search query



// ADD Categories

if(isset($_POST['Add_C'])){
    $C_Name = $_POST['cname'];
    $C_Description = $_POST['cDes'];
    $query = $pdo->prepare("INSERT INTO categories (C_Name, C_Description) VALUES(:cname, :cDes)");
    $query->bindParam(':cname', $C_Name);
    $query->bindParam(':cDes', $C_Description);
    $query->execute();
    echo "<script>
    alert('Your Category is added');
    location.assign('products.php');
    </script>";
}



// UPDATE Categories 
if(isset($_POST['Updat-C'])){
    $id = $_POST['cid'];
    $Name = $_POST['cname'];
    $Des = $_POST['cDes'];
        
    $query = $pdo->prepare("UPDATE Categories SET C_Name = :cname, C_Description = :cDes WHERE id = :cid");
    $query->bindParam(':cname', $Name);
    $query->bindParam(':cDes', $Des);
    $query->bindParam(':cid', $id);
    $query->execute();

    echo "<script>
    location.assign('products.php');
    </script>";
}


//  Delete Query Category
// try{
//     if(isset($_GET['id'])){
//         $id = $_GET['id'];
//         $query = $pdo->prepare("delete from Categories where id = :id");
//         $query->bindParam('id', $id);
//         $query->execute();
//         echo "<script>
//         location.assign('products.php');
//         </script>";
    
//     }
// }
// catch(PDOException $e){
//     echo "<script>
//     alert('can't be delete);
//     location.assign('products.php');
//     </script>";
// }

// ADD PRODUCTS
try {
    if (isset($_POST['addproducts'])) {
        $ProductName = $_POST['pname'];
        $UnitsSold = $_POST['Usold'];
        $InStock = $_POST['InStock'];
        $ExpireDate = $_POST['Edate'];
        $cid = $_POST['c_id'];
        $Status = $_POST['status'];  
        $query = $pdo->prepare("INSERT INTO products (ProductName, UnitsSold, InStock, ExpireDate, c_id, status) 
                                VALUES (:Pname, :Usold, :InStock, :Edate, :c_id, :status)");
        $query->bindParam(':Pname', $ProductName);
        $query->bindParam(':Usold', $UnitsSold);
        $query->bindParam(':InStock', $InStock);
        $query->bindParam(':Edate', $ExpireDate);
        $query->bindParam(':status', $Status);
        $query->bindParam(':c_id', $cid);
        $query->execute();
        $product_id = $pdo->lastInsertId();
        $approve_query = $pdo->prepare("UPDATE products SET status = 'pending' WHERE id = :id");
        $approve_query->bindParam(':id', $product_id);
        $approve_success = $approve_query->execute();

        if ($product_id && $approve_success) {
            echo "Product added and approved successfully. Product ID: $product_id";
        } elseif ($product_id && !$approve_success) {
            echo "Product added successfully. Approval failed for Product ID: $product_id.";
        } else {
            echo "Product addition failed.";
        }
    }
} catch (PDOException $e) {
    echo "<script>
    alert('Product added.');
    location.assign('products.php');
    </script>";
}




// UPDATE PRODUCTS
if (isset($_POST['update'])) {
    $ProductName = $_POST['pname'];
    $UnitsSold = $_POST['Usold'];
    $InStock = $_POST['InStock'];
    $ExpireDate = $_POST['Edate'];
    $Id = $_POST['pid'];

    $query = $pdo->prepare("UPDATE products SET ProductName = :pname, UnitsSold = :Usold, InStock = :InStock, ExpireDate = :Edate WHERE id = :pId");
    $query->bindParam(':pname', $ProductName);
    $query->bindParam(':Usold', $UnitsSold);
    $query->bindParam(':InStock', $InStock);
    $query->bindParam(':Edate', $ExpireDate);
    $query->bindParam(':pId', $Id);

    $query->execute();

    echo "<script>
        alert('Your Product is updated');
        location.assign('products.php');
        </script>";
}
//  Delete Query PRODUCTS

// if(isset($_GET['id'])){
//     $id = $_GET['id'];
//     $query = $pdo->prepare("delete from products where id = :id");
//     $query->bindParam(':id', $id);
//     $query->execute();
//     echo "<script>
//     location.assign('products.php');
//     </script>";

// }


       // ADD UNIT TSET
   

       if(isset($_POST['Add_U'])){
        $ProductName = $_POST['pname'];
        $Repetition = $_POST['repetition'];
        $Control = $_POST['control'];
        $Comparison = $_POST['comparison'];
        $Value = $_POST['value'];
        $ExpectedValue = $_POST['Evalue'];
        $pid = $_POST['id'];
    
        // Check the selected control value
        $newStatus = ($_POST['control'] === 'fail') ? 'Rejected' : 'approved';
    
        // Update product status based on the control value
        $updateQuery = $pdo->prepare('UPDATE products SET Status = :status WHERE id = :id');
        $updateQuery->bindParam(':status', $newStatus);
        $updateQuery->bindParam(':id', $pid);
        $updateQuery->execute();
        $query = $pdo->prepare("INSERT INTO units (ProductName, Repetition, Control, Comparison, Value, ExpectedValue, p_id) VALUES (:ProductName, :repetition, :control, :comparison, :value, :Evalue, :pid)");
        $query->bindParam(':ProductName', $ProductName);
        $query->bindParam(':repetition', $Repetition);
        $query->bindParam(':control', $Control);
        $query->bindParam(':comparison', $Comparison);
        $query->bindParam(':value', $Value);
        $query->bindParam(':Evalue', $ExpectedValue);
        $query->bindParam(':pid', $pid);
        $query->execute();
        $redirectURL = 'smoke.php?id=' . urlencode($pid);                     
           echo "<script>
    alert('Your Product is Ready for another test');</script>";
    header("Location: Add-smoke.php?ProductName=$ProductName&Repetition=$Repetition&Control=$Control&Comparison=$Comparison&Value=$Value&ExpectedValue=$ExpectedValue&pid=$pid");
    exit;
       }        

// }
//  Delete Query UNIT TEST

// if(isset($_GET['id'])){
//     $id = $_GET['id'];
//     $query = $pdo->prepare("delete from units where id = :id");
//     $query->bindParam(':id', $id);
//     $query->execute();
//     echo "<script>
//     alert('Your test is deleted successfully');
//     location.assign('units.php');
//     </script>";

// }
    // ADD SMOKE TSET

    if(isset($_POST['Add_S'])){
        $TestName = $_POST['Tname'];
        $TestDescription = $_POST['Tdes'];
        $TestSteps = $_POST['Tsteps'];
        $ExpectedResult = $_POST['Eresult'];
        $pid= $_POST['pid'];
        $query= $pdo->prepare("insert into smoke_test(TestName, TestDescription, TestSteps, ExpectedResult, p_id)
        values(:Tname, :Tdes, :Tsteps, :Eresult, :pid)");
        $query->bindparam('Tname',$TestName);
        $query->bindparam('Tdes',$TestDescription);
        $query->bindparam('Tsteps',$TestSteps);
        $query->bindparam('Eresult',$ExpectedResult);
        $query->bindParam(':pid', $pid);
        $query->execute();
        echo "<script>
        alert('Your Product is Redy To Use');
             location.assign('products.php');
             </script>";
    }
    

?>