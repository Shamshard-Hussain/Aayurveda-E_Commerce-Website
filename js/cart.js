
function updateQuantity(key, price, quantity) {
  // Calculate the new sub-total for this item
  var subTotal = quantity * price;

  // Update the sub-total element for this item
  document.getElementById("total-" + key).textContent = "Total- Rs. " + subTotal.toFixed(2) + "/=";

  // Get all the sub-total elements and calculate the total
  var subTotalElements = document.querySelectorAll(".price");
  var total = 0;
  for (var i = 0; i < subTotalElements.length; i++) {
    total += parseFloat(subTotalElements[i].textContent.replace("Total- Rs. ", "").replace("/=", ""));
  }

  // Calculate the count of items in the cart
  var itemCount = subTotalElements.length;

  // Update the total and count elements
  document.getElementById("cart-subtotal").textContent = "Rs. " + (total + 500).toFixed(2) + "/=";
  document.getElementById("cart-total").textContent = "Rs. " + (total).toFixed(2) + "/=";
  document.getElementById("cart-count").textContent = itemCount + " item" + (itemCount == 1 ? "" : "s") + " in the cart";
}

// Call the updateQuantity function for each product when the page loads
var products = <?php echo json_encode($_SESSION['cart']); ?>;
for (var key in products) {
  var product = products[key];
  updateQuantity(key, product.product_price, product.product_quantity);
}