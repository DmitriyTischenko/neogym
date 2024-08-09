<?php

namespace App\Http\Controllers\Admin\Trainer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trainer\UpdateRequest;
use App\Models\Trainer;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Trainer $trainer)
    {
        $data = $request->validated();

        Log::info('Request data:', $data);

        // Обновление данных тренера
        $trainer->name = $data['name'] ?? $trainer->name;
        $trainer->surname = $data['surname'] ?? $trainer->surname;

        // Если в запросе есть файл
        if (isset($data['photo']) && $data['photo'] instanceof \Illuminate\Http\UploadedFile) {
            // Создаем новый экземпляр ImageManager
            $manager = new ImageManager(new Driver());

            // Читаем изображение из запроса
            $img = $manager->read($data['photo']);

            // Изменяем размер изображения
            $img->resize(370, 397);

            // Сохраняем измененное изображение на диск
            $newPhotoPath = '/images/' . uniqid() . '.jpg'; // Генерируем уникальное имя файла
            $img->save(storage_path('app/public') . $newPhotoPath);

            // Обновляем путь к фото в данных
            $trainer->photo = $newPhotoPath;
        } elseif (isset($data['photo'])) {
            // Если в запросе есть строка (путь к файлу)
            $trainer->photo = $data['photo'];
        }

        $trainer->vk = $data['vk'] ?? $trainer->vk;

        Log::info('Trainer data before save:', $trainer->toArray());
        $trainer->save();
        Log::info('Trainer data after save:', $trainer->toArray());

        return response()->json($trainer);
    }
}
