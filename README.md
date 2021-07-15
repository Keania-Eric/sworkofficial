# Steps to run the project

This project is a laravel 8 project and runs on laravel sail so ensure you have docker installed on your machine.

 1. Clone into the repository `git clone https://github.com/Keania-Eric/sworkofficial.git`
 2. Copy the parameters in .env.example file into .env do this while in the project root dir  `cp .env.example .env`
 3.  Go through the database credentials and ensure they are appropriate and change the DB_HOST to mysql `DB_HOST=mysql`
 4. To install laravel sail into the project simply paste the code below into the terminal [Follow this link to see the documentation](https://laravel.com/docs/8.x/sail#installing-sail-into-existing-applications)
 5. Start laravel sail `vendor/bin/sail up`
 6. Run all migrations `vendor/bin/sail artisan migrate`

Admin Login Credentials (This we will change later)
Email : `administrator@brackets.sk`
password: `73HuYHOYkS`


