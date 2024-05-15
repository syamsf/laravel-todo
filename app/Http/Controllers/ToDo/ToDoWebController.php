<?php

namespace App\Http\Controllers\ToDo;

use App\Http\Action\ToDo\ToDoAction;
use App\Http\Controllers\Controller;
use App\Models\ToDo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ToDoWebController extends Controller {
    public function __construct(
        private readonly ToDoAction $toDoAction
    ) {
    }

    public function showAll(Request $request): View {
        $userId = auth()->id();
        $todos  = $this->toDoAction->showAll($userId, $request);

        return view("todo.show-all", compact('todos'));
    }

    public function create(): View {
        return view("todo.create-form");
    }

    public function update(int $id): View {
        $userId = auth()->id();
        $todo = ToDo::where("user_id", "=", $userId)->where("id", $id)->firstOrFail();

        return view("todo.update-form", compact('todo'));
    }
}
