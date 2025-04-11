
# IntiaAssrance

Application web de Gestion des clients et leurs assurances – chez INTIA  ASSURANCE

 ## Technologies utilisées 
 1. PHP 8.2
 2. MYSQL 8.0
 3. Symfony 7.2
 4. Composer 2.8
 5. Symfony CLI 5.11
 6. Bootstrap 5
 7. Twig
 ## Installation sans docker 
1. Clonez le projet :
   ```bash
   git clone https://github.com/adjimi-lionelle/php-fullstack-assessment.git
   cd php-fullstack-assessment
   ```
2. Configurez le fichier
    ```bash
      cp .env.example .env
    ```
3. Installer les dépendances de PHP
    ``bash
    cd .
    composer install
     ```   
4. Modifiez la ligne de connexion MYSQL en fonction de votre configuration locale
    ```bash
      DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app »
    ```      
5. Créez la base de données
   ```bash
     php bin/console doctrine:database:create
   ```
6. Appliquer les migrations de base de données
    ``bash
      php bin/console doctrine:migrations:migrate
    ```
7. Charger les fixtures
    ``bash
      php bin/console doctrine:fixture:load
    ```    
8. Lancer l'application
    ``bash
      symfony server:start
    ```   
9. Accéder à l'application
    ```bash
      http://localhost:8080
    ```  

 