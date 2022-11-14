<?php

require 'vendor/autoload.php';

$console = new \Fortek\Console\Console();

$imie = $console->ask('Jak masz na [color=magenta]imie[/color]?', 'Kamil');
$wiek = (int) $console->ask('Ile masz [color=magenta]lat[/color]?', 69);

$console->print("O kurde, [color=blue]siema {$wiek}-letni {$imie}[/color]");

if ($wiek <= 50) {
    $console->print("[background=green] OK [/background]");
} else {
    $console->print("[background=red] ZA STARY [/background]");
}
