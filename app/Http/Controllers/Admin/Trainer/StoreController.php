<?php

namespace App\Http\Controllers\Admin\Trainer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trainer\StoreRequest;
use App\Models\Trainer;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        // Создаем новый экземпляр ImageManager
        $manager = new ImageManager(new Driver());

        // Читаем изображение из запроса
        $img = $manager->read($data['photo']);

        // Изменяем размер изображения
        $img->resize(370, 397);

        // Сохраняем измененное изображение на диск
        // Предполагается, что вы хотите сохранить его в той же директории, но с другим именем
        $newPhotoPath = '/images/' . uniqid() . '.jpg'; // Генерируем уникальное имя файла
        $img->save(storage_path('app/public') . $newPhotoPath);

        // Обновляем путь к фото в данных
        $data['photo'] = $newPhotoPath;

        // Создаем или обновляем запись тренера
        Trainer::firstOrCreate($data);

        // Перенаправляем пользователя обратно на страницу индекса тренеров
    }
}
