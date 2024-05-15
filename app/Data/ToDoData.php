<?php

namespace App\Data;

use App\Http\Requests\ToDo\CreationRequest;
use Illuminate\Support\Facades\Validator;

class ToDoData {
    public function __construct(
        public readonly int $userId,
        public readonly string $activity,
        public readonly int $priority = 1,
        public readonly bool $isDone = false
    ) {
        $this->validate();
    }

    public static function make(
        int $userId,
        string $activity,
        int $priority = 1,
        bool $isDone = false
    ): self {
        return new self(
            userId: $userId,
            activity: $activity,
            priority: $priority,
            isDone: $isDone,
        );
    }

    public function validate(): void {
        Validator::validate(
            [
                'activity' => $this->activity,
                'priority' => $this->priority,
                'is_done'  => $this->isDone,
            ],
            [
                'activity' => ["required", "string", "max:255"],
                'priority' => ["required", "integer", "min:1"],
                'is_done'  => ["required", "boolean"],
            ]
        );
    }

    public static function fromRequest(CreationRequest $request): self {
        return new self(
            userId: $request->user_id,
            activity: $request->activity,
            priority: $request->priority,
            isDone: $request->is_done && ($request->is_done == "1" || $request->is_done == "on")
        );
    }

    public function format(): array {
        return [
            "user_id"  => $this->userId,
            "activity" => $this->activity,
            "priority" => $this->priority,
            "is_done"  => $this->isDone ? 1 : 0,
        ];
    }
}
