<h1>Programming Project 1 - Group 54</h1>

<h2> Installation / Getting Started: </h2>

<b>1. Install git bash from https://gitforwindows.org/

<b>2. Install composer from https://getcomposer.org/download/
    
run the installation wizard. Once installed ensure the pathway is in the environment variables then restart the device 

<b>3. Install laravel by running the command ‘composer global require laravel/installer’ as it works with composer to install. 

It may take a few minutes then it should be installed successfully. Also, once installed ensure the pathway is in the environment variables then restart the device (optional if not already done)  

<b>4. Install xampp (apache and MySQL server)

https://www.apachefriends.org/index.html, click download to run the installation wizard. Once installed proceed to the xampp control and startup the apache and MySQL server. Then load up a web browser and should run successfully!

<b>5. Create database through phpmyadmin

Select ‘admin’ on MySQL Xampp control panel to open phpmyadmin

Select ‘New’ in PhpMyAdmin

Create database called ‘handshake’ and click create

<b>6. Generate composer files

Using git bash, run composer install to generate composer files for the project.

Important: when database schema changes are made, you must run composer-dump autoload before migrating the new schema

<b>7. Configure environment variables

In git bash create the .env file for Laravel to use during development 

cp .env.example .env

<b>8. Open the .env file in nano (or any text editor)
Edit the following lines and save the file.

DB_DATABASE= -> DB_DATABASE=handshake

DB_USERNAME=homestead -> DB_USERNAME=root

DB_PASSWORD=homestead -> DB_PASSWORD=’’

<b>9. Generate a new Application Key for Laravel to use with the application

$php artisan key:generate

<b>10. Migrate/create Tables

from project folder:

php artisan migrate:fresh

<b>11. (OPTIONAL) Seeding the database

Run php artisan db:seed command in project folder. This will create some users, job postings and employers in the recently created database.

please refer to development guide if you need picture assistance with setup

You are now ready to begin development with the system. We recommend and personally used phpstorm (https://www.jetbrains.com/phpstorm/) for development, but it is not a requirement.	
