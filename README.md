Установка
composer require jarovit-moka/processing-sync

Опубликовать
php artisan vendor:publish --tag=processing-publish

В $routeMiddleware app/Http/Kernel.php добавить 
'processing_webhook' => Moka\ProcessingSync\Http\Middleware\ProcessingAuthMiddleware::class

Данные по изменению transaction, order, orderItem приходят в app/Http/Controllers/Api/Webhooks/Processing/ProcessingSyncController 

Добавить логику на сохранение в БД для каждого метода.