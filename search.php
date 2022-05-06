<?php
$db=mysqli_connect("localhost","root","","diary");

$EncodedData=file_get_contents('php://input');
$DecodedData=json_decode($EncodedData,true); 

$diaryLocation=$DecodedData["diaryLocation"];


$fetch=("SELECT * from owners where diary_location='$diaryLocation';");
$query=mysqli_query($db,$fetch);
        while($row=mysqli_fetch_assoc($query))
        {
            if($num=mysqli_num_rows($query)>0)
            {
        $ownerType=$row["owner_type"];
        $diaryName=$row["diary_name"];
        $location=$row["diary_location"];

        $response[]=array("owner_type"=>$ownerType,"diary_name"=>$diaryName,"diary_location"=>$location);
    
}
    else
    {
        $ownerType="";
        $diaryName="";
        $location="";

        $response[]=array("owner_type"=>$ownerType,"diary_name"=>$diaryName,"diary_location"=>$location);
    }
}


 echo json_encode($response);

?>