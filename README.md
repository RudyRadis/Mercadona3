# Mercadona

## Pour commencer

!!!!! Ce projet est un sujet d'examen dans le cadre d'une formation en développement web. Tout éléments de contexte à caractère commerciale n'est que pure fiction. !!!!!

Mercadona est une application web pour la société de distribution Mercadona. Elle est hébergée sur Heroku. Elle permet à l'utilisateur de consulter le catalogue des produits Mercadona.

L'utilisateur peut trier les produits par prix et les filtrer par catégories. Il peut également consulter les prix des produits et vérifier si ces derniers sont en promotion.

Cette application dispose d'un back-office pour que l'administrateur puisse mettre à jour le catalogue. Il peut donc ajouter, modifier ou supprimer un produit.

### Pré-requis

Ce qu'il est requis pour modifier ce projet :

- Votre IDE préféré
- PostgreSQL
- Symfony
- PHPUnit
- NodeJS
- Heroku

### Installation

1) Initialisation d'un projet node js :
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


## Tests

Pour exécuter les tests, utiliser la commande `php bin/phpunit`.

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

* [Lien du tutoriel d'utilisation] (https://docs.google.com/document/d/1ja1XmzyQ9yDrJDYEL3kiIELbyTU0PqpU/edit?usp=drive_link&ouid=115802809323817182028&rtpof=true&sd=true)

## Versions

**Dernière version :** 1.0.0-alpha

## Auteurs

* **Rudy Frassin** _alias_ [@outout14](https://github.com/RudyRadis)

## License

Ce projet est sous licence ``proprietary``

## Contact

Rudy Frassin - email@example.com
