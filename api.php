<?php
$products = array(
  array("id" => 1, "name" => "Product 1", "price" => 10),
  array("id" => 2, "name" => "Product 2", "price" => 20),
  array("id" => 3, "name" => "Product 3", "price" => 30),
);

function getProductById($id)
{
  global $products;
  foreach ($products as $product)
  {
    if ($product['id'] == $id)
    {
      return $product;
    }
  }
  return null;
}

if (isset($_GET['id']))
{
  $productId = $_GET['id'];
  $product = getProductById($productId);

  if ($product)
  {
    header('Content-Type: application/json');
    echo json_encode($product);
  }
  else
  {
    http_response_code(404);
    echo json_encode(array("message" => "Product not found."));
  }
}
else
{
  header('Content-Type: application/json');
  echo json_encode($products);
}
?>