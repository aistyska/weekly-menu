# Weekly menu generator
A web application which generates a menu for the next week using your saved recipes and helps to save some time for more interesting tasks on weekends.

## General info
This is a personal project which helps to make weekly menu much faster than just using blank paper and pencil.

### Features
* Add new recipe
* Edit recipe or choose an option to exclude it from menus in the future
* Delete a recipe if it wasn't used in any menu
* Search recipe by title
* Create menu options:
  * Generate automatically
  * Get randomly selected dishes with ability to change them
  * Manually choose dishes from saved recipes
  * Choose the menu from previously used ones
* Download menu with recipes as pdf
  
#### To do:
* Categorise recipes
* Generate shopping list for the week

### Illustrations
![Weekly Menu gif](/public/img/weekly_menu.gif)

## Technologies
Project is created with:
* [Laravel 7](https://laravel.com/)
* [DOMPDF Wrapper for Laravel](https://github.com/barryvdh/laravel-dompdf)
* [Bootstrap 4](https://getbootstrap.com/)
* [SASS](https://sass-lang.com/)
* JavaScript (ES6)

## Set up instructions
1. To run this app you need to have a PHP, Composer, MySQL database, Valet and Node package manager (npm).
2. Clone this repo and navigate into the folder
```
git clone https://github.com/aistyska/weekly-menu.git
```
3. Install all the dependencies
```
composer install
npm install
```
4. Link this project to valet
```
valet link
```
5. Create environment file
```
cp .env.example .env
php artisan key:generate
```
6. Inside `.env` file update DB_DATABASE, DB_USERNAME, DB_PASSWORD parameters to your local database connection.
```
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
```
7. Run database migrations
```
php artisan migrate
```
8. That's it! You should be able to access the web through [weekly-menu.test](http://weekly-menu.test)

## Development
If you change something in `app.js` or `app.scss` do not forget to compile it.
```
npm run dev
```
