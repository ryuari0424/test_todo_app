<x-app-layout>
    <div class="input">
        <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
            <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
                <div class="mb-4">
                    <h1 class="text-grey-darkest">Todo List</h1>
                    <x-task_input :tasks='$tasks' />
                </div>
                @if ($message = Session::get('success'))
                    <div class="text-red-800">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div>
                    @forelse($tasks as $val)
                        <div class="flex mb-4 items-center">
                            <input class="check mr-2" type="checkbox" value="">
                            <p class="todo w-full text-grey-darkest">{{ $val->content }}</p>
                            <button
                                class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green">Done</button>
                            <form action="{{ route('delete', $val->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button
                                    class="flex-no-shrink p-2 ml-2 border-2 rounded text-gray-800 border-red-300 hover:text-gray-500 hover:bg-red">Remove</button>
                            </form>
                        </div>
                    @empty
                        <p class="text-blue-400">タスクはありません</p>
                    @endforelse
                </div>
            </div>
        </div>
</x-app-layout>
