Развертывание проекта
После клонирования репозитория выполните следующие шаги:

Установите зависимости:

docker compose run composer install
Скопируйте файл .env.example в .env и заполните необходимые переменные окружения.
Данные для подключения к базе данных можно найти в docker-compose.yaml.

Запустите контейнеры:

docker compose up webserver -d
Выполните миграции и сидирование:

docker exec -it z-test-backend-app-1 php artisan migrate --seed
При необходимости замените z-test-backend-app-1 на имя вашего контейнера.

После этого проект должен быть полностью работоспособным.

Документация API
Документация доступна по адресу:

/docs/api
Сгенерирована с помощью инструмента Scramble (https://scramble.dedoc.co/).

Реализованный функционал
Обработка четырёх HTTP-запросов:

Три обязательных

Один дополнительный — загрузка CSV-файла

Написаны тесты для всех обязательных запросов
