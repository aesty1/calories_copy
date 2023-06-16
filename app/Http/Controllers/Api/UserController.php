<?php

namespace App\Http\Controllers\Api;

use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Product;

class UserController
{
    // Показать данные пользователя
    public function show(Request $request) {
        // Валидация fields
        if ($request->fields) {
            $fields = explode(',', $request->fields);
            $allowedValues = ['name', 'age', 'weight', 'email', 'gender', 'purpose ', 'workout', 'pace', 'purpose_weight',
                'growth', 'age', 'calories_per_day', 'created_at', 'updated_at'];

            foreach($fields as $item) {
                if (in_array($item, $allowedValues)) {
                    continue;
                } else {
                    return response()->json(['status' => 400, 'errors' => "{$item} undefined in allowed values"], 400);
                }
            }
        }

        // Валидация relationships
        if ($request->relationships) {
            $relationships = explode(',', $request->relationships);
            $allowedValues = ['history', 'products'];

            foreach($relationships as $item) {
                if (in_array($item, $allowedValues)) {
                    continue;
                } else {
                    return response()->json(['status' => 400, 'errors' => "{$item} undefined in allowed values"], 400);
                }
            }
        }

        // Получение данных пользователя
        $data = Auth::user();

        // Получение нужных полей
        if ($request->fields) {
            $fields = explode(',', $request->fields);
            $data = $data->select($fields);
        }

        // Получение связей
        if ($request->relationships) {
            $relationshipsRequest = explode(',', $request->relationships);
            $user = Auth::user();
            $relationships = [];
            foreach ($relationshipsRequest as $item) {
                switch ($item) {
                    case 'history':
                        $relationships['history'] = $user->history()->get();
                        break;
                    case 'products':
                        $relationships['products'] = $user->products()->get();
                        break;
                }
            }
        }

        return response()->json(['status' => 200, 'data' => $data->get(), 'relationships' => $relationships ?? []], 200);
    }

    public function showProduct() {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $products = $user->products()->get();
        $status = $products->count() === 0 ? 404 : 200;

        return response()->json(['status' => $status, 'data' => $products], $status);
    }

    public function storeProduct(Request $request) {
        // Валидация данных
        $request->validate([
            'name' => 'max:255',
            'carbohydrates' => 'numeric|max:32767',
            'protein' => 'numeric|max:32767',
            'fats' => 'numeric|max:32767',
            'calories' => 'numeric|max:32767',
        ]);

        $userId = Auth::user()->id;

        Product::create([
            'user_id' => $userId,
            'name' => $request->name,
            'carbohydrates' => $request->carbohydrates,
            'fats' => $request->fats,
            'protein' => $request->protein,
            'calories' => $request->calories,
        ]);

        return response()->json(['status' => 204, 'data' => 'Product create.'], 204);
    }

    public function deleteProduct($id) {
        // Валидация
        $productId = ['id' => $id];
        $validator = Validator::make($productId, [
            'id' => 'exists:products,id'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['status' => 400, 'errors' => $errors], 400);
        }

        $userId = Auth::user()->id;

        Product::where('user_id', $userId)->where('id', $id)->delete();

        return response()->json(['status' => 204, 'data' => 'Product create.'], 204);
    }

    public function showHistory(Request $request) {
        $request->validate([
            'date' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $history = $user->history()->where('date', $request->date)->first();

        // Если история за этот день пустая, вернуть все значения пустыми
        if (!$history) {
            $history = [
                'id' => null,
                'user_id' => Auth::user()->id,
                'calories' => 0,
                'carbohydrates' => 0,
                'protein' => 0,
                'fats' => 0,
                'workout_calories' => 0,
                'water' => 0,
                'date' => $request->date,
            ];
            return response()->json(['status' => 404, 'data' => $history], 200);
        }

        $products = $history->products();

        return response()->json(['status' => 200, 'data' => $history, 'relationships' => ['products' => $products->get()]], 200);
    }

    public function storeHistory(Request $request) {
        // Валидация
        $request->validate([
            'date' => 'required',
            'product_id' => 'required|numeric',
            'gram' => 'required|numeric',
            'male' => 'required',
        ]);

        $input = [$request->male];
        $allowedValues = [
            'dinner',
            'breakfast',
            'brunch',
            'lunch',
        ];

        foreach($input as $item) {
            if (in_array($item, $allowedValues)) {
                continue;
            } else {
                return response()->json(['status' => 400, 'errors' => "{$item} undefined in allowed values"], 400);
            }
        }

        // Получение данных пользователя и истории за текущий день
        $user = User::find(Auth::user()->id);
        $history = $user->history()->where('date', $request->date)->first();

        $product = Product::find($request->product_id);

        // Если истории за день не найдено, она создаётся, если найдена, обновляется
        if ($history) {
            $history->update([
                'calories' =>  ($product->calories * $request->gram) / 100 + $history->calories,
                'carbohydrates' =>  ($product->carbohydrates * $request->gram) / 100 + $history->carbohydrates,
                'protein' =>  ($product->protein * $request->gram) / 100 + $history->protein,
                'fats' =>  ($product->fats * $request->gram) / 100 + $history->fats,
            ]);
        } else {
            $history = History::create([
                'user_id' => Auth::user()->id,
                'calories' => ($product->calories * $request->gram) / 100,
                'carbohydrates' => ($product->carbohydrates * $request->gram) / 100,
                'protein' => ($product->protein * $request->gram) / 100,
                'fats' => ($product->fats * $request->gram) / 100,
                'date' => $request->date,
                'workout_calories' => 0,
                'water' => 0,
            ]);
        }

        // Добавление связи с продуктом
        $history->products()->attach($request->product_id, ['male' => $request->male, 'gram' => $request->gram]);

        return response()->json(['status' => 204], 204);
    }

    public function storeWater(Request $request) {
        // Валидация
        $request->validate([
            'date' => 'required'
        ]);

        // Получение данных пользователя и истории за текущий день
        $user = User::find(Auth::user()->id);
        $history = $user->history()->where('date', $request->date)->first();

        // Если истории за день не найдено, она создаётся, если найдена, обновляется
        if ($history) {
            $history->update([
                'water' => 1 + $history->water,
            ]);
        } else {
            History::create([
                'user_id' => Auth::user()->id,
                'calories' => 0,
                'carbohydrates' => 0,
                'protein' => 0,
                'fats' => 0,
                'date' => $request->date,
                'workout_calories' => 0,
                'water' => 1,
            ]);
        }

        return response()->json(['status' => 204], 204);
    }

    public function storeWorkout(Request $request) {
        // Валидация
        $request->validate([
            'date' => 'required',
            'workout_calories' => 'required|numeric'
        ]);

        // Получение данных пользователя и истории за текущий день
        $user = User::find(Auth::user()->id);
        $history = $user->history()->where('date', $request->date)->first();

        // Если истории за день не найдено, она создаётся, если найдена, обновляется
        if ($history) {
            $history->update([
                'workout_calories' => $request->workout_calories + $history->workout_calories,
            ]);
        } else {
            History::create([
                'user_id' => Auth::user()->id,
                'calories' => 0,
                'carbohydrates' => 0,
                'protein' => 0,
                'fats' => 0,
                'date' => $request->date,
                'workout_calories' => $request->workout_calories,
                'water' => 0,
            ]);
        }

        return response()->json(['status' => 204], 204);
    }
}
