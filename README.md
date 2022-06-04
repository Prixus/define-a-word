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
λ docker-compose build
λ docker-compose up -d
```
4. After the building the docker images, run this command to update the app dependencies.
```
λ docker-compose exec --user root define-a-word-app composer install
```
5. Setup the app configurations by following this command. This copy the sample ENV file into our current ENV file.
```
λ cp src/.env.example src/.env
```