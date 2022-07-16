<?php
require('inc/connection.inc.php');
if(isset($_POST['operation'])){
    
        $product_name=strip_tags(mysqli_real_escape_string($conn,$_POST['pro_name']));
        $input_qty=strip_tags(mysqli_real_escape_string($conn,$_POST['input_qty123']));
        $time_zone=date_default_timezone_set("Asia/Dhaka");
        $date=date("y/m/d");
        $datetime=date("y/m/d h:i:s");

    if($_POST['operation']=='input'){
        $operation=strip_tags(mysqli_real_escape_string($conn,$_POST['operation']));
        $sql9="INSERT INTO `product` (`product_name`, `qty`, `operation`, `added_on`, `date_time`) VALUES('$product_name','$input_qty','$operation','$date','$datetime')";
        $res9=mysqli_query($conn,$sql9);
    }else if($_POST['operation']=='output'){
        $operation=strip_tags(mysqli_real_escape_string($conn,$_POST['operation']));
        $sql9="INSERT INTO `product` (`product_name`, `qty`, `operation`, `added_on`, `date_time`) VALUES('$product_name','$input_qty','$operation','$date','$datetime')";
        $res9=mysqli_query($conn,$sql9);

    }else if($_POST['operation']=='return'){
        $operation=strip_tags(mysqli_real_escape_string($conn,$_POST['operation']));
        $sql9="INSERT INTO `product` (`product_name`, `qty`, `operation`, `added_on`, `date_time`) VALUES('$product_name','$input_qty','$operation','$date','$datetime')";
        $res9=mysqli_query($conn,$sql9);
    }

    

        // default input operation start
        $sql="SELECT SUM(qty) as `qty`, `product_name` FROM `product` WHERE  product_name='$product_name' && operation='input' && added_on='$date'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        $qty=$row['qty'];
        if($qty>0){
            $qty=$row['qty'];
        }else{
            $qty=0;
        }
        // default input operation end


        // default output operation start
        $sql1="SELECT SUM(qty) as `qty`, `product_name` FROM `product` WHERE  product_name='$product_name' && operation='output' &&added_on='$date'";
        $res1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_assoc($res1);
        $qty1=$row1['qty'];
        if($qty1>0){
        $qty1=$row1['qty'];
        }else{
        $qty1=0;
        }
        // default output operation end


        // default return operation start
        $sql2="SELECT SUM(qty) as `qty`, `product_name` FROM `product` WHERE  product_name='$product_name' && operation='return' && added_on='$date'";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        $qty2=$row2['qty'];
        if($qty2>0){
        $qty2=$row2['qty'];
        }else{
        $qty2=0;
        }
        // default return operation end

        $stock=($qty+$qty2)-$qty1;


        $html='

        <div class="stock_manage_input" id="stock_manage_input">
        <p class="stock_manage_input_keyword"><span class="number">'.$qty.'</span>&nbsp;&nbsp;Quantity Input </p>
        </div>
        <div class="stock_manage_input" id="stock_manage_output">
        <p class="stock_manage_input_keyword"><span class="number">'.$qty1.'</span>&nbsp;&nbsp;Quantity Output </p>
        </div>
        <div class="stock_manage_input" id="stock_manage_return">
        <p class="stock_manage_input_keyword"><span class="number">'.$qty2.'</span>&nbsp;&nbsp;Quantity Return</p>
        </div>
        <div class="stock_manage_input" id="stock_manage_stock">
        <p class="stock_manage_input_keyword"><span class="number">'.$stock.'</span>&nbsp;&nbsp;Quantity Stock </p>
        </div>

        ';


        echo $html;


        }else{
            echo "data not found";
        }









?>