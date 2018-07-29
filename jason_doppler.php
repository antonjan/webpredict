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
//echo 'Satellite ' . htmlspecialchars($_GET["satellite"]) . '!';
//echo "Socket created \n";
//Communication loop
//while(1)
{
    //Take some input to send
//    echo 'Enter a message to send : ';
//    $input = fgets(STDIN);
       // $input = "GET_SAT PCSAT\n";
	$satellite = htmlspecialchars($_GET["satellite"]);
	if($satellite == NULL) {
 //     echo 'is null';
	$satellite ="PCSAT";
  }
	$input = "GET_DOPPLER ". $satellite ."\n";
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
        $myObj->name = $satellite[0];
        $myObj->doppler = $satellite[1];
        $myJSON = json_encode($myObj);
        echo $myJSON;
        //echo "Name " . $satellite[0]."<br>"; // Name 
        //echo "doppler " . $satellite[1]."<br>"; //


}
?> 
