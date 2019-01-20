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

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](http://patreon.com/taylorotwell):

- **[Vehikl](http://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Styde](https://styde.net)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
