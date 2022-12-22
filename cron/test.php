#!/usr/bin/env php
<?php
$fp = fopen('tes.log', "a+");

$str = date('d-m-Y-H-i:s') . "\n";

fwrite($fp, $str);
fclose($fp);


