
<form action="#" method="post">
<input type="text" name="pass" />
<button type="submit" name="submit">Genarate</button> 
 <button type="reset" name="reset">Clear</button>
</form>

<?php 
//password genarate
include 'connect.php';
 if (isset($_POST['submit'])) {
 $pass = mysqli_real_escape_string( $connect, md5( $_POST[ 'pass' ] ) );
  
  echo "Encrypted Word = ". $pass;
}?>