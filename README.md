# Projet PHP Objet
* GAO Tian
* Chartier Bastien
* Delobel Gérard
* Vanloo Cyril
## Installation
##### Installation de git sur Debian
* sudo apt-get update
* sudo apt-get install git-core
* git config --global user.name "mon pseudo"
* git config --global user.email tian@example.fr
* git config --list
##### Recuperation du dossier
* git clone https://github.com/AceCerf/projet_php.git
##### Installation de sass
* npm i -g sass (si nodejs installé)
## Outils de gestion de projet
* https://www.notion.so/
* https://slack.com
#### Base de données 
* ???
## Modifications
##### Procédure de travail
Toujours travailler sur la branche dev et récupérer les éventuelles mises à jour du code avant chaque mise à jour.
Une fois la mise à jour terminée sur la branche dev, se placer sur la branche master et envoyer la modification :
* git checkout master 
* git pull
* git checkout dev
* modification du code
* git add monfichier.php
* git status
* git commit -m "ma modif"
* git checkout master 
* git merge test
* git pull 
* git push
