<?php

namespace App\Http\Action\ToDo;

use App\Data\ToDoData;
use App\Models\ToDo;
use App\Repositories\MySQL\ToDoRepo;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ToDoAction {
    public function __construct(
        private readonly ToDoRepo $toDoRepo
    ) {
    }

    public function create(ToDoData $toDoData): ToDo {
        return $this->toDoRepo->create($toDoData);
    }

    public function update(int $id, ToDoData $data): void {
        $this->toDoRepo->updateById($id, $data);
    }

    public function markAsDone(int $id): void {
        $this->toDoRepo->markAsDone($id);
    }

    public function showAll(int $userId, Request $request): LengthAwarePaginator {
        $search = $request->query("search");

        $todos = ToDo::where("user_id", "=", $userId);
        $todos = !empty($search) ? $todos->where("activity", 'LIKE', "%{$search}%") : $todos;

        return $todos->paginate(5);
    }
}
