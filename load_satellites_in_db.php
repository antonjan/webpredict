<?php
$TLEFILES="amateur.txt,weather.txt";
$TLEDIR="/home/anton/predict/tle/";
//$tle = str_getcsv(file_get_contents("http://www.celestrak.com/NORAD/elements/amateur.txt"));
//$rows = explode("\n",$tle);
//$s = array();
//foreach($rows as $row) {
//	            $s[] = str_getcsv($row);
//}
$row = 1;
if (($handle = fopen("http://www.celestrak.com/NORAD/elements/amateur.txt", "r")) !== FALSE) {
          while (($data = fgetcsv($handle, 1000, " ")) !== FALSE) {
                          $num = count($data);
                                  echo "$num fields in line $row\n";
                                  $row++;
                                       for ($c=0; $c < $num; $c++) {
                                       echo "$c : $data[$c] ";
				       }
				  	echo "\n";
                                      }
              fclose($handle);
}
?>

