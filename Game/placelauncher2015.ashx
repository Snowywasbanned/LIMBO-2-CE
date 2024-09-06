<?php
header("Content-Type: text/plain");
$data = array(
"jobId" => "Test",
"status" => 2,
"joinScriptUrl" => "http://www.ace.ct8.pl/game/join2015.ashx?serverPort=53640&gameid=1&jobid=Test",
"authenticationUrl" => "http://www.ace.ct8.pl/Login/Negotiate.ashx",
"message" => null
);
$jsonData = json_encode($data);
echo $jsonData;
?>