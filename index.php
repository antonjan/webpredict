<?php
echo "<html>";
echo "<body>";
echo "<head>";
echo "</head>";
$fp = stream_socket_client("udp://127.0.0.1:1210", $errno, $errstr);
if (!$fp) {
    echo "ERROR: $errno - $errstr<br />\n";
} else {
//   while (1){
    fwrite($fp, "GET_SAT PCSAT\n");
    $return_str =  fread($fp, 266)."<br>";
    $satellite = explode(" ", $return_str);
    print_r (explode(" ",$return_str));
echo $return_str. "<br>";
	echo "sat " . $satellite[0]."<br>"; // az 
	echo "Azm " . $satellite[1]."<br>"; // az 
	echo "Elv " . $satellite[2]."<br>"; // elevation 
    fclose($fp);
//    fwrite($fp, "GET_DOPPLER\n");_
//    echo fread($fp, 36);
//    fclose($fp);


$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

echo json_encode($arr);
//  }
}
echo "</body>";
echo "</html>";
?>

