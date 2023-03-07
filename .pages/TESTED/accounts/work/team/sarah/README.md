[![GitHub release](https://img.shields.io/badge/version-v1.1.1-blue.svg)](https://github.com/mariofont/PHP-Login)
# PHP-Login

Simple, easy-to-use, and database-free login system.

## How it works

* The system is coded 100% in PHP (although a minimal knowledge of HTML is required).
* The visual framework used is [Bootstrap](http://getbootstrap.com).
* There are three main pages: `login.php` shows the login form, `index.php` the default password-protected area, `logout.php` simply ends the session and `config.php`stores the user's information.

## How to use it

1. Download the source files to your computer.
2. Open `config.php` with your favorite text editor (I suggest you use [Atom](https://atom.io)) and find the variables `$Username` and `$Password`.
3. Change the username and password for your own.
4. Save the files, upload them to your webserver and give it a try.

###### EXTRA:

* If you want to password-protect any page, just add this snippet of code at the beginning of it:

```php
<?php
  session_start(); /* Starts the session */
  if($_SESSION['Active'] == false){ /* Redirects user to login.php if not logged in */
    header("location:login.php");
    exit;
  }
?>
```

## Live example

```
Username: Steve
Password: Choco2016
```

[Try it out!](http://lab.mariofont.com/php-login/index.php)

## Authors

* **Mario Font** - *Whole project* - [Twitter](https://twitter.com/mario_font)
* **Calebrw** - *Security fixes* - [GitHub](https://github.com/Calebrw)
