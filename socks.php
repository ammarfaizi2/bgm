<?php
# function #
function curl($url, $var = null)
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
function getSztr($string, $start, $end)
{
    $str = explode($start, $string, 2);
    $str = explode($end, $str[1], 2);
    return $str[0];
}
function socker()
{
    $domain = array("http://www.vipsocks24.net","http://www.live-socks.net");
    $rand = rand(0, 1);
    $curl = curl($domain[$rand]);
    $potong = getSztr($curl, "<h3 class='post-title entry-title' itemprop='name'>", "</h3>");
    $potong_lagi = getSztr($potong, "<a href='", "'");
    $page = curl($potong_lagi);
    $socks = getSztr($page, ' wrap="hard">', '</textarea>');
    $socks = explode("\n", $socks);
    unset($socks[count($socks)-1]);
    return $socks;
}
