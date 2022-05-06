<?php
$db=mysqli_connect("localhost","root","","diary");

$EncodedData=file_get_contents('php://input');
$DecodedData=json_decode($EncodedData,true); 

$productName=$DecodedData["productName"];
$diaryName=$DecodedData["diaryName"];

$fetch=("SELECT * from products where product_name='$productName' and diary_name='$diaryName';");
$query=mysqli_query($db,$fetch);
        while($row=mysqli_fetch_assoc($query))
        {
            if($num=mysqli_num_rows($query)>0)
            {
        $productName=$row["product_name"];
        $productDescription=$row["product_description"];
        $productPrice=$row["product_cost"];
        $diaryName=$row["diary_name"];
        

        $response[]=array("product_name"=>$productName,"product_description"=>$productDescription,"product_cost"=>$productPrice,
    "diary_name"=>$diaryName);
    
}
    else
    {
        $productName="";
        $productDescription="";
        $productPrice="";
        $productNam="";
        $response[]=array("product_name"=>$productName,"product_description"=>$productDescription,"product_cost"=>$productPrice,
    "diary_name"=>$diaryName);
    }
}


 echo json_encode($response);

?>