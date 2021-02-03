<?php 
    require_once 'conn.php';

    if(isset($_REQUEST['addC']))
    {
        if(isset($_REQUEST['categoryname']) && $_REQUEST['categoryname']!="")
        {
            $sql="insert into tblcategory(categoryname) values('".$_REQUEST['categoryname']."')";
            if( $con->query($sql) === TRUE){
                echo "<script>alert('Category Added Successfully')</script>";
            }else{
                echo "Error";
            }
        }else{
            echo "<div align='center' style='color:red'>Enter Category Name</div>";
        }

    }

    if(isset($_REQUEST['delC']))
    {
        $id=base64_decode($_REQUEST['delC']);
        if($id>0)
        {
            $sql="delete from tblcategory where categoryid=".$id;
            if( $con->query($sql) === TRUE){
                echo "<script>alert('Category Deleted Successfully'); window.location='/oswd/test/category.php';</script>";
            }else{
                echo "Error";
            }
        }
    }

    if(isset($_REQUEST['edtC']))
    {
        $id=base64_decode($_REQUEST['edtC']);
        if($id>0)
        {
            $sql="select * from tblcategory where categoryid=".$id;
            $dt=$con->query($sql);
            $dt=$dt->fetch_assoc();
        }
    }

    if(isset($_REQUEST['EditC']))
    {
        $id=base64_decode($_REQUEST['edtC']);
        if($id>0)
        {
            $sql="update tblcategory set categoryname='".$_REQUEST['categoryname']."' where categoryid=".$id;
            if( $con->query($sql) === TRUE){
                echo "<script>alert('Category Update Successfully'); window.location='/oswd/test/category.php';</script>";
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
    <title>Category</title>
</head>
<body>
    <h1></h1>
    <div align="center">
        <form action="" method="post">
            <table border="1" align="center">
                <tr>
                    <th colspan="2">Category Form</th>
                </tr>
                <tr>
                    <th>Enter Category</th>
                    <td><input type="text" name="categoryname" <?php if(isset($_REQUEST['edtC'])) { echo "value='".$dt['categoryname']."'"; } ?> ></td>
                </tr>
                <tr>
                    <th colspan="2" align="center"><input type="submit" name=<?php if(!isset($_REQUEST['edtC'])) { echo "'addC' value='Add'"; }else{ echo "'EditC' value='Update'"; } ?> ></th>
                </tr>
            </table>
        </form>
    </div>
    <br/><br/>
    <div align="center">
        <table border="2" width="30%" align="center">
            <tr>
                <th>ID</th>
                <th>CategoryName</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $data=$con->query("select * from tblcategory");
            $data=$data->fetch_all(MYSQLI_ASSOC);
            //echo json_encode($data);
            for($i=0;$i<count( $data);$i++) { ?>
            <tr>
                <td><?= base64_encode( $data[$i]['categoryid']); ?></td>
                <td><?= $data[$i]['categoryname']; ?></td>
                <td><a href="?edtC=<?= base64_encode( $data[$i]['categoryid']); ?>">Edit</a></td>
                <td><a href="?delC=<?= base64_encode( $data[$i]['categoryid']); ?>">Delelte</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>