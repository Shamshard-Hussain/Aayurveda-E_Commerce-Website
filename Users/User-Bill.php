<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>


<?php
   include '../connect.php';
session_start();
if ($_SESSION['log'] == '')
{
    header("location:../Login.html");
}else{
 

           $sn=1;
           $subTotal = 0; 
 
if(isset($_GET['order_id']) && isset($_GET['date'])) {
    $order_id = $_GET['order_id'];
    $date = $_GET['date'];
 ?>
<html>
<head>
<title>Invoice Template Design</title>
<link rel="stylesheet" href="../css/users.css" />
</head>
<body onload="printToPDF();">
 
<div class="bill-button">
  <button id="download" onClick="printToPDF();" style="background-color: #1abc9c;">Print</button>
  <button onClick="parent.location='Product-list.php'" style="background-color: #95a5a6;">Back to Shopping</button>
</div>
<div class="bill_body">
  <div id="pdf" class="bill_wrapper">
    <div class="invoice_wrapper">
      <div class="header">
        <div class="logo_invoice_wrap">
          <div class="logo_sec"> <img src="../img/ayurveda-img.png" width="110px" height="110px" alt="code logo">
            <div class="title_wrap">
              <p class="title bold">Aayurveda</p>
              <p class="sub_title">Privite Limited</p>
            </div>
          </div>
          <div class="invoice_sec">
            <p class="invoice bold">INVOICE</p>
            <p class="invoice_no"> <span class="bold">Invoice</span> <span>#<?php echo $order_id;?></span> </p>
            <p class="date"> <span class="bold">Date</span> <span><?php echo $date;?></span> </p>
          </div>
        </div>
        <div class="bill_total_wrap">
          <div class="bill_sec">
            <p>Bill To</p>
           <?php
           $sql2 = "SELECT * FROM send_order where order_id=$order_id";
           $res2 = mysqli_query( $connect, $sql2 );
           $count2 = mysqli_num_rows( $res2 );

           if ( $count2 > 0 ) {
             while ( $row2 = mysqli_fetch_assoc( $res2 ) ) {
               $address = $row2[ 'address' ];
               $pCode = $row2[ 'pCode' ];             
             }
           }

           ?>
            <p class="bold name"><?php echo $_SESSION['lname'];  ?></p>
            <span> <?php echo $address;?>,<br/>
            <?php echo $pCode;?> </span> </div>
          <div class="total_wrap"> 
            <!--<p>Total Due</p>
	          		<p class="bold price">USD: $1200</p>--> 
          </div>
        </div>
      </div>
      <div class="body">
        <div class="main_table">
          <div class="table_header">
            <div class="row">
              <div class="col col_no">NO.</div>
              <div class="col col_des">ITEM DESCRIPTION</div>
              <div class="col col_price">PRICE</div>
              <div class="col col_qty">QTY</div>
              <div class="col col_total">TOTAL</div>
            </div>
          </div>
          <div class="table_body">
           
           <?php
           $sql = "SELECT * FROM orders where order_id=$order_id";
           $res = mysqli_query( $connect, $sql );
           $count = mysqli_num_rows( $res );

           if ( $count > 0 ) {
             while ( $row = mysqli_fetch_assoc( $res ) ) {
               $product_name = $row[ 'product_name' ];
               $product_price = $row[ 'product_price' ];
               $product_quantity = $row[ 'product_quantity' ];
               $total = $row[ 'total' ];
               $subTotal += $total;
               ?>
           
            <div class="row">
              <div class="col col_no">
                <p><?php echo $sn++;?></p>
              </div>
              <div class="col col_des">
                <p class="bold"><?php echo $product_name;?></p>
                <!--<p>Lorem ipsum dolor sit.</p>-->
              </div>
              <div class="col col_price">
                <p>Rs. <?php echo $product_price;?>.00/=</p>
              </div>
              <div class="col col_qty">
                <p><?php echo $product_quantity;?></p>
              </div>
              <div class="col col_total">
                <p>Rs. <?php echo $product_price;?>.00/=</p>
              </div>
            </div>
           
               <?php
              
             }
           }

           ?>
          </div>
        </div>
        <div class="paymethod_grandtotal_wrap">
          <div class="paymethod_sec">
            <p class="bold">Payment Method</p>
            <p>Visa, master Card and We accept Cheque</p>
          </div>
          <div class="grandtotal_sec">
            <p class="bold"> <span>SUB TOTAL</span><span>Rs. <?php echo $product_price;?>.00/=</span> </p>
            <p> <span>Tax Vat</span><span>Rs.500.00/=</span> </p>
            <!--<p> <span>Discount 10%</span> <span>-$700</span> </p>-->
            <p class="bold"> <span>Grand Total</span> <span>Rs.<?php echo $product_price+500;?>.00/=</span> </p>
          </div>
        </div>
      </div>
      <div class="footer">
        <p>Thank you and Best Wishes</p>
        <div class="terms">
          <p class="tc bold">Terms & Coditions</p>
          <p>By making a purchase, you agree to our terms and conditions. Products are not intended to diagnose or treat any condition. Keep out of reach of children. Results may vary. Contact us for any concerns.</p>
        </div>
      </div>
    </div>
  </div>
</div>
 
		<script>
	function printToPDF() {
  console.log('converting...');

  var printableArea = document.getElementById('pdf');

  html2canvas(printableArea, {
    useCORS: true,
    onrendered: function(canvas) {

      var pdf = new jsPDF('p', 'pt', 'letter');

      var pageHeight = 980;
      var pageWidth = 900;
      for (var i = 0; i <= printableArea.clientHeight / pageHeight; i++) {
        var srcImg = canvas;
        var sX = 0;
        var sY = pageHeight * i; // start 1 pageHeight down for every new page
        var sWidth = pageWidth;
        var sHeight = pageHeight;
        var dX = 0;
        var dY = 0;
        var dWidth = pageWidth;
        var dHeight = pageHeight;

        window.onePageCanvas = document.createElement("canvas");
        onePageCanvas.setAttribute('width', pageWidth);
        onePageCanvas.setAttribute('height', pageHeight);
        var ctx = onePageCanvas.getContext('2d');
        ctx.drawImage(srcImg, sX, sY, sWidth, sHeight, dX, dY, dWidth, dHeight);

        var canvasDataURL = onePageCanvas.toDataURL("image/png", 1.0);
        var width = onePageCanvas.width;
        var height = onePageCanvas.clientHeight;

        if (i > 0) // if we're on anything other than the first page, add another page
          pdf.addPage(612, 791); // 8.5" x 11" in pts (inches*72)

        pdf.setPage(i + 1); // now we declare that we're working on that page
        pdf.addImage(canvasDataURL, 'PNG', 20, 40, (width * .62), (height * .62)); // add content to the page

      }
      pdf.save('test.pdf');
    }
  });
}
		</script>
 
</body>
</html>
<?php
 
 
} else {
     echo '<script>window.location.href="manage-cart.php";</script>';
}
 
}
