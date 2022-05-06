<?Php 
$db=mysqli_connect("localhost","root","","diary");

$EncodedData=file_get_contents('php://input');
$DecodedData=json_decode($EncodedData,true);

$userName=$DecodedData['userName'];
$diaryName=$DecodedData['DiaryName'];
$ProductName=$DecodedData['productName'];
$ProductDescription=$DecodedData['productDescription'];
$productCost=$DecodedData['productCost'];
$quantity=$DecodedData['quantity'];
$date=date("y-m-d");

$insert="INSERT INTO orders(user_name,diary_name,product_name,product_description,product_cost,quantity,date,order_status)
VALUES ('$userName','$diaryName','$ProductName','$ProductDescription','$productCost','$quantity','$date','pending');";
$query=mysqli_query($db,$insert);
if($query)
{
    $Message="Order Sent successfully";
}
else{
    $Message="Server Error ..Please try latter";
}
$Response[]=array("Message"=>$Message);
echo json_encode($Response);
?>