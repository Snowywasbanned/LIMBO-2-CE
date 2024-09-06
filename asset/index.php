<?php
header("content-type: text/plain");
$id = $_GET["id"];
if (filter_var($id, FILTER_VALIDATE_INT) === false) {

    die("my guy what are you trying to do go hack your mother instead");
}
if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/asset/" . $id . ""))
{
$file = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/asset/" . $id . "");
echo $file;
} else {
header("Location: https://assetdelivery.roblox.com/v1/asset/?id=". $id ."");
die();
}
?>