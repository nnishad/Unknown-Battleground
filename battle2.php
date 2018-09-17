<?php
define('HOST','localhost');
define('USERNAME', 'root');
define('PASSWORD','');
define('DB','pubg');

$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

function count1($b_id){
    $con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $reg_user = mysqli_query($con,"SELECT * FROM reg_user where battle_id=$b_id ");
    $num_reg_user = mysqli_num_rows($reg_user);
    $num_reg_user="45";
    return $num_reg_user;
}

$result = mysqli_query($con,"SELECT * FROM battle");  //query
while ($row = mysqli_fetch_array($result)){
                
   $reg_user = mysqli_query($con,"SELECT * FROM reg_user where battle_id=$row[b_id] ");
   $s = mysqli_num_rows($reg_user);
                if($s<'100'){
                    echo $s;
                }
                else{
                    echo 'full';
                }
}