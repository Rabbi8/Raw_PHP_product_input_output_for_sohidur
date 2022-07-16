<?php
require('inc/connection.inc.php');
$from=strip_tags(mysqli_real_escape_string($conn,$_POST['from']));
$to=strip_tags(mysqli_real_escape_string($conn,$_POST['to']));
$bag=strip_tags(mysqli_real_escape_string($conn,$_POST['pro_name']));

// default input operation start
$sql="SELECT SUM(qty) as `qty`, `product_name` FROM `product` WHERE  product_name='$bag' && operation='input' && added_on BETWEEN '$from' AND '$to'";
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
$sql1="SELECT SUM(qty) as `qty`, `product_name` FROM `product` WHERE  product_name='$bag' && operation='output' && added_on BETWEEN '$from' AND '$to'";
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
$sql2="SELECT SUM(qty) as `qty`, `product_name` FROM `product` WHERE  product_name='$bag' && operation='return' && added_on BETWEEN '$from' AND '$to'";
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
?>