<?php
error_reporting(0);
define('green',"\e[32m");
define('yellow',"\e[33m");
define('red',"\e[31m");
define('blue',"\e[34m");
define('nice',"\e[95m");
define('light',"\e[96m");
@system("clear");
echo blue."
__  __              ___        _  _        _
|  \/  |__ _ ______ |_ _|_ __  | || |___ __| |_ _ _  __ _ _ __  ___
| |\/| / _` (_-<_-<  | || '_ \ | __ / _ (_-<  _| ' \/ _` | '  \/ -_)
|_|  |_\__,_/__/__/ |___| .__/ |_||_\___/__/\__|_||_\__,_|_|_|_\___|
                        |_|
\n";
   echo yellow."[!] Coded By ./EcchiExploit [!]\n";
   echo red."[-] Open List Web (Max 5000 Web) => ";
   $web = trim(fgets(STDIN));
   $file = file_get_contents($web) or die("File Not Found");
   $exp = explode("\n",$file);
   echo light."\n\t\t[!] Total Sites To Ip    : " .count($exp)." [!]\n\n";
   $array = array_unique($exp);
   foreach($array as $http){
      if(!preg_match('#^http(s)?://#',$http)){
         $http = "http://".$http;
      }
      $parse = parse_url($http);
      $domain = preg_replace('/^www\./', '', $parse['host']);
      $www = "www.".$domain;
      $host = gethostbynamel($www);
      foreach($host as $key){
         echo green."[+] $key <== [Success]\n";
         $open = fopen("result.txt",'a+');
         fwrite($open,"$key\n");
         fclose($open);
      }
     }
     echo nice."\n\t\t{!} Auto Save As result.txt {!}\n";
?>