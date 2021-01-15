#!/usr/bin/php
<?php
// SETUP - Please set these variables
$tmptxt = "/YOUR_PATH/tmp.txt"; // location of tmp.txt
//
$currentTicket = file_get_contents($tmptxt);
//$currentTicket = str_replace("_", " ", $currentTicket);
echo $currentTicket;
echo "\n\n";

$lines = file($tmptxt);
$new = '';

if (is_array($lines)) {
    foreach($lines as $line) {
        $new .= $line . " ";
    }
}
$new = str_replace("\n", "", $new);
file_put_contents($tmptxt, $new);
$dataarray = explode (" ", $new);
print_r($dataarray);
$jsonarray = json_encode($dataarray);
file_put_contents("ticket.json", $jsonarray);

exit(0);
?>
