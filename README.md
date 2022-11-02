# Box_Game

Please read before start!!!!!
This is our 2nd semester project. Please follow those steps to run the website:
Documentation can be found here BoxGame_Group04_MidtermSubmit.pdf

1. Using XAMPP to run the website.
2. Run server and MySQL, database script is in `BoxGame_Group04_DB.sql`.
3. Update your Composer.
4. Open file `vendor/laravel/framework/src/illuminate/database/eloquent/model.php`, change `$primaryKey = "userID"`, `$keyType = 'string'`, `$incrementing = false`.
5. Run cp `.env.example .env`.
6. Go to your .env, change `APP_NAME=BoxGame`.
7. In .env, change:
   `MAIL_MAILER=smtp`
   `MAIL_HOST=smtp.gmail.com`
   `MAIL_PORT=465`
   `MAIL_USERNAME= "your email"`
   `MAIL_PASSWORD= "your application password"`
   `MAIL_ENCRYPTION=null`
   `MAIL_FROM_ADDRESS="your email"`
   `MAIL_FROM_NAME="${APP_NAME}"`
8. In terminal, run `composer require bumbummen99/shoppingcart`.
9. Next, run `php artisan vendor:publish --provider="Gloudemans\Shoppingcart\ShoppingcartServiceProvider" --tag="config"`.
10. Run `composer require livewire/livewire`.
11. Run `php artisan key:generate`.
12. In terminal, run `composer require srmklive/paypal:~3.0`.
13. Run `php artisan vendor:publish --provider "Srmklive\PayPal\Providers\PayPalServiceProvider"`
14. In .env, add:
    `#PayPal API Mode`
    `#Values: sandbox or live (Default: live)`
    `PAYPAL_MODE=sandbox`

    `#PayPal Setting & API Credentials - sandbox`
    `PAYPAL_SANDBOX_CLIENT_ID=AfhvgFWMucHa47s_kR3z6YG-4m2cVW3CGcr1rEMlCyZUEXnydt0IevhjjayttiDOmsRK74ptUMRpRoan`
    `PAYPAL_SANDBOX_CLIENT_SECRET=EMadAb9_BwyNpMqnMPzk6e85VpJYc5xn5iWVn7j9VsWNpuIx7f3NV4eByFJMGN-iwttC0WkevQXrl5Ib`
15. Account and password paypal to use
    `customerboxgame@personal.example.com`
    `12345678`
16. Finally, run `php artisan serve`.
    Warning: Don't click the link in footer :))))
