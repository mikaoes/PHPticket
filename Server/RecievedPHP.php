#!/usr/bin/php
<?php
// SETUP - Please set these variables
$tmptxt = "Server/tmp.txt"; // location of tmp.txt
//
$currentTicket = file_get_contents($tmptxt);
// echo $currentTicket;
// echo "\n\n";

$lines = file($tmptxt);
$new = '';

if (is_array($lines)) {
    foreach($lines as $line) {
        $new .= $line . " ";
    }
}
$new = str_replace("\n", "", $new);
file_put_contents($tmptxt, $new);
$dataarray = explode (" ", $new, 5);
$datakeysarray = array("name", "date", "time", "title", "email");
$dataarray = array_combine($datakeysarray, $dataarray);
$jsonarray = json_encode($dataarray);
file_put_contents("ticket.json", $jsonarray);
// print_r($dataarray);
// echo "\n\n";
// print_r($datakeysarray);
exit(0);
?>
