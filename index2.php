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
 
echo "Socket created \n";
 
//Communication loop
//while(1)
{
    //Take some input to send
    echo 'Enter a message to send : ';
//    $input = fgets(STDIN);
	$input = "GET_SAT PCSAT\n";
     
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
     
    echo "Reply : $reply"."<br>";
	$satellite = explode("\n", $reply);
    	//print_r (explode(" ",$reply));
//echo $return_str. "<br>";
        echo "Name " . $satellite[0]."<br>"; // Name 
        echo "Long " . $satellite[1]."<br>"; // Long 
        echo "Lat " . $satellite[2]."<br>"; // Lat 
	echo "Az " . $satellite[3]."<br>"; // 
	echo "El " . $satellite[4]."<br>"; // 
	echo "Next AOL/LOS " . $satellite[5]."<br>"; // 
	echo "Footprint " . $satellite[6]."<br>"; // 
	echo "Range " . $satellite[7]."<br>"; //
	echo "Altitude " . $satellite[8]."<br>"; //
	echo "Velocity " . $satellite[9]."<br>"; //
	echo "Orbit Nr " . $satellite[10]."<br>"; //
	echo "Visibility " . $satellite[11]."<br>"; //
	echo "Orbital Phase " . $satellite[12]."<br>"; //
	echo "Eclipse Phase " . $satellite[13]."<br>"; //
	echo "Squint " . $satellite[14]."<br>"; //


}
?>
