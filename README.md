# Mercadona

## Description

Ce projet est un sujet d'examen dans le cadre de la formation STUDI Bachelor Développeur d'applications web/mobile. Tout élément de contexte à caractère commercial n'est que pure fiction.

Mercadona est une application web conçue pour la société de distribution Mercadona. Elle est hébergée sur Heroku. Elle permet à l'utilisateur de consulter le catalogue des produits proposés par Mercadona.

L'utilisateur peut trier les produits par prix et les filtrer par catégories. Il peut également consulter les prix et vérifier si certains produits sont en promotion.

Cette application dispose d'un back-office permettant à l’administrateur de mettre à jour le catalogue : ajouter, modifier ou supprimer un produit.

Pour se connecter à l'espace Admin, l'identifiant est "Admin" et le mot de passe "12345"

Un produit comporte les éléments suivants :
- Nom
- Catégorie
- Description
- Prix
- Prix en promotion
- Date de début de la promotion
- Date de fin de la promotion
- Image

## Technologies

1. HTML  
2. CSS  
3. JavaScript  
4. PHP  
5. Symfony  
6. Heroku  
7. PostgreSQL 

### Liens

- 🌐 [Voir l'application en ligne sur Heroku](https://secret-falls-68265-e0e831d6abcf.herokuapp.com)



### Pré-requis

Ce dont vous avez besoin pour modifier ce projet :

- Votre IDE préféré (ex : VS Code)
- PostgreSQL
- Symfony
- PHPUnit
- NodeJS
- Heroku

### Installation

1) Initialisation des dépendances Node JS :
npm init

2) Charger un projet symfony déjà existant :
cd projects/
git clone ...

3) Installer les dépendances dans vendor :
cd my-project/
composer install

4) Lancer l'application
cd my-project/
symfony server:start

## Conçu avec

* [Visual Studio Code](https://code.visualstudio.com) - Éditeur de code
* [Node.js®](https://nodejs.org/en) - Environnement d'exécution
* [Symfony](https://symfony.com/) - Framework PHP (back-end)
* [PostgreSQL](http://https://www.postgresql.org/) - SGBDR

## Organisation du code pour le dossier source

Controller => gestion des controller
Entity => gestion des tables
Eventlistener => gestion des écouteurs d'évènements
Exception => gestion des exceptions
Form => gestion des formulaires
Repository => gestion des répositorys
templates => gestion des vues (fichiers html.twig)
tests => gestion des tests

## Tutoriel

* [Lien du tutoriel d'utilisation](https://docs.google.com/document/d/1ja1XmzyQ9yDrJDYEL3kiIELbyTU0PqpU/edit?usp=drive_link&ouid=115802809323817182028&rtpof=true&sd=true)

## Versions

**Dernière version :** 1.0.0

## Auteurs

* [@Rudy Frassin](https://github.com/RudyRadis)

## License

Ce projet est sous licence ``proprietary``

## Contact

Rudy Frassin - rudy.frassin@gmail.com
