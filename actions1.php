<?php session_start();
ob_start();

include'db.php';
?>
<html>
<head>

</head>
<body>

<h1>hello</h1>
<?php
$cname=$_SESSION["cname1"];
$cmobile=$_SESSION["cmobile1"];
$date=date('d-m-y');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$quant=$_GET['quant'];
echo "yor selling quant=".$quant;
$q="SELECT * FROM product WHERE id=$id;";
$q1_r=mysqli_query($connect,$q);
if($row=mysqli_fetch_assoc($q1_r))
{
$mrp=$row['mrp'];
$stock=$row['quant'];
$name=$row['name'];
$type=$row['type'];
echo "your stock=".$stock;
$stock=$stock-$quant;
echo "your  left stock=".$stock;
$q3="UPDATE product SET quant ='$stock' WHERE id='$id';";
$q3_r=mysqli_query($connect,$q3);
//for sold table
//$cname=$_SESSION["cname"];
//$cmobile=$_SESSION["cmobile"];
$date=date('d-m-y');
 $amount1=number_format($mrp*$quant, 2);
 echo ' '.$amount1;
if($q3_r)
{
echo'update=>';
//echo 'price= '.number_format($mrp*$quant, 2);
}
$q4="INSERT INTO `product_sold`( `cnumber`, `customer`, `sp_name`, `squant`, `samount`, `sdate`) VALUES ('$cmobile','$cname','$name',$quant,'$amount1',now());";
$q4_r=mysqli_query($connect,$q4);
if($q4_r)
{
echo 'inserted';
header('location:front.php');
}
else
{
echo"ERROR: Could not able to execute $q4. " . mysqli_error($connect);
}
}}?>
<h1><?php echo $cname;?></h1>

</body>
</html>
