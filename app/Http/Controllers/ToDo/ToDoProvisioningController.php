<?php

namespace App\Http\Controllers\ToDo;

use App\Data\ToDoData;
use App\Http\Action\ToDo\ToDoAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ToDo\CreationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ToDoProvisioningController extends Controller {
    public function __construct(
        private readonly ToDoAction $toDoAction
    ) {
    }

    public function create(CreationRequest $request): RedirectResponse {
        $data = ToDoData::fromRequest($request);
        $this->toDoAction->create($data);

        return redirect()->route('todo.show-all')->with('message', 'Todo saved successfully');
    }

    public function update(int $id, CreationRequest $request): RedirectResponse {
        $data = ToDoData::fromRequest($request);
        $this->toDoAction->update($id, $data);

        return redirect()->route('todo.show-all')->with('message', 'Todo updated successfully');
    }

    public function markAsDone(int $id): RedirectResponse {
        $this->toDoAction->markAsDone($id);

        return redirect()->route('todo.show-all')->with('message', 'Todo updated successfully');
    }
}
