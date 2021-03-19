# Projet Léo MVC Vélo

Projet fait entierement en PHP Fromscratch ou le but était de créer un MVC permettant de se connecter et de pouvoir gérer le CRUD de gesion de vélos.

## Login : 
La page d'entée est une page de login, le formulaire vérifie si le couple username/password existe dans le base de donées. Si c'est le cas vous êtes redirigez vers la liste des vélos.
### Logout
Permet de supprimer la session et redirige vers la page login

## Liste des vélos :
C'est la page principale du site,elle est accessible uniquement si l'utilisateur est connécté, elle liste tous les vélos qui ont été enregisté sur le site, un moteur de recherche est disponible et permet la combinaisons de plusieurs paramètres.
#### Supprimer un velo:
Grace au bouton supprimer la fonction utilise l'id du vélo pour le supprimer dans la base de données.

## Ajout d'un vélo : 
Page formulaire qui pérmet d'inserer un vélo dans la base de données, l'id est généré automatiquement avec l'auto-incrément.

## Modifier un vélo :
Page formulaire permettant de récupérer les données d'un vélo grâce à son id, de les modifier et de changer ses valeurs dans la base de données.

 
### Développeur
- Léo DEMET
