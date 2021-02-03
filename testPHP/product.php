<?php 
    require_once 'conn.php';

    if(isset($_REQUEST['addP']))
    {
        if(isset($_REQUEST['pname']) && $_REQUEST['pname']!="" && $_REQUEST['price']!="" && $_REQUEST['description']!="" && $_REQUEST['category']!="")
        {
            $sql="insert into tblproduct(pname,price,description,categoryid) values('".$_REQUEST['pname']."',".$_REQUEST['price'].",'".$_REQUEST['description']."',".$_REQUEST['category'].")";
            if( $con->query($sql) === TRUE){
                echo "<script>alert('Product Added Successfully')</script>";
            }else{
                echo "Error";
            }
        }else{
            echo "<div align='center' style='color:red'>Please Fill all data</div>";
        }

    }

    if(isset($_REQUEST['delP']))
    {
        $id=base64_decode($_REQUEST['delP']);
        if($id>0)
        {
            $sql="delete from tblproduct where productid=".$id;
            if( $con->query($sql) === TRUE){
                echo "<script>alert('Product Deleted Successfully'); window.location='/oswd/test/product.php';</script>";
            }else{
                echo "Error";
            }
        }
    }

    if(isset($_REQUEST['edtP']))
    {
        $id=base64_decode($_REQUEST['edtP']);
        if($id>0)
        {
            $sql="select * from tblproduct where productid=".$id;
            $dt=$con->query($sql);
            $dt=$dt->fetch_assoc();
        }
    }

    if(isset($_REQUEST['EditP']))
    {
        $id=base64_decode($_REQUEST['edtP']);
        if($id>0)
        {
            $sql="update tblproduct set pname='".$_REQUEST['pname']."',price=".$_REQUEST['price'].",description='".$_REQUEST['description']."',categoryid=".$_REQUEST['category']." where productid=".$id;
            if( $con->query($sql) === TRUE){
                echo "<script>alert('Product Update Successfully'); window.location='/oswd/test/product.php';</script>";
            }else{
                echo "Error";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <h1></h1>
    <div align="center">
        <form action="" method="post">
            <table border="1" align="center">
                <tr>
                    <th colspan="2">Product Form</th>
                </tr>
                <tr>
                    <th>Enter Product Name</th>
                    <td><input type="text" name="pname" required="" <?php if(isset($_REQUEST['edtP'])) { echo "value='".$dt['pname']."'"; } ?> ></td>
                </tr>
                <tr>
                    <th>Enter Price</th>
                    <td><input type="number" name="price" required="" <?php if(isset($_REQUEST['edtP'])) { echo "value='".$dt['price']."'"; } ?> ></td>
                </tr>
                <tr>
                    <th>Enter Description</th>
                    <td><input type="text" name="description" <?php if(isset($_REQUEST['edtP'])) { echo "value='".$dt['description']."'"; } ?> ></td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>
                        <select name="category" required="">
                            <option value="">Select Category</option>
                            <?php
                                $c=$con->query("select * from tblcategory ");
                                $c=$c->fetch_all(MYSQLI_ASSOC);
                            for($i=0;$i<count( $c);$i++) { ?>
                                <option value="<?= $c[$i]['categoryid']; ?>" <?php if(isset($_REQUEST['edtP'])){ if($c[$i]['categoryid'] == $dt['categoryid']){ echo "selected"; } } ?> ><?= $c[$i]['categoryname']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="2" align="center"><input type="submit" name=<?php if(!isset($_REQUEST['edtP'])) { echo "'addP' value='Add'"; }else{ echo "'EditP' value='Update'"; } ?> ></th>
                </tr>
            </table>
        </form>
    </div>
    <br/><br/>
    <div align="center">
        <table border="2" width="50%" align="center">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $data=$con->query("select p.*,c.categoryname from tblproduct as p join tblcategory as c on c.categoryid=p.categoryid");
            $data=$data->fetch_all(MYSQLI_ASSOC);
            //echo json_encode($data);
            for($i=0;$i<count( $data);$i++) { ?>
            <tr>
                <td><?= base64_encode( $data[$i]['productid']); ?></td>
                <td><?= $data[$i]['pname']; ?></td>
                <td><?= $data[$i]['price']; ?></td>
                <td><?= $data[$i]['description']; ?></td>
                <td><?= $data[$i]['categoryname']; ?></td>
                <td><a href="?edtP=<?= base64_encode( $data[$i]['productid']); ?>">Edit</a></td>
                <td><a href="?delP=<?= base64_encode( $data[$i]['productid']); ?>">Delelte</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>