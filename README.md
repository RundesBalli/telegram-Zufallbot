# :game_die: telegram-Zufallbot
Generiert Zufallsdaten und schickt sie an den anfragenden Telegram-Clienten

## :desktop_computer: Selbst einrichten
- Bot beim [Botfather](https://t.me/BotFather) erstellen
- [Webhook eirichten](https://core.telegram.org/bots/api#setwebhook)
- `config.template.php` in `config.php` umbenennen
- Variablen in der `config.php` ausfüllen
- Fertig.

## :page_with_curl: Funktionen
Der Bot kann:
- Zufallszahlen
- Ja/Nein
- Zufallsbuchstaben

## :keyboard: Beispielaufrufe
- `/z` - Zufallszahl zwischen 1 und 100
- `/z10` - Zufallszahl zwischen 1 und 10
- `/z12345` - Zufallszahl zwischen 1 und 12345
- `/jn` - Ja oder Nein
- `/b` - Zufallsbuchstabe A-Z
