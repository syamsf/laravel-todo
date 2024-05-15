<x-todo.layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Update To Do') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('todo.update', $todo->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')
                            <input type="hidden" name="user_id" value="{{auth()->id()}}">

                            <div>
                                <x-input-label for="" :value="__('Activity')"/>
                                <x-text-input id="" name="activity"
                                              type="text" class="mt-1 block w-full" value="{{old('activity', $todo->activity)}}"/>
                                <x-input-error :messages="$errors->get('activity')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="" :value="__('Priority')"/>
                                <x-text-input id="" name="priority" type="number" class="mt-1 block w-full" value="{{old('priority', $todo->priority)}}"/>
                                <x-input-error :messages="$errors->get('priority')" class="mt-2"/>
                            </div>

                            <div>
                                <x-input-label for="" :value="__('Is Done?')" style="margin-bottom: 0.25rem"/>
                                <input type="checkbox" name="is_done" id="" class="size-4 rounded border-gray-300" {{$todo->is_done == 1 ? 'checked' : ''}}>
                                <x-input-error :messages="$errors->get('is_done')" class="mt-2"/>
                            </div>

                            <div>
                                <x-primary-button> Update </x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-todo.layout>
