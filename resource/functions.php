<?php

// Helper Functions

function redirect($location){
    header("Location: $location");
}

function query($sql){

    global $connection;

    return mysqli_query($connection, $sql);
}

function confirm($result){
    global $connection;

    if (!$result){
        die("Query failed" . mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){

    return mysqli_fetch_array($result);
}

//get product function

function get_products(){
  $query = query("SELECT * FROM products");
  confirm($query);

  while ($row = fetch_array($query)){

        $product = <<<DELIMETER
 <div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <img src="http://placehold.it/320x150" alt="">
        <div class="caption">
            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
            <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
            <a class="btn btn-primary" target="_blank" href="item.php?id={$row['product_id']}">Add to Cart</a>
        </div>
    </div>
</div>

DELIMETER;
echo $product;



  }
}

function get_categories(){

    $query = query("SELECT * FROM categories");
    confirm($query);

    while ($row = fetch_array($query)){
        $category_links = <<<DELIMETER
    <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>

DELIMETER;

        echo $category_links;

    }
}

function get_products_by_category(){
    $query = query("SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    while ($row = fetch_array($query)){

        $product_by_cat = <<<DELIMETER
        
<div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <img src="http://placehold.it/800x500" alt="">
        <a href="item.php?id={$row['product_id']}" class="caption">
          <h3>{$row['product_title']}</h3>
            <p>{$row['short_desc']}</p>
            <p>
                <a href="#" class="btn btn-primary">Add to Cart
                </a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
            </p>
        </div>
    </div>
</div>

DELIMETER;
        echo $product_by_cat;



    }
}

function get_products_in_shop(){
    $query = query("SELECT * FROM products");
    confirm($query);

    while ($row = fetch_array($query)){

        $product_by_cat = <<<DELIMETER
        
<div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <img src="http://placehold.it/800x500" alt="">
        <a href="item.php?id={$row['product_id']}" class="caption">
          <h3>{$row['product_title']}</h3>
            <p>{$row['short_desc']}</p>
            <p>
                <a href="#" class="btn btn-primary">Add to Cart
                </a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
            </p>
        </div>
    </div>
</div>

DELIMETER;
        echo $product_by_cat;


    }
}


?>
