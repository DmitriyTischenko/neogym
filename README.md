<h1>Запуск на локальном сервере</h1>
<p>
    Для запуска на локалке на устройстве должен быть установлен php 8.2+
</p>
<p> Запуск сервера производится командой php artisan storage:link и php artisan serve из корневой директивы проекта, в терминале появится ссылка на локальный сервер. Также должна быть запущена команда npm install и npm run dev.</p>

<h1>Хостинг</h1>
<p> Проект готов к хостингу. Так как сайт не предполагает под собой плотной нагрузки, проект рассчитан на загрузку на один домен (без саб доменов для бэка)</p>
<p>Для загрузки проекта необходимо создать бд на хостинге, изменить файл .env (скопировать данные env.example, вставить в .env, и заполнить пустые поля), загрузить все файлы на домен. Также необходимо произвести миграции в бд. Выполняется командой php artisan migrate, способ открытия терминала/ произведения миграций зависит от хостинга, возможно придется уточнить.</p>
<p>Необходимо создать ссылку из public/ в storage/app/public/. Ссылку назвать storage</p>
<h3>Чтобы попасть в админку, необходимо прописать в поисковой строке: _Домен_/admin/_любой текст_. Затем залогиниться.</h3>
<p></p>Чтобы создать админа нужно перейти по адресу _Домен_/admin/administrators/create, после того как создали админа, нужно закрыть доступ к данному адресу, нужно в resources/js/components/Admin/administrators/Create.vue вместо в методе submitAdmin() вместо axios поставить api. В api.php Route::post('/administrators', \App\Http\Controllers\Admin\Administrators\StoreController::class);
перенести в Route::group(['middleware' => 'jwt.auth'], function () {});. Также в router.js path: '/admin/administrators/create' meta: { requiresAuth: false } - false поменять на true </p>
<p>Также в папке cd /var/www/neogym/storage/app/public нужно создать папку images командой - sudo mkdir images</p>

<p>Шаблон был взят с сайта Free Html Templates https://html.design/</p>
