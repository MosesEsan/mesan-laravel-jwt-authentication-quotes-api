# Laravel 5.4 JWT-Powered Mobile App API

This API was built for the Quotes app at the repo below.

<a href="https://github.com/MosesEsan/mesan-react-native-redux-quotes-app" target="_blank">React Native/Redux Quotes App </a>

### Tutorial

<ul>
  <li><a href="#step1">Step 1: Create new project and install jwt-auth</a></li>
  <li><a href="#step2">Step 2: Add JWT Provider and Facades</a></li>
  <li><a href="#step3">Step 3: Set Up Routes</a></li>
  <li><a href="#step4">Step 4:  Set Up Database</a></li>
  <li><a href="#step5">Step 5: Register and Verify Email Address</a></li>
  <li><a href="#step6">Step 6: Log User In and Out</a></li>
  <li><a href="#step7">Step 7: Recover Password</a></li>
  <li><a href="#step8">Step 8: Testing</a></li>
</ul>

<a name="step1"></a>
### Step 1: Create new project and install jwt-auth

Create Laravel project
```bash
laravel new JWTAuthentication
```
Open composer.json and update the require object to include jwt-auth 

```php
"require": {
    "php": ">=5.6.4",
    "laravel/framework": "5.4.*",
    "laravel/tinker": "~1.0",
    "tymon/jwt-auth": "0.5.*"
}
```
 Then, run 
```bash
composer update 
```

<a name="step2"></a>
### Step 2: Add JWT Provider and Facades
 
We’ll now need to update the providers array in config/app.php with the jwt-auth provider. Open up config/app.php, find the providers array located on line 138 and add this to it:

```php
Tymon\JWTAuth\Providers\JWTAuthServiceProvider::class, 

```
Add in the jwt-auth facades which we can do in config/app.php. Find the aliases array and add these facades to it:

```php
'JWTAuth'   => Tymon\JWTAuth\Facades\JWTAuth::class, 
'JWTFactory' => Tymon\JWTAuth\Facades\JWTFactory::class 
 
```
We also need to publish the assets for this package. From the command line: 
 
```bash
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\JWTAuthServiceProvider" 
 
```
 
After you run this command you will see a new file in the config folder called jwt.php. This file contains settings for jwt-auth, one of which we need to change right away. We need to generate a secret key which we can do from the command line: 
```bash
php artisan jwt:generate 
 
```

You’ll see that after running this command we get a new value next to’secret’ where “changeme” was before.

Register the jwt.auth and jwt.refresh middleware in app/http/Kernel.php
 
 ```php
 protected $routeMiddleware = [
 ...
     'jwt.auth' => 'Tymon\JWTAuth\Middleware\GetUserFromToken',
     'jwt.refresh' => 'Tymon\JWTAuth\Middleware\RefreshToken',
 ];
 ```

<a name="step3"></a>
### Step 3: Set Up Routes

Open up routes/api.php.

```php
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');
});
```

<a name="step4"></a>
### Step 4: Set Up Database

Since we are going to allow users to create their accounts within the application, we will need a table to store all of our users. Thankfully, Laravel already ships with a migration to create a basic users table, so we do not need to manually generate one. The default migration for the users table is located in the database/migrations directory.

We need to add an extra column to the users table. 

Available on my <a href="https://medium.com/@mosesesan/tutorial-4-how-to-build-a-laravel-5-4-jwt-powered-mobile-app-api-4c59109d35f" target="_blank">blog</a>.

<a name="step5"></a>
### Step 5: Register

Available on my <a href="https://medium.com/@mosesesan/tutorial-4-how-to-build-a-laravel-5-4-jwt-powered-mobile-app-api-4c59109d35f" target="_blank">blog</a>.

<a name="step6"></a>
### Step 6: Log User In and Out

Available on my <a href="https://medium.com/@mosesesan/tutorial-4-how-to-build-a-laravel-5-4-jwt-powered-mobile-app-api-4c59109d35f" target="_blank">blog</a>.

<a name="step7"></a>
### Step 7: Recover Password

Available on my <a href="https://medium.com/@mosesesan/tutorial-4-how-to-build-a-laravel-5-4-jwt-powered-mobile-app-api-4c59109d35f" target="_blank">blog</a>.

<a name="step8"></a>
### Step 8: Testing

Available on my  <a href="https://medium.com/@mosesesan/tutorial-4-how-to-build-a-laravel-5-4-jwt-powered-mobile-app-api-4c59109d35f" target="_blank">blog</a>.
