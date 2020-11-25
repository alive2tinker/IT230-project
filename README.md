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

If you use the great [lando.dev](https://lando.dev/) or wish to use it with [Docker](https://www.docker.com/), kindly follow the following steps:

- install lando from their website [here](https://lando.dev)
- after finishing the installation of lando and docker, clone the repo
`git clone https://github.com/alive2tinker/IT230-project.git`
- then start the docker container by running this command
`lando start`
- then run the following command in terminal `lando abracadabra` 
