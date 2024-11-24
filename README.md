This is a basic crm system which contains following specifications;

->The task contains 4 modules: User, Post, Contact and Article.

->Voyager- Admin panel has been implemented for dashboard of admin as well as normal users.

->homepage or landing page contains all the posts fetched from DB 'posts'.

->contact page contains a form where users can submit their questions and queries.

->onces registered, a user could access voyager-login panel to browse its contents through voyager dashboard and can add new post, edit and delete the self created ones.

->News published shows the articles published strictly by the admin only.




The project is built in this environment dependencies;

->Composer version 2.8.1

->XAMPP for windows with PHP 8.2.12 

->MySql

->Laravel 11

->Postman 11.20.0



API intergration

->on the Article model, the RestAPI routes have been created and endpoints were tested using the Postman software.

->Laravel CRUD API 



To run the project:

1. clone from git
   
2. create db in phpmyadmin with name: crm-system
   {if you want to create a new db of any name, just configure that in your .env file}
   
3. run migrations: php artisan migrate
   
4. php artisan serve
   
5. voyager:
   admin login: email:admin@admin.com  password: password
   
6. all the images used in are placed in a folder inside project directory named as images.


THANK YOU for reading!!

