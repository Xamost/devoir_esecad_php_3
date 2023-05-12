# DEVOIR PHP 4 : PHP intermediaite

## Organisation du projet : 

- Racine : 
  - Index.php *(entrée avec login)*
  - Dossier : 
    - css :
      - master.css
      - normalize.css
    - page:
      - recherche.php *(page de recherche avec historique de recherche)*
      - ville.php *(Page de la recherche utilisateur généré à partir de la base de donnée)*
    - script :
      - functions.php *(mini librairie de fonction)*
      - login.php *(script d'authentification)*
      - logout.php *(script de déconnection)*
      - search.php *(le script moteur de recherche avec enregistrement de l'historique utilisateur)*

## Organisation de la base de donnée :

- **php_intermediaire_1 :**
  - city :
    - city_id *(int auto_increment, PRIMARY)*
    - city_name *(text)*
    - city_size *(int)*
    - city_habitants *(text)*
    - city_description *(text)*
  - search :
    - search_id *(int auto_increment, PRIMARY)*
    - user_id *(int)*
    - ville_id *(int)*
  - user :
    - user_id *(int auto_increment, PRIMARY)*
    - user_name *(text)*
    - user_password *(text)*