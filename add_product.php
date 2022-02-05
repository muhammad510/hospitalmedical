<html>
<head>
<?php include'bootstrap.php';?>
</head>
<body>
<h1>
add product
</h1>
<div class='container'>
<form action='add_product.php' method='get'>
<div>
<label for='name'>name</label>
<input type='text' name='name'>
</div>

<div>
  <label for='mrp'>MRP</label>
  <input type='text' name='mrp'>
</div>

 <div>
 <label for='exp'>EXP</label>
 <input type='text' name='exp'>
 </div>
 
  <div>
 <label for="type">SELECT TYPE</label>
<select name="type" id="type">
  <option value="Syrup">syrup</option>
  <option value="Tablate">Tablate</option>
  <option value="Ampule">Ampule</option>
  <option value="Vail">Vail</option>
  <option value="Drop">Drop</option>
</select>
    </div>
    
 <div>
 <label for='Quant'>QUANT</label>
 <input type='number' name='quant'>
    
    
  <button type='submit' name='submit' value='submit'>add</button></div>
</form>
</div>
<?php
include'db.php';
if(isset($_GET['submit']))
{

  $name=$_GET['name'];
  $mrp=$_GET['mrp'];
   $exp=$_GET['exp'];
    $type=$_GET['type'];
     $quant=$_GET['quant'];
 $q= "INSERT INTO `product`( `name`, `mrp`, `type`, `quant`) VALUES ('$name','$mrp','$type','$quant');";
 $q_res=mysqli_query($connect,$q);
 if($q_res)
 {
 echo'inserted';
 
 }
 else
 {
 echo"ERROR: Could not able to execute $q. " . mysqli_error($connect);
 }
}

?>
</body>
</html>
