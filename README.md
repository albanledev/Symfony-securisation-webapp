# Application Symfony avec Tests de Sécurité

Bienvenue dans mon application Symfony ! Cette application a été développée avec Symfony, un framework PHP robuste et flexible, pour fournir une plateforme web sécurisée et performante.

## Description de l'Application

Cette application Symfony a été conçue dans le but de démontrer l'implémentation de différentes méthodes de sécurité pour protéger l'application contre les vulnérabilités courantes telles que les attaques XSS, les injections SQL, les attaques CSRF, etc.

## Fonctionnalités Principales

- **Gestion des Utilisateurs :** L'application propose un système d'authentification sécurisé avec gestion des utilisateurs, incluant l'inscription, la connexion et la déconnexion des utilisateurs.
  
- **Protection des Données Sensibles :** Les données sensibles sont protégées à l'aide de techniques telles que le hachage des mots de passe, le chiffrement des données, etc.

- **Validation des Données :** Toutes les données entrées par les utilisateurs sont validées côté serveur pour éviter les attaques par injection ou les entrées malveillantes.

- **Gestion des Autorisations :** Les rôles et les autorisations sont mis en place pour limiter l'accès aux fonctionnalités sensibles de l'application.

## Tests de Sécurité

Pour garantir la sécurité de l'application, des tests de sécurité approfondis ont été réalisés, notamment :

- **Tests d'Injection SQL :** Nous avons vérifié que l'application est protégée contre les injections SQL en utilisant des requêtes préparées et des paramètres liés.

- **Tests d'Attaques XSS :** Nous avons assuré que l'application échappe correctement les données entrées par les utilisateurs pour prévenir les attaques XSS.

- **Tests d'Attaques CSRF :** Nous avons mis en place des tokens CSRF pour protéger l'application contre les attaques CSRF.

## Comment Utiliser l'Application

1. Clonez ce repository sur votre machine locale.
2. Installez les dépendances en utilisant Composer : `composer install`.
3. Configurez votre base de données dans le fichier `.env`.
4. Exécutez les migrations pour créer le schéma de base de données : `php bin/console doctrine:migrations:migrate`.
5. Lancez le serveur Symfony : `symfony server:start`.
6. Accédez à l'application dans votre navigateur en utilisant l'URL fournie par Symfony.


