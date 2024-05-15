<?php

namespace App\Repositories\MySQL;

use App\Data\ToDoData;
use App\Models\ToDo;
use Illuminate\Support\Collection;

class ToDoRepo {
    public function create(ToDoData $data): ToDo {
        return ToDo::create($data->format());
    }

    public function fetchById(int $id): ?ToDo {
        return ToDo::find($id);
    }

    public function fetchAll(): Collection {
        return ToDo::all();
    }

    public function fetchAllByUserId(int $userId): Collection {
        return ToDo::where('user_id', $userId)->get();
    }

    public function updateById(int $id, ToDoData $data): void {
        ToDo::where('id', $id)->update($data->format());
    }

    public function delete(int $id): void {
        ToDo::where('id', $id)->delete();
    }

    public function markAsDone(int $id): void {
        ToDo::where('id', $id)->update(['is_done' => 1]);
    }
}
