# My Meetic


## Description

My Meetic est un projet web orienté Ajax, jQuery et PHP orienté objet, visant à créer un site de rencontres similaire à Meetic. Le projet peut être orienté vers la rencontre de personnes partageant des intérêts communs dans un environnement scolaire, par exemple. Le développement doit être effectué en PHP orienté objet, en utilisant les compétences acquises en HTML5/CSS, jQuery, Ajax et PHP.

## Fonctionnalités

### Partie obligatoire

- Formulaire d'inscription et de connexion accessibles aux visiteurs
- Conception soignée de la base de données
- Menu déroulant développé en jQuery sur chaque page (à l'exception des pages d'inscription et de connexion)

### Inscription / Connexion

Les informations minimales requises pour l'inscription sont :

- Nom
- Prénom
- Date de naissance (vérification de l'âge, inscription réservée aux personnes de plus de 18 ans)
- Genre (homme, femme, autre...)
- Ville
- Adresse e-mail (unique, utilisée pour la connexion)
- Mot de passe (haché, utilisé pour la connexion)
- Loisir (au moins un)

### Mon compte

La page "Mon compte" comprend :

- Un récapitulatif des informations du compte (nom, prénom, date de naissance, genre, e-mail, loisirs)
- Un gestionnaire de compte permettant de modifier le mot de passe, l'e-mail, etc.
- Une fonctionnalité permettant de supprimer définitivement le compte (sans requête de suppression sur la base de données)

### Recherche

La page de recherche permet de spécifier des filtres pour trouver des personnes :

- Genre (homme/femme/autre)
- Localisation (ville)
- Loisir (tags multiples : danse, skateboard, manga, licorne, cuisiner, autres à préciser)
- Tranche d'âge (18-25, 25-35, 35-45, 45+)

Il est possible de spécifier plusieurs villes et de combiner tous les filtres. Les résultats de la recherche sont affichés sous forme d'un carrousel développé en jQuery.

## Bonus


- Messagerie : Les membres peuvent s'envoyer des messages à travers le site. Une page de messagerie affiche les messages reçus, envoyés et supprimés, avec les informations correspondantes (date, expéditeur/destinataire, contenu).

## Installation

1. Clonez le dépôt GitHub : `git clone ce-github`
2. Incluez tous les fichiers sources nécessaires dans votre livraison, à l'exception des fichiers inutiles (binaires, temporaires, obj, etc.).
3. Commencez à utiliser le projet en suivant les instructions spécifiques à votre environnement de développement.

## Contributions

Les contributions sont les bienvenues ! Si vous souhaitez améliorer le projet, veuillez soumettre une demande de pull avec vos modifications.
