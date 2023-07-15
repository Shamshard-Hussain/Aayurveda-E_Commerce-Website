<?php
   include '../connect.php';
session_start();
if ($_SESSION['Doctor_log'] == '')
{
    header("location:../Login.html");
}else{
 ?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/users.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<title>Untitled Document</title>
</head>

<body>
<!-- Navigation Section Start -->
<header> <img src="../img/shapes/Final_Logo_PNG.webp" alt=" Logo" width="170px" height="50px">
  <ul class="navbar">
    <li><a href="index.php#header">Home</a></li>
    <li><a href="index.php#About">About</a></li>
    <li><a href="index.php#Services">Services</a></li>
    <li><a href="Product-list.php">Products</a></li>
    <li><a href="Doctors-page.php">Doctors</a></li>
    <li><a href="index.php#News">News</a></li>
    <li><a href="#Contact">Contact</a></li>
    <li><a href="chat.php">Chat</a></li>
    <li><a href="manage-cart.php">Cart</a></li>
  </ul>
  <div class="main"> <a href="User-Profile.php" class="user">Profile</a>
    <div id="menu-icon"><img src="../img/icons/icons8-menu-rounded-25.png" /></div>
  </div>
</header>
<!--js link---> 
<script src="../js/user-Nav-bar.js"></script> 
<!-- Navigation Section End --> 
<br>
<br>
<br>
<br>
<?php
if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {

  if ( isset( $_POST[ 'Add_To_Cart' ] ) ) {

    if ( isset( $_SESSION[ 'cart' ] ) ) {

      $item_array_id = array_column( $_SESSION[ 'cart' ], 'product_id' );
      if ( !in_array( $_GET[ "id" ], $item_array_id ) ) {
        $count = count( $_SESSION[ "cart" ] );
        $item_array = array(
          'product_id' => $_GET[ "id" ],
          'product_name' => $_POST[ "hidden_name" ],
          'product_price' => $_POST[ "hidden_price" ],
          'product_quantity' => $_POST[ "quantity" ],
          'product_img' => $_POST[ "hidden_img" ],
        );
        $_SESSION[ "cart" ][ $count ] = $item_array;
        echo '<script>window.location="Product-list.php"</script>';
      } else {
        echo "<script> alert('Item all ready add');window.location.href='Product-list.php';</script>";

      }
    } else {
      $item_array = array(
        'product_id' => $_GET[ "id" ],
        'product_name' => $_POST[ "hidden_name" ],
        'product_price' => $_POST[ "hidden_price" ],
        'product_quantity' => $_POST[ "quantity" ],
        'product_img' => $_POST[ "hidden_img" ],
      );
      $_SESSION[ "cart" ][ 0 ] = $item_array;
    }
  }


  if ( isset( $_POST[ 'Remove_Item' ] ) ) {
    foreach ( $_SESSION[ "cart" ] as $key => $value ) {

      if ( $value[ 'product_id' ] == $_POST[ 'Item_name' ] ) {

        unset( $_SESSION[ "cart" ][ $key ] );
        $_SESSION[ 'cart' ] = array_values( $_SESSION[ 'cart' ] );
        echo '<script>alert("Product has been removed")</script>';
        echo '<script>window.location="manage-cart.php"</script>';
      }
    }
  }

  if ( isset( $_POST[ 'Update_Item' ] ) ) {
    foreach ( $_SESSION[ "cart" ] as $key => $value ) {
      if ( $value[ 'product_id' ] == $_POST[ 'Item_name' ] ) {
        $_SESSION[ "cart" ][ $key ][ 'product_quantity' ] = $_POST[ 'quantity' ];
        // echo '<script>alert("Product quantity has been updated")</script>';
        // echo '<script>window.location="manage-cart.php"</script>';
      }
    }
  }
 


}
 if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
  $items = count($_SESSION["cart"]);
} else {
  $items = 0;
}
?>
<div class="cart-body"> 
  <!-- Header -->
  <div class="products-container">
    <h1>Shopping Cart</h1>
    <ul class="breadcrumb">
      <!--<li>Home</li>
      <li>Shopping Cart</li>-->
    </ul>
    <span class="count"><?php echo $items; ?> items in the bag</span> </div>
  <!-- End Header -->
  <?php
  if ( !empty( $_SESSION[ "cart" ] ) ) {
    $total = 0;
    $subTotal = 0;

    ?>
  <!-- Product List -->
  <section class="products-container">
    <?php
    foreach ( $_SESSION[ "cart" ] as $key => $value ) {
      ?>
    <div v-if="products.length > 0">
      <ul class="products">
        <form action="manage-cart.php" method="post">
          <li class="products-row" v-for="(product, index) in products">
            <div class="col left">
              <div class="thumbnail"> <br>
                <img src="../img/products/<?php echo $value["product_img"];?>" width="150px" height="180px" alt="product.name" /> </a> </div>
              <div class="detail">
                <button name="Remove_Item" hidden >Remove</button>
                <input type="hidden" name="Item_name" value="<?php echo $value["product_id"]; ?>">
                <br>
                <div class="name"><?php echo $value["product_name"];?></a></div>
                <div class="description"> Rs. <?php echo $value["product_price"];?>.00/= </div>
                <div class="price" id="total-<?php echo $key;?>">Total- Rs. <?php echo number_format($value["product_quantity"]*$value["product_price"],2);?>/= </div>
                <button class="item-update" type="submit" name="Update_Item">Update</button>
              </div>
            </div>
            <div class="col right">
              <div class="quantity">
                <input type="number" class="quantity" max="10" min="1" name="quantity" value="<?php echo $value["product_quantity"];?>" oninput="updateCartItem(<?php echo $key;?>)" data-price="<?php echo $value["product_price"];?>" data-key="<?php echo $key;?>" />
              </div>
              <div class="remove" onclick="removeItem()">
                <svg @click="removeItem(<?php echo $key;?>)" version="1.1" class="close" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
                  <polygon points="38.936,23.561 36.814,21.439 30.562,27.691 24.311,21.439 22.189,23.561 28.441,29.812 22.189,36.064 24.311,38.186 30.562,31.934 36.814,38.186 38.936,36.064 32.684,29.812"></polygon>
                </svg>
              </div>
            </div>
          </li>
        </form>
      </ul>
    </div>
 
    <script>
      function removeItem() {
       // get the button element by name attribute
       const button = document.querySelector('[name="Remove_Item"]');
         // simulate a click on the button
        button.click();
        }
     </script>
 
 
    <?php
    $subTotal = $subTotal + ( $value[ "product_quantity" ] * $value[ "product_price" ] );
    $total = $total + ( $value[ "product_quantity" ] * $value[ "product_price" ] );


    }

    ?>
  </section>
  <!-- End Product List --> 
  
  <!-- Summary -->
  <section class="products-container" v-if="products.length > 0">
    <div class="promotion"> 
      <!--<label for="promo-code">Have A Promo Code?</label>
      <input type="text" id="promo-code" v-model="promoCode" /> <button type="button" @click="checkPromoCode"></button>--> 
    </div>
    <div class="summary">
      <ul>
        <li>Subtotal <span>Rs. <?php echo $subTotal;?>.00/=</span></li>
        
        <!--<li v-if="discount > 0">Discount <span>{{ discountPrice | currencyFormatted }}</span></li>-->
        <li>Tax <span>Rs. 500/=</span></li>
        <li class="total">Total <span>Rs. <?php echo $total+ 500;?>.00/=</span></li>
      </ul>
    </div>
    <div class="checkout">
     <button type="button" id="open-popup">Check Out</button>
    </div>
  </section>
  <!-- End Summary -->
  
  <?php
  } else {
   ?>
  <section class="products-container">
    <div v-else class="empty-product">
      <h3>There are no products in your cart.</h3>
      <button onClick="parent.location='Product-list.php'">Shopping now</button>
    </div>
  </section>
  
  <!-- Summary -->
  <section class="products-container" v-if="products.length > 0">
    <div class="promotion"> 
      <!--<label for="promo-code">Have A Promo Code?</label>
      <input type="text" id="promo-code" v-model="promoCode" /> <button type="button" @click="checkPromoCode"></button>--> 
    </div>
    <div class="summary">
      <ul>
        <li>Subtotal <span>Rs.00/=</span></li>
        <!--<li v-if="discount > 0">Discount <span>{{ discountPrice | currencyFormatted }}</span></li>-->
        <li>Tax <span>Rs. 500/=</span></li>
        <li class="total">Total <span>Rs. 00/=</span></li>
      </ul>
    </div>
    <div class="checkout">
      <button type="button">Check Out</button>
    </div>
  </section>
  <!-- End Summary -->
  <?php

  }
  ?>
