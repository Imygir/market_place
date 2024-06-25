
## Как развернуть проект

### 1. переходим в папку докер 
cd docker_t

### 2. запускаем приложение 
docker-compose up -d

### 3. заходим в контейнер php-fpm
docker-compose exec php-fpm bash

### 4. Запускаем миграции
php artisan migrate

### 5. Запускаем сиды
php artisan db:seed


#### *Для удобства тестирования через Postman делюсь своей коллекцией*
[Collection](https://drive.google.com/file/d/1eGdouwa6bQI6YtSk9fWiJHEFrK_vqfkm/view?usp=sharing)
