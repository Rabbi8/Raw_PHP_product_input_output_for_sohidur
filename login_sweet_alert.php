<script src="assets/js/sweet_alert.js"></script>
<?php
if(isset($_SESSION['login'])){ ?>
    <script>
         swal({
                    title: "<?php echo $_SESSION['login'] ?>",
                    text: "Don't match",
                    icon: "error",//info,warning,error
                    button:"try again",
                    timer:3000,
                    });
    </script>

<?php }

if(isset($_SESSION['first_login'])){ ?>
    <script>
         swal({
                    title: "<?php echo $_SESSION['first_login'] ?>",
                    text: "Please login",
                    icon: "error",//info,warning,error
                    button:"try again",
                    timer:3000,
                    });
    </script>

<?php }



?>