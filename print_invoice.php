<?php
session_start();
ob_start();
?>

<html>
<head>
<b><title>ISLAM MEDICAL</title></b>
<script>
function myfunction()
{
window.print();
}
</script>
<?php include'bootstrap.php';?>
</head>
<body>
<?php 
include'db.php';
if(isset($_GET['mobile']))
{
$mobile=$_GET['mobile'];



?>
<div class='container'>
<table class="table table-striped table-hover table-condensed">
<thead>
<tr>
<th>Quant</th>
<th>Name</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<?php 
$q="SELECT * FROM product_sold WHERE cnumber='$mobile';";
$q_res=mysqli_query($connect,$q);
$row2=mysqli_fetch_assoc($q_res);
$customer=$row2['customer'];
?>

<h2><?php echo "Customer:".$customer;?><h2>
<?php
$total=0;
$q1="SELECT * FROM product_sold WHERE cnumber='$mobile';";
$q_res1=mysqli_query($connect,$q1);

while($row=mysqli_fetch_assoc($q_res1))
{
$quant=$row['squant'];
$name=$row['sp_name'];
$amount=$row['samount'];
$total=$total+$amount;
//echo 'HELLO';
?>
<tr>
<td><?php  echo $quant;?></td>
<td><?php  echo $name;?></td>
<td><?php  echo $amount;?></td>
</tr>
<?php }?>
</tbody>

<tfoot>

<tr>
<th></th>
<th></th>
<th>Totle=<?php echo $total;?></th>
</tr>
<?php }?>
</tfoot>

</table>

</div>
<div style="text-align:center;">
<button   onclick="myfunction()"><b>BILL</b></button> 
</div>
<body>
</html>
