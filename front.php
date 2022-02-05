<?php session_start();
ob_start();


?>

<html>
<head>

<?php include'bootstrap.php';
include'db.php';
?>
</head>
<body>

<form action='front.php' method='post'>
<input type='text'name='cname' placeholder='write cusomer name'/>
<input type='text'name='cmobile' placeholder='write cusomer mobile'/>
<button type='submit' name='csubmit' >submit</button>
</form>

<?php 
//$_SESSION["cmobile1"]=11;
if(isset($_POST['csubmit']))
{
$name=$_POST['cname'];
$mobile=$_POST['cmobile'];
$_SESSION["cname1"]=$name;
$_SESSION["cmobile1"]=$mobile;
}

?>

<div class="container">
  <div class="row">
    <div class="col-sm-8">
<table class="table table-striped table-bordered table-hover table-condensed">
<thead>
<h2>Filterable Table</h2>
  <p>Type something in the input field to search the table for first names, last names or emails:</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
<tr>
<th>NAME</th>
<th>type</th>
<th>M.R.P</th>
<th>stock</th>
<th>quant</th>
<th>sell</th>
<tr>
</thead>
<?php
$q1='SELECT * FROM product;';
$q1_res=mysqli_query($connect,$q1);
while($row=mysqli_fetch_assoc($q1_res))
{
$name=$row['name'];
$mrp=$row['mrp'];
$type=$row['type'];
$stock=$row['quant'];
$id=$row['id'];

?>
<tbody id="myTable">
<tr>
<td><?php echo $name;?></td>
<td><?php echo $type; ?></td>
<td><?php  echo $mrp ?></td>
<td><?php echo $stock; ?></td>
<form method='get' action='actions1.php?'>

<td><input type="text" id="" name="quant" maxlength="4" size="4" required></td>
<td><?php echo "<button type='submit' name='id' value='{$id}'>"; ?>select</button></td></form>
</tr>
<?php } ?>
</tbody>
</table>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</div>



<div class='col-sm-4'>
<?php if($_SESSION["cmobile1"]==true){?>

<table class="table table-striped table-bordered table-hover table-condensed">
<thead>
<h2>HELLO CUSTOMER</h2>
<?php //$a1= number_format(2 * 5, 2); // "5.00" 
 //echo $a1;
 ?>
<tr>
<th>Quant</th>
<th>NAME</th>


<th>Amount</th>
<th>Delete</th>

</tr>
</thead>
<?php
$mobile1=$_SESSION["cmobile1"];
$q5="SELECT * FROM product_sold where cnumber='$mobile1';";
$q5_res=mysqli_query($connect,$q5);
if($q5_res)
{

while($row1=mysqli_fetch_assoc($q5_res))
{
$name1=$row1['sp_name'];
//$mrp=$row['mrp'];
$quant1=$row1['squant'];
$amount1=$row1['samount'];

?>
<tbody>
<tr>
<td><?php echo $quant1; ?></td>
<td><?php echo $name1; ?></td>

<td><?php  echo $amount1; ?></td>
<td><?php echo "<a href='actions1.php?name=$name && mobile=$mobile1'>delete</a>"; ?></td>


</tr>
<?php } }
else
{
//echo"ERROR: Could not able to execute $q5. " . mysqli_error($connect);
}
?>

</tbody>
<tfoot><?php
$q6="SELECT * FROM product_sold WHERE cnumber='$mobile1';";
$q6_res=mysqli_query($connect,$q6);
$total=0;
while($row2=mysqli_fetch_assoc($q6_res))
{
$total=$total+$row2['samount'];
}
?>
<th></th>
<th></th>
<th>total=<?php echo $total;?></th>

</tfoot>
</table>
<?php }

else
{
echo"NOTHING ";
} 
?>
<?php echo"<a href='print_invoice.php?mobile=$mobile1'>print</a>";?>
</div>
</div>
</div>
</body>
</html>
