# Plugin Dahua VTO

## Appareils compatibles

Le plugin est compatible avec les modèles suivants

- VTO1220BW
- VTO2111D
- VTO3211D
- VTO2000A
- VTO2202F
- VTO3221E

Si vous rencontrez des problèmes avec votre appareil, vous pouvez [ouvrir un ticket sur ici](https://github.com/Paul-DS/jeedom-plugin-dahuavto/issues)

## Configuration du plugin

Dans la page de configuration du plugin:
- Activez le plugin
- Installer les dépendances (si besoin)
- Démarrez le démon

## Ajout d'un équipement

Ajoutez un nouvel équipement, puis saisissez son nom.
Dans la page de configuration de l'équipement, remplissez les champs `Hote` (IP de l'appareil), `Nom d'utilisateur` et `Mot de passe`.
Cliquez sur `Sauvegarder`. Si les informations saisies sont correctes, le plugin récupèrera le nom du modèle et son numéro de série, qui sera affiché à droite de la page.

## Informations disponibles

Pour le moment, le plugin permet de récupérer l'information d'appel et de dévérouillage de porte, et permet de dévérouiller la porte.

Lors de chaque ouverture, la commande `Méthode ouverture` donne le code de la méthode utilisée par le VTO :

| Code | Méthode | Vérifié sur |
|---|---|---|
| 0 | Code | |
| 1 | Badge | VTO2211G |
| 2 | Badge + code | |
| 3 | Code + badge | |
| 4 | À distance (commande Jeedom, application, moniteur...) | VTO2211G |
| 5 | Bouton de sortie | VTO2211G |
| 6 | Empreinte | |
| 15 | Visage | |

Les codes non vérifiés peuvent varier selon le modèle et le firmware. Une ouverture depuis la commande Jeedom `Déverouiller porte` donne le code 4.

La commande `Utilisateur ID` donne l'utilisateur qui a ouvert la porte. Elle est vide si l'ouverture ne le fournit pas (bouton de sortie, ouverture à distance...).

N'hésitez pas à [ouvrir un ticket sur ici](https://github.com/Paul-DS/jeedom-plugin-dahuavto/issues) si vous souhaitez accéder à d'autres fonctionnalités de l'appareil