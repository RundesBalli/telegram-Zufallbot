<?php
/**
 * telegram Zufallbot
 * 
 * @author    RundesBalli <webspam@rundesballi.com>
 * @copyright 2020 RundesBalli
 * @see       https://github.com/RundesBalli/telegram-Zufallbot
 * @version   1.0
 * @license   MIT-License
 */

/**
 * Einbinden der Konfigurationsdatei.
 */
require_once(__DIR__.DIRECTORY_SEPARATOR."config.php");

/**
 * Einbinden der Funktionsdatei.
 */
require_once(__DIR__.DIRECTORY_SEPARATOR."functions.php");

/**
 * Zeitzone
 */
date_default_timezone_set("Europe/Berlin");

/**
 * Input von Telegram auffangen.
 */
$content = file_get_contents("php://input");
$response = json_decode($content, true);
if(empty($response)) {
  die();
}

/**
 * Emoji-Konstanten
 */
const EMOJI_DICE = "\xF0\x9F\x8E\xB2";
const EMOJI_NUMBERS = "\xF0\x9F\x94\xA2";
const EMOJI_LETTERS = "\xF0\x9F\x94\xA0";
const EMOJI_THUMBSUP = "\xF0\x9F\x91\x8D";
const EMOJI_THUMBSDOWN = "\xF0\x9F\x91\x8E";
const EMOJI_INFORMATION = "\xE2\x84\xB9";

/**
 * Hilfetext
 */
$helptext = EMOJI_DICE." *Zufallbot-Befehle:* ".EMOJI_DICE."\n".
"/hilfe - zeigt diese Hilfe an\n".
"\n".
EMOJI_NUMBERS." *Zufallszahlen:*\n".
"/z - 1-100\n".
"/z6 - 1-6\n".
"/z10 - 1-10\n".
"/z`xxx` - 1-`xxx`\n".
"\n".
EMOJI_THUMBSUP." ".EMOJI_THUMBSDOWN." *Ja oder Nein:*\n".
"/jn\n".
"\n".
EMOJI_LETTERS." *Buchstaben:*\n".
"/b - A-Z\n".
"\n".
EMOJI_INFORMATION." *Infos:*\n".
"Bot erstellt von [RundesBalli.com](https://RundesBalli.com).\n".
"Quellcode bei [GitHub](https://github.com/RundesBalli/telegram-Zufallbot).";

/**
 * Prüfung der Eingabe und matchen des übergebenen Befehls.
 */
if(preg_match("/\/(?'action'hilfe|jn|z(?=(?'range'[1-9]\d{1,9}|[2-9]))?|b|start)/i", $response['message']['text'], $match) !== 1) {
  SendMessageToTelegram($helptext, $response['message']['chat']['id'], TRUE);
  die();
}
$action = $match['action'];

/**
 * Generiere Zufallszahl
 * 
 * Wenn keine Range übergeben wurde oder diese ungültig war, dann wird eine Zahl zwischen 1 und 100 ausgegeben
 */
if($action == "z") {
  SendMessageToTelegram(random_int(1, (empty($match['range']) ? 100 : intval($match['range']))), $response['message']['chat']['id'], TRUE);
  die();
}

/**
 * Generiere zufälligen Buchstaben
 * ASCII65 (großes A) bis ASCII90 (großes Z)
 */
if($action == "b") {
  SendMessageToTelegram(chr(random_int(65, 90)), $response['message']['chat']['id'], TRUE);
  die();
}

/**
 * Hilfetext bei "start" oder "hilfe"
 */
if($action == "hilfe" OR $action == "start") {
  SendMessageToTelegram($helptext, $response['message']['chat']['id'], TRUE);
  die();
}

/**
 * Ja oder Nein
 */
if($action == "jn") {
  SendMessageToTelegram((random_int(0, 1) == 1 ? EMOJI_THUMBSUP." JA" : EMOJI_THUMBSDOWN." NEIN"), $response['message']['chat']['id'], TRUE);
  die();
}
?>
