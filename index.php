<?php

date_default_timezone_set("America/Sao_Paulo");
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Access-Control-Allow-Origin: *");

ob_start();
session_start();

require_once (strpos(parse_url($_SERVER['REQUEST_URI'])['path'], 'api')) ? 'app/api.php' : 'app/public/web.php';

?>