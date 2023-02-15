# symfony_tp
- Un fichier .env défini les variables d'environnement pour le projet, cela permet d'avoir des variables différentes en fonction de si l'on est en environnement de dev ou de production
- La connexion à la bdd doit être changée parce que on utilise Sqlite et pas postgres
- Il y a une relation ManyToOne de Reaction à Link

- Les routes à créer seront : 
# Home : 
- /home GET : la route home
# Users :
- /user GET : voir la liste des users
- /user/{userId} GET : voir un user 
- /user/add POST : ajouter un user
- /user/update POST : éditer un user
- /user/delete GET : supprimer un user
# Links
- /links GET : voir la liste des links
- /link/{id} GET : voir un link
- /link/add POST : ajouter un link
- /link/update POST : éditer un link
- /link/delete/{id} GET : supprimer un link
# Réactions
- /reactions GET : voir la liste des réactions
- /reaction/{id} : voir une réaction
- /reaction/add POST : ajouter une réaction
- /reaction/update POST : éditer une réaction
- /reaction/delete/{id} GET : supprimer une réaction

- Le ParamConverter permet de récupérer des paramètres de la route
