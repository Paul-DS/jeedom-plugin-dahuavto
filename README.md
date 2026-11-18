# Jeedom Dahua VTO plugin

Jeedom plugin used to communicate with a Dahua VTO

## Access methods

On each door opening, the plugin fills these info commands:

- `Méthode ouverture`: `Method` code sent by the VTO (see table below)
- `Utilisateur ID`: user who opened the door (empty for exit button, remote opening...)

They are updated before `Porte 1` / `Porte 2`, so a scenario triggered by the door can read them.

| Code | Method | Checked on |
|---|---|---|
| 0 | Code | |
| 1 | Card | VTO2211G |
| 2 | Card + code | |
| 3 | Code + card | |
| 4 | Remote (Jeedom command, app, indoor monitor...) | VTO2211G |
| 5 | Exit button | VTO2211G |
| 6 | Fingerprint | |
| 15 | Face | |

Unchecked codes may vary depending on the model and firmware.
