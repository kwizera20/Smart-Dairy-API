<?php
$db=mysqli_connect("localhost","root","","diary");

$EncodedData=file_get_contents('php://input');
$DecodedData=json_decode($EncodedData,true); 

$diaryName=$DecodedData["diaryName"];


$fetch=("SELECT * from products where diary_name='$diaryName';");
$query=mysqli_query($db,$fetch);
        while($row=mysqli_fetch_assoc($query))
        {
            if($num=mysqli_num_rows($query)>0)
            {
        $productName=$row["product_name"];
        $productDescription=$row["product_description"];
        $diary=$row["diary_name"];
        

        $response[]=array("product_name"=>$productName,"product_description"=>$productDescription,"diary_name"=>$diary);
    
}
    else
    {
        $productName="";
        $productDescription="";
        $diary="";
        $response[]=array("product_name"=>$productName,"product_description"=>$productDescription,"diary_name"=>$diary);
    }
}


 echo json_encode($response);

?>