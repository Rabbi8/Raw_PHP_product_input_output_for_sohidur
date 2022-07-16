<?php
require('inc\header.inc.php');

if(isset($_GET['bag'])){

    $bag=$_GET['bag'];

    if($bag=='ladies_bag'){
        $bag= 'Ladies Bag';
    }else if($bag=='travel_bag'){
        $bag= 'Travel Bag';
    }else if($bag=='ladies_bag_pack'){
        $bag= 'Ladies bag pack';
    }else if($bag=='party_purse'){
        $bag= 'Party purse';
    }else if($bag=='baby_bag'){
        $bag= 'Baby Bag';
    }else if($bag=='minmie_bag'){
        $bag= 'Minmie Bag';
    }else{
        die('undefine variable');
    }




    
$time_set=date_default_timezone_set("Asia/Dhaka");
$date=date("y/m/d");


    // default input operation start
    $sql="SELECT SUM(qty) as `qty`, `product_name` FROM `product` WHERE added_on='$date' && product_name='$bag' && operation='input'";
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
    $sql1="SELECT SUM(qty) as `qty`, `product_name` FROM `product` WHERE added_on='$date' && product_name='$bag' && operation='output'";
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
    $sql2="SELECT SUM(qty) as `qty`, `product_name` FROM `product` WHERE added_on='$date' && product_name='$bag' && operation='return'";
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
}else{
    die('date not found');
}







?>



    <main>
        <div class="container_fluid">
                <div class="product">

                    <div class="product_name_container"><?php echo $bag; ?></div>

                    <div class="date_from_to">
                        <div class="date_from">
                            <label for="">From:</label>
                            <input type="date" class="from_date_time_local" id="from_date_time_local" value=''>
                        </div>
                        <div class="date_from">
                            <label for="">To:</label>
                            <input type="date" class="from_date_time_local" id="to_date_time_local" value=''>
                        </div>

                        <p class="date_from_to_submit">Submit</p>
                    </div>

                    <div class="stock_manage">
                        <div class="stock_manage_input" id="stock_manage_input">
                            <p class="stock_manage_input_keyword"><span class="input_return_number"> <?php echo $qty; ?></span>&nbsp;&nbsp;Quantity Input </p>
                        </div>
                        <div class="stock_manage_input" id="stock_manage_output">
                            <p class="stock_manage_input_keyword"><span class="number"><?php echo $qty1; ?></span>&nbsp;&nbsp;Quantity Output </p>
                        </div>
                        <div class="stock_manage_input" id="stock_manage_return">
                            <p class="stock_manage_input_keyword"><span class="number"><?php echo $qty2; ?></span>&nbsp;&nbsp;Quantity Return</p>
                        </div>
                        <div class="stock_manage_input" id="stock_manage_stock">
                            <p class="stock_manage_input_keyword"><span class="number"><?php echo $stock; ?></span>&nbsp;&nbsp;Quantity Stock </p>
                        </div>
                    </div>


                    <div class="product_input_container">
                        <p class="product_input_keyword">Product Input</p>
                        <input type="number" min="0" name="product_input" id='input_id' placeholder="product quantity" value="">
                        <p class="product_input_submit">Submit</p>
                    </div>


                    <div class="product_input_container ">
                        <p class="product_output_submit">Product Output</p>
                        <input type="number" min="0" name="product_input" id='output_id' placeholder="product quantity" value="">
                        <p class="product_output_submit product_output">Submit</p>
                    </div>

                    <div class="product_input_container ">
                        <p class="product_return_submit">Product Return</p>
                        <input type="number" min="0" name="product_input" id='return_id' placeholder="product quantity" value="">
                        <p class="product_return_submit product_return">Submit</p>
                    </div>


                </div>
        </div>
    </main>




<script src="assets/js/jquery.js"></script>
<script src="assets/js/sweet_alert.js"></script>
<script>
    $(document).ready(function(){
        const product_name123=$('.product_name_container').text();
        // date filtering start
        $(document).on('click','.date_from_to_submit',function(){
            const from_date= $('#from_date_time_local').val();
            const to_date= $('#to_date_time_local').val();
            if(from_date=='' || to_date==''){
                swal({
                    title: "Date unset",
                    text: "Please setup your date",
                    icon: "warning",//info,warning,error
                    button: "Try again",
                    timer:3000,
                    });
                
            }else{
                $.ajax({
                    url:"store.php",
                    type:"POST",
                    data:{from:from_date, to:to_date, pro_name:product_name123},
                    success:function(parameter){
                    $('.stock_manage').empty();
                    $('.stock_manage').html(parameter);
                    }
                });
            }
      })
        // date filtering end




        // data input start

            $(document).on('click','.product_input_submit',function(){
                var input_qty= $('#input_id').val();
                if(input_qty==''){
                    swal({
                    title: "Input is Blank",
                    text: "Please fill up",
                    icon: "warning",//info,warning,error
                    button: "Try again",
                    timer:3000,
                    });
                }else{
                    $.ajax({
                    url:"insert.php",
                    type:"POST",
                    data:{input_qty123:input_qty,pro_name:product_name123,operation:'input'},
                    success:function(parameter){
                    $('#input_id').val('');
                    swal({
                    title: "input success",
                    text: "happy journey",
                    icon: "success",//info,warning,error
                    timer:2000,
                    });
                    $('.stock_manage').empty();
                    $('.stock_manage').html(parameter);

                    }
                });
                }

            });

        // data input end


        
        // data output start

            $(document).on('click','.product_output',function(){
                var input_qty= $('#output_id').val();
                if(input_qty==''){
                    swal({
                    title: "Output is Blank",
                    text: "Please fill up",
                    icon: "warning",//info,warning,error
                    button: "Try again",
                    timer:3000,
                    });
                }else{
                    $.ajax({
                    url:"insert.php",
                    type:"POST",
                    data:{input_qty123:input_qty,pro_name:product_name123,operation:'output'},
                    success:function(parameter){
                    $('#output_id').val('');
                    swal({
                    title: "Output success",
                    text: "happy journey",
                    icon: "success",//info,warning,error
                    timer:2000,
                    });
                    $('.stock_manage').empty();
                    $('.stock_manage').html(parameter);

                    }
                });
                }

            });

        // data output end


        // data return start

            $(document).on('click','.product_return',function(){
                var input_qty= $('#return_id').val();
                if(input_qty==''){
                    swal({
                    title: "Return is Blank",
                    text: "Please fill up",
                    icon: "warning",//info,warning,error
                    button: "Try again",
                    timer:3000,
                    });
                }else{
                    $.ajax({
                    url:"insert.php",
                    type:"POST",
                    data:{input_qty123:input_qty,pro_name:product_name123,operation:'return'},
                    success:function(parameter){
                    $('#return_id').val('');
                    swal({
                    title: "Return success",
                    text: "happy journey",
                    icon: "success",//info,warning,error
                    timer:2000,
                    });
                    $('.stock_manage').empty();
                    $('.stock_manage').html(parameter);

                    }
                });
                }

            });

        // data return end

  });
</script>
    

<?php
require('inc\footer.inc.php');

?>