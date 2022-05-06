<?Php 
$db=mysqli_connect("localhost","root","","diary");

$EncodedData=file_get_contents('php://input');
$DecodedData=json_decode($EncodedData,true);

$names=$DecodedData['names'];
$userName=$DecodedData['userName'];
$email=$DecodedData['email'];
$phoneNumber=$DecodedData['phoneNumber'];
$location=$DecodedData['location'];
$password=$DecodedData['password'];
$confirmPassword=$DecodedData['confirmPassword'];

$insert="INSERT INTO users(names,userName,email_address,phone_number,location,password,confirm_password)
VALUES ('$names','$userName','$email','$phoneNumber','$location','$password','$confirmPassword');";
$query=mysqli_query($db,$insert);
if($query)
{
    $Message="User Registered successfully";
}
else{
    $Message="Server Error ..Please try latter";
}
$Response[]=array("Message"=>$Message);
echo json_encode($Response);
?>