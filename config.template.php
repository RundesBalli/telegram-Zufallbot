<?php
/**
 * config.php
 * 
 * Konfiguration für den Bot
 */

/**
 * Das API Token welches man vom Telegram Bot "@BotFather" bei der Registrierung seines Bots bekommt.
 * 
 * Beispielwert: 000000000:AAAAAAAAAAAAAAAAAAAA-_0000000000
 * 
 * @var string
 */
$apiToken = "";

/**
 * Die IPv4-Adresse oder das Interface das für die ausgehende Verbindung genutzt werden soll.
 * Das Interface kann per Shell mit "sudo ifconfig" herausgefunden werden.
 * Wird das Script im Heimnetzwerk ausgeführt, so muss die interne Netzwerkadresse angegeben werden.
 * 
 * Beispielwerte:
 * - 1.2.3.4
 * - eth0
 * - 192.168.178.20 (nur lokaler PC / Heimnetzwerk)
 * 
 * @var string
 */
$bindTo = "";

/**
 * Der Useragent der an Telegram gesendet wird.
 * 
 * Beispielwert: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0
 * oder          Heinrichs lustige Datenkrake
 * 
 * @var string
 */
$telegamUseragent = "";
?>
