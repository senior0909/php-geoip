<?php
require_once __DIR__ . '/../vendor/autoload.php';

use GeoIp2\Database\Reader;

if ($argc < 1) {
    print("ERROR: This script requires target IP address as argument.\n");
    exit(1);
}

$reader = new Reader('/usr/share/GeoIP/GeoLite2-City.mmdb');

$target_ip_address = $argv[1];
$record = $reader->city($target_ip_address);

printf(
    "IP Address\t%s\nCode\t%s\nName\t%s\n",
    $target_ip_address,
    $record->country->isoCode,
    $record->country->name,
);
