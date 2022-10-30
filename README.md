# Box_Game

Please read before start!!!!!
This is our 2nd semester project. Please follow those steps to run the website:

1. Using XAMPP to run the website.
2. Run server and MySQL, database script is in `BoxGame_Group04_DB.sql`.
3. Update your Composer.
4. Open file `vendor/laravel/framework/src/illuminate/database/eloquent/model.php`, change `$primaryKey = "userID"`, `$keyType = 'string'`, `$incrementing = false`.
5. Run cp `.env.example .env`.
6. Go to your .env, change `APP_NAME=BoxGame`.
7. In .env, change:
   `MAIL_MAILER=smtp` `MAIL_HOST=smtp.gmail.com` `MAIL_PORT=465 MAIL_USERNAME=xboxgamert12112e0@gmail.com` `MAIL_PASSWORD=pibnsbkuzrgyvqbx` `MAIL_ENCRYPTION=null` `MAIL_FROM_ADDRESS="xboxgamert12112e0@gmail.com` `MAIL_FROM_NAME="${APP_NAME}"`
8. In terminal, run `composer require bumbummen99/shoppingcart`.
9. Next, run `php artisan vendor:publish --provider="Gloudemans\Shoppingcart\ShoppingcartServiceProvider" --tag="config"`.
10. Run `composer require livewire/livewire`.
11. Run `php artisan key:generate`.
12. Finally, run `php artisan serve`.
