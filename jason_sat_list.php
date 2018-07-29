<?php
 
/*
    Simple php udp socket client
*/
 
//Reduce errors
error_reporting(~E_WARNING);
 
$server = '127.0.0.1';
$port = 1210;
 
if(!($sock = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
{
    //Take some input to send
//	$satellite = htmlspecialchars($_GET["satellite"]);
//	if($satellite == NULL) {
 //     echo 'is null';
//	$satellite ="PCSAT";
 // }
	$input = "GET_LIST\n";
    //Send the message to the server
    if( ! socket_sendto($sock, $input , strlen($input) , 0 , $server , $port))
    {
        $errorcode = socket_last_error();
        $errormsg = socket_strerror($errorcode);

        die("Could not send data: [$errorcode] $errormsg \n");
    }
    //Now receive reply from server and print it
    if(socket_recv ( $sock , $reply , 2045 , MSG_WAITALL ) === FALSE)
    {
        $errorcode = socket_last_error();
        $errormsg = socket_strerror($errorcode);
        die("Could not receive data: [$errorcode] $errormsg \n");
    }
    //echo "Reply : $reply"."<br>";
        $satellite = explode("\n", $reply);
        //print_r (explode(" ",$reply));
        //echo $return_str. "<br>";
        $myObj->name0 = $satellite[0];
        $myObj->name1 = $satellite[1];
        $myObj->name2 = $satellite[2];
        $myObj->name3 = $satellite[3];
        $myObj->name4 = $satellite[4];
        $myObj->name5 = $satellite[5];
        $myObj->name6 = $satellite[6];
        $myObj->name7 = $satellite[7];
        $myObj->name8 = $satellite[8];
        $myObj->name9 = $satellite[9];
        $myObj->name10 = $satellite[10];
        $myObj->name11 = $satellite[11];
        $myObj->name12 = $satellite[12];
        $myObj->name13 = $satellite[13];
        $myObj->name14 = $satellite[14];
	$myObj->name15 = $satellite[15];
        $myObj->name16 = $satellite[16];
        $myObj->name17 = $satellite[17];
        $myObj->name18 = $satellite[18];
        $myObj->name19 = $satellite[19];
        $myObj->name20 = $satellite[20];
        $myObj->name21 = $satellite[21];
        $myObj->name22 = $satellite[22];
        $myObj->name23 = $satellite[23];
	$myObj->name24 = $satellite[24];

        $myJSON = json_encode($myObj);
        echo $myJSON;
        //echo "Name " . $satellite[0]."<br>"; // Name 
        //echo "Long " . $satellite[1]."<br>"; // Long 
        //echo "Lat " . $satellite[2]."<br>"; // Lat 
        //echo "Az " . $satellite[3]."<br>"; // 
        //echo "El " . $satellite[4]."<br>"; // 
        //echo "Next AOL/LOS " . $satellite[5]."<br>"; // 
        //echo "Footprint " . $satellite[6]."<br>"; // 
        //echo "Range " . $satellite[7]."<br>"; //
        //echo "Altitude " . $satellite[8]."<br>"; //
        //echo "Velocity " . $satellite[9]."<br>"; //
        //echo "Orbit Nr " . $satellite[10]."<br>"; //
        //echo "Visibility " . $satellite[11]."<br>"; //
        //echo "Orbital Phase " . $satellite[12]."<br>"; //
        //echo "Eclipse Phase " . $satellite[13]."<br>"; //
        //echo "Squint " . $satellite[14]."<br>"; //


}
?> 
