# myblog

## Présentation du projet

L'objectif du projet est de créer un blog professionnel pour avoir une visibilité et convaincre les futurs employeur/clients

## Initialisation du projet

### Création de la base de donnée
```shell
  CREATE DATABASE `blog` /*!40100 DEFAULT CHARACTER SET utf8 */;
```
### Création des tables
```shell
wget https://github.com/heligonSeb/myblog/blob/main/sql/createTable.sql
```

### Ajout de donnée
```shell
wget https://github.com/heligonSeb/myblog/blob/main/sql/addData.sql
```

## Configuration du projet
Pour configurer le projet il suffit de copier le fichier config.exemple.php qui se trouve a la racine du dossier src. 
Puis de remplacer les informations à l'intérieur par vos informations.

## Lancement du serveur en local
```shell
cd public
php -S localhost:8000
```

Connectez-vous maintenant sur l'adress htpp://localhost:8000 via un navigateur