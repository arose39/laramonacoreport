Для запуска проекта:
1) Загрузить все зависимости (composer update и npm install)
2) В bash прописать vendor/bin/sail up

Пока убрал .env из гитигнора, для удобства запуска проекта. 

Для предоставления прав администратора использовать команду
- sail artisan assign:admin <youruseremail@email.com>

Для наполнения базі данніх пользователями пропишите:
  - sail artisan db:seed --class=UserSeeder

Можно переходить в админ панель через кнопку  в личном кабинете пользователя(localhost/dashboard) или по url localhost/adminpannel

В админке есть CRUD для зарегистрированных пользователей.

Для проведения тестов прописать команду (внимание тесты сотрут базу данных):
 - sail artisan test

 - test coverage index.html лежит в папке /coverage в корне проекта

П.С. Не стал делать отдельный env.test файл, с фековой базой данных и тд, так как в данном случае это будет излишним.

API документация по адресу:
 - http://localhost/api/v1/documentation

Или можно открыть api.yml файл в папке public/docs/openapi

API: попробуйте следующие адреса в Postman через GET method
 - http://localhost/api/v1/report
- http://localhost/api/v1/report?format=json
- http://localhost/api/v1/report?sort_order=desc&format=xml
- http://localhost/api/v1/report?sort_order=desc
- http://localhost/api/v1/report/racers
- http://localhost/api/v1/report/racers&format=xml
- http://localhost/api/v1/report/racers?sort_order=desc
- http://localhost/api/v1/report/racers/id=EOF
- http://localhost/api/v1/report/racers/id=KMH?sort_order=desc&format=xml
