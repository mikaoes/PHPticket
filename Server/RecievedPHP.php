#!/usr/bin/php
<?php
$tmptxt = "Server/tmp.txt"; // location of tmp.txt
$currentTicket = file_get_contents($tmptxt);

$lines = file($tmptxt);
$new = '';
if (is_array($lines)) {
    foreach($lines as $line) {
        $new .= $line . " ";
    }
}
$new = str_replace("\n", "", $new);
file_put_contents($tmptxt, $new);
$dataarray = explode (" ", $new, 6);
$datakeysarray = array("name", "date", "time", "title", "email", "status");
$dataarray = array_combine($datakeysarray, $dataarray);
$replacearray = ["status" => "open"];
$dataarray = array_replace($dataarray, $replacearray);
$jsonarray = json_encode($dataarray);
$namingint = file_get_contents("Server/namingint");
$filename = "activeTickets/" . $namingint . ".json";
file_put_contents($filename, $jsonarray);
file_put_contents($tmptxt, "");
$namingint = (int)$namingint + 1;
file_put_contents("Server/namingint", $namingint);
exit(0);
?>
