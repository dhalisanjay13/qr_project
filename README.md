1. Install Imageick
https://mlocati.github.io/articles/php-windows-imagick.html

- Copy __.env.example__ file to __.env__ and edit database credentials and smtp credentials
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- Run __php artisan storage:link__