</div>


  <div class="popup">
    <div class="popup-inner">
      <h2>Address Form</h2>
      <span class="popup-close">&times;</span>
      <form method="post" action="make-purchase.php">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="cName"  pattern="[A-Za-z\s]+" title="Enter a valid city name (e.g. New York, Los Angeles)" required>

        <label for="postal-code">Postal Code:</label>
        <input type="text" id="postal-code" name="postal_code" required>

        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
<script>// Get the button and popup elements
const openPopup = document.getElementById("open-popup");
const popup = document.querySelector(".popup");
const closePopup = document.querySelector(".popup-close");

// When the button is clicked, show the popup
openPopup.addEventListener("click", () => {
  popup.style.display = "flex";
});

// When the close icon is clicked, hide the popup
closePopup.addEventListener("click", () => {
  popup.style.display = "none";
});

// When the user clicks outside the popup, hide it
window.addEventListener("click", (event) => {
  if (event.target === popup) {
    popup.style.display = "none";
  }
});
</script>

<footer id="Contact">
      <div class="main-Footer_content">
        <div class="left box">
          <h2>About us</h2>
          <div class="Footer_content">
            <p>Aayurveda is a traditional Hindu system of medicine (incorporated in Atharva Veda, the last of the four Vedas), which is based on the idea of balance in bodily systems and uses diet, herbal treatment, and yogic breathing.</p>
          </div>
        </div>

        <div class="center box">
          <h2>Address</h2>
          <div class="Footer_content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Colombo 7, Sri Lanka</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text">01124562145</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">Aayurveda@email.com</span>
            </div>
          </div>
        </div>

        <div class="right box">
          <h2>Contact us</h2>
          <div class="Footer_content">
            <form action="feedback.php" method="post">
              <div class="email">
                <div class="text">Email *</div>
                <input type="email" name="email" required>
              </div>
              <div class="msg">
                <div class="text">Message *</div>
                <textarea rows="2" cols="25" name="msg" required></textarea>
              </div>
              <div class="footer_btn">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="bottom">
        <center>
          <span class="credit">Created By <a href="#">Aayurveda.lk</a> | </span>
          <span class="far fa-copyright"></span><span> 2023 All rights reserved.</span>
        </center>
      </div>
    </footer>

</body>
</html>

<script>
//get all the quantity inputs
const quantities = document.querySelectorAll('.quantity');

//loop through each quantity input
quantities.forEach(quantity => {
  quantity.addEventListener('input', function(){
    const key = this.getAttribute('data-key');
    const price = this.getAttribute('data-price');
    const total = this.value * price;
    document.getElementById('total-' + key).innerHTML = 'Total- Rs. ' + total.toFixed(2) + '/=';
  });
});
</script>

 <?php
}
