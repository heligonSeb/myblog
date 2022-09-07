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
  -- blog.users definition

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;


-- blog.post definition

CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `intro` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `creat_date` datetime NOT NULL,
  `edit_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_UN` (`id`),
  KEY `post_FK` (`user_id`),
  CONSTRAINT `post_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;


-- blog.comments definition

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `validate` tinyint(1) DEFAULT NULL,
  `creat_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_FK` (`user_id`),
  KEY `comment_FK_1` (`post_id`),
  CONSTRAINT `comment_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `comment_FK_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
```
