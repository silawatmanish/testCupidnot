In this project I have used Laravel 9 and for login and registration I have used laravel/ui package, and for designing I used bootstrap-5 and for social login I have used socialite package.
In this setup we have only one login form for both types of users (Admin and Frontend user) I manange admin user by middleware. Admin user will only one and his entry is inserted by seeder. 
Here I provide the admin credentials :
1. Email : admin@example.com
2. Password : 12345678

Also we have generated 200 dummy users with the help of factory and faker method.
In this project I have used laravel pagination.
For range silder I used Jquery-ui/slider.

**NOTE 1 :- **
Known Issue :- In this project I did not applied to show match preference percentage.
Required Configuration :- Please insert bello line of code in .env file
------------------------------------------------------------------------------------------
GOOGLE_CLIENT_ID=567694111374-2cgtffc1n6obj751sjon7rvbtu4d92od.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=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
--------------------------------------------------------------------------------------------
Please use steps for run projects :- 
1. clone from github.
2. Create database.
3. Configure .env settings. (database credentials and google client id and secret id)
4. Run command :- 
 1 composer update 
 2. php artisan migrate
 3. php artisan db:seed
 4. php artisan key:gen
 5. php artisan serve


**NOTE 2 :-**
Also at the time of login with google or register with google may be an error will occured like :-  
cURL error 60: SSL certificate problem: unable to get local issuer certificate

So please go to the path "testCupidnot\vendor\guzzlehttp\guzzle\src\Handler\CurlFactory.php" and open the file CurlFactory.php 
and change line no. 358 with code :-   

$conf[\CURLOPT_SSL_VERIFYHOST] = 0;

and change line no. 359 with code :- 

 $conf[\CURLOPT_SSL_VERIFYPEER] = false;

I think after all these configuration project will work fine.

That's it.
