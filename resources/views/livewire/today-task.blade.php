<div class="h-full overflow-hidden">

    <div class="flex items-center justify-center font-medium w-full h-full  flex-row">
        <div class="flex items-center justify-center h-full text-gray-600  w-3/5">
            <!-- Component Start -->
            <div class="flex flex-col  max-w-full ps-8 w-full h-full pe-0">
                <div class="flex items-center mb-6">
                    <svg class="h-8 w-8  stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h4 class="font-semibold ml-3 text-lg">Your Today Task</h4>
                </div>
                <div class="overflow-y-auto h-full">
                    <div>
                        @foreach($todayTasks as $task)
    <div class="flex w-full justify-between hover:bg-fadeGreen/[0.08] rounded-md px-2" wire:key="today-task-{{ $task->task_id }}">
        <input class="hidden" type="checkbox" id="task_{{ $task->task_id }}"
               wire:click="completeTask({{ $task->task_id }})" >
        <label class="flex items-center h-10 rounded cursor-pointer" for="task_{{ $task->task_id }}">
            <span class="flex items-center justify-center w-5 h-5 border-2 border-gray-300 rounded-full">
                @if($task->status === 'completed')
                    <svg class="w-4 h-4 fill-current text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                @endif
            </span>
            <span class="ml-4 text-sm">{{ $task->task->name }}</span>
        </label>
        <div class="ml-2 flex shrink-0 py-2 align-middle">
            <span class="inline-flex items-center rounded-full bg-amber-500 px-2 py-1 text-xs font-medium text-white ring-1 ring-amber-600/20 ring-inset">
                +{{ $task->task->leaflets_reward }} Leaflets
            </span>
        </div>
    </div>
@endforeach

                    </div>

            <!-- Accordion Item 1 -->
            <div class="border-b border-slate-200">
                <button onclick="toggleAccordion(1)" class="w-full flex justify-start items-center py-5 text-slate-800">
                <span>Completed</span>
                    <span id="icon-1" class="text-slate-800 transition-transform duration-300 ps-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                        </svg>
                    </span>
                </button>
                    <div id="content-1" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div>
                    @foreach($completedTasks as $task)
                    <input class="hidden" type="checkbox" id="task_{{ $task->task_id }}" wire:key="completed-task-{{ $task->task_id }}">
                    <label class="flex items-center h-10 px-2 rounded cursor-pointer hover:bg-gray-100" for="task_{{ $task->task_id }}">
                        <span class="flex items-center justify-center w-5 h-5 text-transparent border-2 border-gray-300 rounded-full">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span class="ml-4 text-sm">{{ $task->task->name }}</span>
                        <button wire:click.prevent="unfinishTask({{ $task->task_id }})" class="ml-auto items-center text-sm bg-red-500 text-white px-3 py-1 rounded">
                            Unfinished
                        </button>
                    </label>
                    @endforeach
                </div>
            </div>
    </div>

  <script>
    function toggleAccordion(index) {
      const content = document.getElementById(`content-${index}`);
      const icon = document.getElementById(`icon-${index}`);

      // SVG for Minus icon
      const minusSVG = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
          <path d="M3.75 7.25a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5h-8.5Z" />
        </svg>
      `;

      // SVG for Plus icon
      const plusSVG = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
          <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
        </svg>
      `;

      // Toggle the content's max-height for smooth opening and closing
      if (content.style.maxHeight && content.style.maxHeight !== '0px') {
        content.style.maxHeight = '0';
        icon.innerHTML = plusSVG;
      } else {
        content.style.maxHeight = content.scrollHeight + 'px';
        icon.innerHTML = minusSVG;
      }
    }
  </script>
                  </div>
            </div>
            </div>
            <!-- Component End  -->

            <div class="flex items-center justify-center h-full text-gray-600  w-2/5 border-l-2 ml-8 border-gray-100">
              <!-- Component Start -->
              <div class="flex flex-col  max-w-full ps-8 w-full h-full pe-0">
                  <div class="flex items-center mb-6">
                      <svg class="h-8 w-8  stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                      </svg>
                      <h4 class="font-semibold ml-3 text-lg">Other Daily Task</h4>
                  </div>
                  <div class="overflow-y-auto h-full">
                      <div>
                        @foreach($otherTasks as $task)
                          <div class="flex w-full justify-between hover:bg-gray-100 rounded-md px-2" wire:key="other-task-{{ $task->task_id }}">
                              <input class="hidden" type="checkbox" id="task_A">
                              <label class="flex items-center h-10 rounded cursor-pointer " for="task_A">
                                  <span class="flex items-center justify-center w-5 h-5 text-transparent border-2 border-gray-300 rounded-full">
                                      <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                      </svg>
                                  </span>
                                  <span class="ml-4 text-sm">{{ $task->name }}</span>
                              </label>
                              <div class="ml-2 flex shrink-0 py-2 align-middle">
                                  <span class="inline-flex items-center rounded-full bg-amber-500 px-2 py-1 text-xs font-medium text-white ring-1 ring-amber-600/20 ring-inset">+{{ $task->leaflets_reward }} Leaflets</span>
                                  <button wire:click.prevent="addToTodayTask({{ $task->task_id }})" class="items-center text-sm align-middle ml-3 mr-2">
                                    <i class="fa-solid fa-plus align-middle items-center text-sm"></i>
                                  </button>
                                </div>
                          </div>
                          @endforeach
                      </div>
                    </div>
              </div>
              </div>
        </div>
    </div>
  </div>
