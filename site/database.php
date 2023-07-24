<?php 

  $username = getenv("USERNAME");
  $password = getenv("PASSWORD");

  $dbh = new PDO("pgsql:host=localhost;port=5432;dbname=complaints", $username, $password, array( PDO::ATTR_PERSISTENT=> true));
  

  /* Due to a database error, SELECT COUNT (*) was unable to return an accurate number of rows, and only returned 39773 constantly, both in
   * pgAdmin4 and in the code. Instead, since there were 60000 records imported, I have used a constant to represent the total number of 
   * complaints. The SQL code I attempted to use was just SELECT COUNT (*) FROM complaints;
   */

   define("TOTAL_COMPLAINTS", 60000); 

   // Here, we're just getting the names of the products and sub-products, and the total count of each.

   // First, we fetch all the unique product names
   $product_query = $dbh->query("SELECT DISTINCT product FROM complaints");
   $product_names = $product_query->fetchAll();
   
   // Creating an array to hold the product totals in
   $product_totals = array();

   // For each unique product, count the number of times it appears in the database.
   foreach($product_names as $product) {
    $query_string = $product[0];
    $number_of_products_query = $dbh->query("SELECT COUNT('product') FROM complaints WHERE product='$query_string'");
    $number_of_products_total = $number_of_products_query->fetch();
    $temp_product_array = array($product[0] => $number_of_products_total[0]); 
    array_push($product_totals, $temp_product_array);
   }

   // Next, we're doing the same thing with sub-products
   
   $sub_product_query = $dbh->query("SELECT DISTINCT sub_product FROM complaints");
   $sub_product_names = $sub_product_query->fetchAll();

   $sub_product_totals = array();

   foreach($sub_product_names as $sub_product) {
    $query_string = str_replace("'","''", $sub_product[0]);
    $number_of_sub_products_query = $dbh->query("SELECT COUNT('sub_product') FROM complaints WHERE sub_product='$query_string'");
    $number_of_sub_products_total = $number_of_sub_products_query->fetch();
    $temp_sub_product_array = array($sub_product[0] => $number_of_sub_products_total[0]);
    array_push($sub_product_totals, $temp_sub_product_array);
   }

?>