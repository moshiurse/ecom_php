<?php
require_once("../resource/config.php");
?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Shop</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
            <?php
            get_products_in_shop();
            ?>

        </div>
        <!-- /.row -->

        <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

    </div>
    <!-- /.container -->


</body>

</html>
