# Automotive Dealership App
![Screenshot #1](/screenshots/1.png?raw=true "Screenshot #1")
Automotive Dealership App is project written in **PHP** ***Laravel*** web application framework using *Blade* template engine.

Configurable platform for automotive dealership companies. Customers can sell their vehicles directly through platform by filling required information which are then received by the company owner.

Owner can advertise products by choosing manufacturer, model, link to *Blocket* ad and picture which are then shown on the home page. 

## Requirements

### Laravel
Check latest official instructions on how to install Laravel on your system.
https://laravel.com/docs/8.x/installation

### Composer
Make sure that PHP package manager called *composer* is installed on your system. You can install composer for your operating system with instructions provided on their website.
https://getcomposer.org/

### Web application stack *(not required with latest version of Laravel)**
You need to have [Apache](https://httpd.apache.org/), [PHP](https://www.php.net/), [MariaDB](https://mariadb.org/) or [MySQL](https://www.mysql.com/) installed in order to run Laravel applications. Check out latest [instructions](https://laravel.com/docs/7.x) on how to run this application on your system.

**WAMP** (**W**indows, **A**pache, **M**ySQL, **P**HP) is a stack for Windows operating system. Windows users can download *WampServer*.
https://www.wampserver.com/en/

**MAMP** (**M**acOS, **A**pache, **M**ySQL, **P**HP) is a stack for MacOS. MacOS users can install *MAMP & MAMP PRO*.
https://www.mamp.info/en/downloads/

**LAMP** (**L**inux, **A**pache, **M**ySQL, **P**HP) is a stack for Linux operating system. Depending on your distribution, instructions may vary and different tutorials can be found on internet. 

## Database
*Automotive Dealership App* requires database in order to store and retrieve information. There are few options available according to Laravel [documentation](https://laravel.com/docs/8.x/database) but easiest way to setup one is to use phpMyAdmin web interface with MySQL. Create new user and database and make sure to grant all permissions for recently created user. 

Check official instruction on how to access [phpMyAdmin](https://docs.phpmyadmin.net/en/latest/) make sure that your local development server is running.

## Installation



Clone this repository and change working directory.
```bash
git clone https://github.com/sini6a/automotive-dealership-app && cd automotive-dealership-app
```

Install dependencies.
```bash
composer install
```

Copy *env.example* to *.env*.
```bash
cp env.example .env
```


## Configuration and migration

After you have copied example file modify *.env* with your database credentials and fill out other data.
```bash
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=saleyourcar
DB_USERNAME=saleyourcar
DB_PASSWORD=saleyourcar

# Sell your car form
RECAPTCHA_SITE_KEY= # Google ReCaptcha Site Key
RECAPTCHA_SECRET_KEY= # Google ReCaptcha Secret Key

# Custom variables for company information
COMPANY_ADDRESS=
COMPANY_PHONE=
COMPANY_MAIL=
COMPANY_WORKING_HOURS_MONDAY_TO_FRIDAY= # "10.00 - 15.00"
COMPANY_WORKING_HOURS_SATURDAY= # "10.00 - 15.00"
COMPANY_WORKING_HOURS_SUNDAY= # "10.00 - 15.00"
...
```

Generate application keys.
```
php artisan key:generate
```

Run the migrations before jumping to next step.
```
php artisan migrate:fresh
```

## Usage

Start the local development server.
```bash
php artisan serve
```

Navigate your browser to following address.
```url
http://localhost:8000
```

## Screenshots

![Screenshot #2](/screenshots/2.png?raw=true "Screenshot #2")
![Screenshot #3](/screenshots/3.png?raw=true "Screenshot #3")
![Screenshot #4](/screenshots/4.png?raw=true "Screenshot #4")
![Screenshot #5](/screenshots/5.png?raw=true "Screenshot #5")
![Screenshot #6](/screenshots/6.png?raw=true "Screenshot #6")
![Screenshot #7](/screenshots/7.png?raw=true "Screenshot #7")
![Screenshot #8](/screenshots/8.png?raw=true "Screenshot #8")

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](LICENCE.md)
