Для запуска проекта:
1) Загрузить все зависимости (composer update и npm install)
2) В bash прописать vendor/bin/sail up
3) В bash прописать npm run dev

Пока убрал .env из гитигнора, для удобства запуска проекта. 

Для предоставления прав администратора использовать команду
- sail artisan assign:admin <youruseremail@email.com>

Для наполнения базі данніх пользователями пропишите:
  - sail artisan db:seed --class=UserSeeder


Можно переходить в админ панель через кнопку  в личном кабинете пользователя(localhost/dashboard) или по url localhost/adminpannel


