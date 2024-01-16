[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/YbKxHPdJ)

# Introduction

Ca roule ma poule est une application qui permet de louer des véhicules.

# Features

List the key features of your project.

## login 
permet de s'identifier sur le site et d'avoir accés au panel admin si vous avez le grade admin ou de pouvoir utiliser le site en tant que client

## filtrer
permet de filtrer les vehicules par diverses fonctionnalités : Brand, Color, Places, Price

## résa
permet de réserver des jours complets pour la location de vehicule.  
la reservation est en état "0" tant qu'elle n'est pas payée.

## payment
permet de finaliser votre commande et de bloquer les jours choisis.
le paiement n'utilise pas Stripe, mais lle bouton de paiement simule un paiement direct et passe la reservation en état "1" (=payée)

## Back office
permet de voir vos données ainsi que de les ajouter, les modifier, les supprimer
Fonctionne sur les brands, colors, places, avis(partiellment), vehicules


# Installation
Provide step-by-step instructions on how to install your project.

## Installation des scripts
- Télécharger et installer Laragon.
- Télécharger le zip du projet l'extraire dans le dossier www de laragon. 


## Initialisation Database
Près de l'horloge, ouvrez le panneau des programmes en arrière plan.
- Faites clique droit sur Laragon et selectionnez le menu MySQL puis HeidiSQL.
- Cliquez sur [Ouvrir], puis faites clique droit tout en haut de l'arborescence, puis selectionnez Créer un nouvelle > base de données
- Saisir un nom de base de données et cliquez sur OK.
- Selectionnez votre base de données, puis importer les données dans votre database, en utilisant le menu Fichier > Executer un fichier sql
- Selectionné le fichier : C:\laragon\www\php-Yayoaka\src\App\Core\database.sql , puis cliquez sur [Ouvrir]

- Ensuite pour se connecter a la base de donnée il vous faudra renseigner le nom de la bdd dans le script src/publicAction.php à la ligne 43  :

  `$pdo = $config->connectDB("mydatabasename");`

- et renseigner les informations de connexion a la bdd dans le fichier src/app/core/config.php :

	 `$dsn = 'mysql:dbname=' . $currentDb . ';host=localhost;port=3306';
		$user = 'root';
		$password = '';`


# Getting Started
how to get your project up and running.
http://localhost/php-Yayoaka/src/public

lancer votre serveur et naviguer jusqu'a l'url du site

# Prerequisites
Logiciel Laragon installé et démarré

# Usage


## Menu Header :
- Home : retour a la page d'accueil
- My Account : acces au compte utilisateur (connecté)
- Login : se connecter avec un compte/mot de passe 
- Logout : se deconnecter  (connecté)
- Admin access : voir le panel admin (connecté avec un compte admin)

## Home :
- liste des véhicules
- filtrer véhicules
- cliquer pour voir un véhicule
- add en favori un véhicule (connecté)

![image](https://github.com/B2-Info-23-24/php-Yayoaka/assets/76622183/2a5a5ae4-67ea-422d-bf32-dde2ca461b23)


## produit :
- add favori
- infos véhicules
- agenda de reservation (connecté) avec bouton de reservation

## Reservation
- panier de la reservation
- affichage des tarifs et des dates selectionnées
- bouton de paiement
	
## paiement :
payer les reservations de location vehicule
- passe la reservation en état "1"
(seules les reservations en état "1" sont en rouge(indisponible) dans l'agenda)

## My Account :
- infos user
- mes reservations payées et non-payées
- voir ses favoris


## Admin :
Gestion complete (CRUD) des brand / color / place / vehicule / avis(partial) / user

Les données de comptes utilisateur préconfigurés contiennent deux user, le premier à le grade admin qui lui permet d'utiliser le panel admin 
avec l'identifiant lucas et le mot de passe aaaa et le second user permet de tester le site sans le grade admin 
avec l'identifiant user et mot de passe aaa
