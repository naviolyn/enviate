<div class="h-full overflow-hidden">
    <div class="flex flex-col items-center justify-center w-full">
        <h2 class="text-xl font-bold mb-4">Task for Level {{ $level }}</h2>

        <div class="w-full lg:w-3/5 mt-6">
    <h4 class="font-semibold text-lg">Pending Tasks</h4>
    <div class="overflow-y-auto h-full">
        @forelse($tasks->where('type', 'daily') as $task)
            <div id="pendingTask_{{ $task->id }}" class="flex w-full justify-between hover:bg-gray-100 rounded-md px-2">
                <input class="hidden" type="checkbox" id="task_{{ $task->id }}">
                <label class="flex items-center h-10 rounded cursor-pointer" for="task_{{ $task->id }}">
                    <span class="flex items-center justify-center w-5 h-5 text-transparent border-2 border-gray-300 rounded-full">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span class="ml-4 text-sm">{{ $task->name }}</span>
                </label>
                <div class="ml-2 flex shrink-0 py-2 align-middle">
                    <span class="inline-flex items-center rounded-full bg-amber-500 px-2 py-1 text-xs font-medium text-white ring-1 ring-amber-600/20 ring-inset">+{{ $task->leaflets_reward }} Leaflets</span>
                    <!-- Complete Button -->
                    <button 
                        class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600"
                        onclick="completeTask({{ $task->id }}, {{ $task->leaflets_reward }})"
                    >
                        Complete
                    </button>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No pending tasks!</p>
        @endforelse
    </div>
</div>

        <div class="w-full lg:w-3/5 mt-6">
    <h4 class="font-semibold text-lg">Completed Tasks</h4>
    <div class="overflow-y-auto h-full">
        @forelse($completedTasks->where('type', 'daily') as $task)
            <div class="flex w-full justify-between hover:bg-gray-100 rounded-md px-2">
                <input class="hidden" id="task_{{ $task->id }}">
                <label class="flex items-center h-10 rounded cursor-pointer" for="task_{{ $task->id }}">
                    <span class="flex items-center justify-center w-5 h-5 text-transparent border-2 border-gray-300 rounded-full">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span class="ml-4 text-sm">{{ $task->name }}</span>
                </label>
                <div class="ml-2 flex shrink-0 py-2 align-middle">
                    <span class="inline-flex items-center rounded-full bg-amber-500 px-2 py-1 text-xs font-medium text-white ring-1 ring-amber-600/20 ring-inset">{{ $task->leaflets_reward }} Leaflets</span>
                    <button class="items-center text-sm align-middle ml-3 mr-2">
                        <i class="fa-solid fa-plus align-middle items-center text-sm"></i>
                    </button>

                    <button id="dropdownLeftEndButton_{{ $task->id }}" data-dropdown-toggle="dropdownLeftEnd_{{ $task->id }}" data-dropdown-placement="bottom-end" class="inline-flex items-center text-sm font-medium text-center text-gray-900 rounded-lg hover:bg-gray-100 focus:outline-none" type="button">
                        <svg class="w-5 h-5 p-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                            <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownLeftEnd_{{ $task->id }}" class="z-10 hidden bg-lightGreen divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-xs text-darkGreen" aria-labelledby="dropdownMenuIconButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Delete</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                            </li>
                        </ul>
                        <div class="py-2">
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No completed tasks!</p>
        @endforelse
    </div>
</div>

        <div class="w-full lg:w-3/5 mt-6">
            <div class="flex items-center mb-6">
                <svg class="h-8 w-8 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h4 class="font-semibold ml-3 text-lg">Other Daily Task</h4>
            </div>
            <div class="overflow-y-auto h-full">
                <div class="flex w-full justify-between hover:bg-gray-100 rounded-md px-2">
                    <input class="hidden" type="checkbox" id="task_A">
                    <label class="flex items-center h-10 rounded cursor-pointer" for="task_A">
                        <span class="flex items-center justify-center w-5 h-5 text-transparent border-2 border-gray-300 rounded-full">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span class="ml-4 text-sm">Weed front garden.</span>
                    </label>
                    <div class="ml-2 flex shrink-0 py-2 align-middle">
                        <span class="inline-flex items-center rounded-full bg-amber-500 px-2 py-1 text-xs font-medium text-white ring-1 ring-amber-600/20 ring-inset">+xx Leaflets</span>
                        <button class="items-center text-sm align-middle ml-3 mr-2">
                            <i class="fa-solid fa-plus align-middle items-center text-sm"></i>
                        </button>

                        <button id="dropdownLeftEndButtonA" data-dropdown-toggle="dropdownLeftEndA" data-dropdown-placement="bottom-end" class="inline-flex items-center text-sm font-medium text-center text-gray-900 rounded-lg hover:bg-gray-100 focus:outline-none" type="button">
                            <svg class="w-5 h-5 p-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                            </svg>
                        </button>

            <!-- Dropdown menu -->
            <div id="dropdownLeftEndA" class="z-10 hidden bg-lightGreen divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-xs text-darkGreen" aria-labelledby="dropdownMenuIconButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Delete</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                                </li>
                            </ul>
                            <div class="py-2">
                                <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                console.log('Task ID:', taskId, 'Reward:', reward);
                
    function completeTask(taskId, reward) {
        fetch(`/complete-task/${taskId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ reward }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove task from pending tasks
                document.querySelector(`#pendingTask_${taskId}`).remove();

                // Add task to completed tasks
                const completedTasksContainer = document.querySelector('#completedTasksContainer');
                const completedTaskHTML = `
                    <div id="completedTask_${taskId}" class="flex w-full justify-between hover:bg-gray-100 rounded-md px-2">
                        <label class="flex items-center h-10 rounded cursor-pointer">
                            <span class="ml-4 text-sm">${data.task.name}</span>
                        </label>
                        <span class="inline-flex items-center rounded-full bg-amber-500 px-2 py-1 text-xs font-medium text-white ring-1 ring-amber-600/20 ring-inset">+${data.task.leaflets_reward} Leaflets</span>
                    </div>`;
                completedTasksContainer.insertAdjacentHTML('beforeend', completedTaskHTML);

                // Update user's leaflet reward count
                const leafletCounter = document.querySelector('#leafletCounter');
                leafletCounter.textContent = parseInt(leafletCounter.textContent) + reward;
            } else {
                alert('Failed to complete task. Please try again.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

    </div>
    <!-- End of Component -->
</div>
