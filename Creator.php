<?php
class Creator
{
    public static function curl($url, $var = null)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_TIMEOUT, 25);
        if ($var != null) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
        }
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
    public static function getSztr($string, $start, $end)
    {
        $str = explode($start, $string, 2);
        $str = explode($end, $str[1], 2);
        return $str[0];
    }
    public static function socker()
    {
        $domain = array("http://www.vipsocks24.net","http://www.live-socks.net");
        $rand = rand(0, 1);
        $curl = self::curl($domain[$rand]);
        $potong = self::getSztr($curl, "<h3 class='post-title entry-title' itemprop='name'>", "</h3>");
        $potong_lagi = self::getSztr($potong, "<a href='", "'");
        $page = self::curl($potong_lagi);
        $socks = self::getSztr($page, ' wrap="hard">', '</textarea>');
        $socks = explode("\n", $socks);
        unset($socks[count($socks)-1]);
        return $socks;
    }
}

$socks = array_merge(Creator::socker(),Creator::socker(),Creator::socker(),Creator::socker(),Creator::socker(),Creator::socker());
print "Berhasil mendapatkan ".count($socks)." socks coeg :v".PHP_EOL;
`msg * Siap menjalankan :v`;
print "\n\nLog disimpan di logs.txt\n";
sleep(1);
$h = fopen('logs.txt', 'a');
$url = "https://pro-ilyasafr.c9users.io/create.php?link=http://diptacek.tk/AF/masuk&proxy=";
foreach ($socks as $key => $value) {
	print $key+1 . " | {$url}{$value}\n";
	fwrite($h, $url.$value.PHP_EOL);
	Creator::curl($url.$value);
}
fclose($h);