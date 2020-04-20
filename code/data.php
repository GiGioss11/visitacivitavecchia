<?php
$query_string=$_SERVER["QUERY_STRING"];
parse_str($query_string,$query);
$id=$query["id"];
$myObj = new stdClass();
$myObj->productList = array();


$servername="visitacivitavecchia_db_1";
$username="user";
$password="password";
$dbname="db";
$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connection_error) {
    die("connection failed:".$conn->connection_error);
}
$result=$conn->query
("SELECT * FROM `products` WHERE id = '".$id."'");
if($result){
    foreach($result as $row){
        $prod=new stdClass();
        $prod->nome = $row["nome"];
        $prod->nome_sottotitolo= $row["nome_sottotitolo"];
        $prod->video_url = $row["video_url"];
        $prod->img1_url = $row["img1_url"];
        $prod->img2_url = $row["img2_url"];
        $prod->img3_url = $row["img3_url"];
        $prod->text1_url = $row["text1_url"];
        $prod->text2_url = $row["text2_url"];
        $prod->text3_url = $row["text3_url"];
        $myObj->productList[] = $prod;
    }
}
header('Content-Type: application/json');
echo json_encode($myObj);


?>