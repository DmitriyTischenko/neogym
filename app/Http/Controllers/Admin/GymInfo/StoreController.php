<?php

namespace App\Http\Controllers\Admin\GymInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\GymInfo\StoreRequest;
use App\Models\GymInfo;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        // Проверка на существование записей
        $existingRecord = GymInfo::first();

        if ($existingRecord) {
            return response()->json(['success' => false, 'message' => 'Удалите старые данные прежде чем добавлять новые'], 400);
        }

        // Создаем новую запись
        $model = new GymInfo();
        $model->location = $data['location'];
        $model->phone_number = $data['phone_number'];
        $model->email = $data['email'];

        if ($model->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Произошла ошибка при сохранении данных'], 500);
        }
    }
}
