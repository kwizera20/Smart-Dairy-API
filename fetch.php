<?php
$db=mysqli_connect("localhost","root","","diary");

$EncodedData=file_get_contents('php://input');
$DecodedData=json_decode($EncodedData,true);

$userName = $DecodedData['userName'];
$password = $DecodedData['password'];
  if($DecodedData['userName']!='')
{
    $fetch=("SELECT * from users where userName='$userName' and password='$password';");
    $query=mysqli_query($db,$fetch);
    $row=mysqli_num_rows($query);
    $num=mysqli_fetch_assoc($query);
    if($num)
    {
        echo json_encode('ok');
    }
    else
    {
        echo json_encode('no');
    }
}
else{
    echo json_encode('try again');
}

?>