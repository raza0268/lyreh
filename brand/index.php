<?php 
$con=mysqli_connect("localhost","lyreh","lyreh@123#","lyreh");
// Opening a file 
$myfile = fopen("brand.txt", "r"); 
  
// reading the entire file using 
// fread() function 
$data=explode("\n",fread($myfile, filesize("brand.txt"))); 
foreach($data as $d){
	//mysqli_query($con, "insert into brands(brand_name) values('$d')");
}
// closing the file 
fclose($myfile); 
?>