## About Jeux De Mots

Jeux_De_Mots is an application about word games. You type word and search it. The word gets searched locally first and if it is not present in local index then it is fetched from online Word Dump. Everything about the word is fetched: its description, relations, relations to other words, and many other things along side it.

- [Online Word Dump](http://www.jeuxdemots.org).

## Architecture 

Application is divided into two modules:

- App
- MeliBlue

#### App
App Module handles the main layout of the application and application routing. Main controller are NodeController and Hoe Controller. Node Controller is called when the search is requested and it passes the control to MeliBlue module to process the request and return the result.

#### MeliBlue
MeliBlue module handles the [elasticsearch](https://www.elastic.co) and the main API to fetch the word from online word dump.

## Database or Elasticsearch
Instead of database, elasticsearch has been used to contain large amount of data and for fast search. This increases the performance of the application.

## Interface or Design
Main layout of the application is created in Vue.Js framework. Which is located in resources/js.

## Animation
Third party library has been used to create a beautiful animation onclick. It has been added to main layout page alongside main vue instance.
Its located in resources/js.

## How to make it work?

#### Pre-Requisites:
- PHP is installed
- Composer is installed
- npm is installed
- elasticsearch is installed
  - should be installed globally on the environment
  - if your are using docker or vagrant make sure to forward port 9200
  - make sure to test if its working and clusters are working properly
  - create indexes beforehand to avoid any errors
    - nodes and nodes-cache


#### Execute Followings
- composer update
- npm run install
- cp .env.example .env
- set host address for elasticsearch in
  - config/elasticblue.php including port i.e. localhost:9200
