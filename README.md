In this project I have used Laravel 9 and for login and registration I have used laravel/ui package, and for designing I used bootstrap-5 and for social login I have used socialite package.
In this setup we have only one login form for both types of users (Admin and Frontend user) I manange admin user by middleware. Admin user will only one and his entry is inserted by seeder. 
Here I provide the admin credentials :
Email : admin@example.com
Password : 12345678
Also we have generated 200 dummy users with the help of factory and faker method.
In this project I have used laravel pagination.
For range silder I used Jquery-ui/slider.

NOTE :- 
Known Issue :- In this project I did not applied to show match preference percentage.

Please use steps for run projects :- 
1. clone from github.
2. Create database.
3. Configure .env settings.
4. Run command :- 
 1 php artisan migrate
 2. php artisan db:seed
 3. php artisan serve

That's it.
