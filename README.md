# myblog

## Présentation du projet

L'objectif du projet est de créer un blog professionnel pour avoir une visibilité et convaincre les futurs employeur/clients

## Initialisation du projet

### Création de la base de donnée
```shell
mysql -u [user] -p -e "CREATE DATABASE blog;"
```
### Création des tables
```shell
mysql -u root blog -p < sql/createTable.sql
```

### Ajout de donnée
```shell
mysql -u root blog -p < sql/addData.sql
```

### Installation des dépendances
```shell
composer install
```

## Configuration du projet
Pour configurer le projet il suffit de copier le fichier ".env.exemple" qui se trouve a la racine du projet. 
Puis de remplacer les informations à l'intérieur par vos informations et de renomer le fichier en ".env".

## Lancement du serveur en local
```shell
cd public
php -S localhost:8000
```

Connectez-vous maintenant sur l'adress htpp://localhost:8000 via un navigateur
