@servers(['web' => 'pi@www.erivandosena.com.br'])

@setup
   $path = '/var/www/laravel'
@endsetup

@story('deploy')
    git
    composer
    config
    route
    restart
@endstory

@task('git')
    cd {{ $path }}

    git reset --hard origin/master
    git pull origin master
@endtask

@task('composer')
    cd {{ $path }}

    composer install --optimize-autoloader --no-dev
@endtask

@task('config')
    cd {{ $path }}

    #php artisan config:cache
@endtask

@task('route')
   cd {{ $path }}

   php artisan route:cache
@endtask

@task('restart')
   /etc/init.d/php7.3-fpm restart
@endtask
