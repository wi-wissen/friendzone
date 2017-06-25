##friendzone - a social network is rising

**Source code and install instructions are in English. Documentation and excersices currently are available in German only.**

friendzone is a social network for educational purpose only. Students can create their own social network as a database admin. They learn basics about working in a software project, creating and managing a database, querying (SQL SELECT) and editing (SQL INSERT, UPDATE and DELETE).
This project aims to help students develop a general technical understanding of social networks. As result, they will be able to discuss sinjects as big data and information privacy.

Live Demo: https://friendzone.wi-wissen.de/
Read more (only in German): https://blog.wi-wissen.de/tag/friendzone

###Standing on the shoulders of giants

Many thanks and respect to:

- [MySQL](https://www.mysql.com/)
- [php](http://php.net/)
- [Laravel](https://laravel.com/)
	- [laracasts/flash](https://github.com/laracasts/flash)
	- [rap2hpoutre/laravel-log-viewer](https://github.com/rap2hpoutre/laravel-log-viewer)
	- [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
	- [gbrock/laravel-table ](https://github.com/gbrock/laravel-table)
- [Bootstrap](http://bootstrap.com/)
- [jQuery](https://jquery.com/) with [Backstretch](https://github.com/jquery-backstretch/jquery-backstretch)
- Kitten image by [Nicolas Suzor](https://www.flickr.com/photos/nicsuzor/) (CC BY-NC-SA)
- Splash images by [unsplash.com](https://unsplash.com/) (CCO)
- Face images by [Greg Peverill-Conti](https://www.flickr.com/photos/gregpc/) (CC BY-NC-SA 2.0)

###Install

####Prerequisits 

- Download composer https://getcomposer.org/download/
- Download git https://git-scm.com/downloads

####Prerequisits for Windows users

- Download XAMMP: https://www.apachefriends.org/download.html
- (Optional) Download and extract cmder mini: https://github.com/cmderdev/cmder/releases/download/v1.1.4.1/cmder_mini.zip
- Update windows environment variable path to point to your php install folder (inside XAMMP installation dir) (here is how you can do this http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash)

####Mac Os, Ubuntu and Windows

1. Create a local database named `friendzone`  with encoding utf8_general_ci 
2. Create user `friendzone` and grant all rights on `friendzone` and for creating databases
3. cd to your local target folder and clone remote project: `git clone git://github.com/wi-wissen/friendzone.git`
4. Rename `.env.example` file to `.env`inside your project root and fill in the database information.
  (windows won't let you do that, so you have to use Notepad++ or open your console, cd your project root directory and run `mv .env.example .env` )
5. Edit `.env`
  - `APP_ENV=production`
  - `APP_DEBUG=false` - enable only temporaly for debugging!
  -  `DB_*` - if you want another database than MySQL, you have to edit source code.
  - `DB_USERNAME` - user for database
  - `DB_PASSWORD` - passwort for database
  - `MAIL_*` - mail provider for resetting passworts (admin accounts may reset passworts without sending a mail)
  - `PHPMYADMIN` - url for opening phpMyAdmin - Example: https://friendzone.wi-wissen.de/phpmyadmin
6. Open the console and cd to your project root directory
7. Run `composer install` or ```php composer.phar install```
8. Run `php artisan key:generate` 
9. Run `php artisan migrate`
10. Run `php artisan db:seed` to run seeders, if necessary.
11. Visit website and create first user.
12. In the `user` table of your database, manually set the attribute  `is_admin` to `1`. Now your user is admin and may manage other accounts.

### Contributing
Thank you for considering contributing to the friendzone! Create a pull request or contact [me](https://wi-wissen.de/contact.php).

### License
[Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)](https://creativecommons.org/licenses/by-nc-sa/4.0/)
Contact [me](https://wi-wissen.de/contact.php) if you need an other licence. 