## define-a-word
Vue JS App that will search for the word definition.

This app uses docker for easier setup of dependencies ([Don't have docker yet? Click this link for docker setup](https://docs.docker.com/get-docker/)). To install the app in your machine, please follow the following instructions:

# Installation:
1. Clone the project.
```
λ git clone https://github.com/Prixus/define-a-word
``` 
2. Change the directory to the cloned project.
```
λ cd define-a-word
```
3. Run this commands for docker setup.
```
λ docker-compose up -d --build
```
4. After the building the docker images, run this command to update the app dependencies.
```
λ docker-compose exec app composer install
```
5. Setup the database by executing the following command. The password is `secret`. This will open the mysql instance in our docker contianer
```
λ docker-compose exec database mysql -u root -p
```
6. Create the `words` database. Make sure to exit the mysql container instance after creating the database.
```
mysql> CREATE DATABASE words;
```
7.  Setup the app configurations by following this command. This copy the sample ENV file into our current ENV file.
```
λ cp src/.env.example src/.env
```
8. Run the following commands to create the database tables.
```
λ docker-compose exec app php artisan migrate:fresh
```
9. Navigate to the src directory and execute install node modules
```
λ cd src
λ npm install
```
9. Open http://localhost:8080.