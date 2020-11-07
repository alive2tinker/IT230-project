# IT230 Homework Assignment
To view this project and enjoy it on your local machine, kindly do the following

- clone the project
` git clone https://github.com/alive2tinker/IT230-project.git`

- change directory to project's directory then run the following command
` composer install`

- setup project environment and generate keys
`cp .env.example .env && php artisan key:generate`

- after setting up database credentials, you may want to seed the database
`php artisan migrate --seed`

- register a new user to have view everything in the site