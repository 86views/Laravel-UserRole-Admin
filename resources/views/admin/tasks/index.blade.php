<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View All Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @can('create', \App\Models\Task::class)
                    <a href="{{ route('admin.tasks.create') }}"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent 
                    rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">
                  
                    Add New Tasks
                  </a> 
                    @endcan
                 
                  
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                 Id
                </th>
               <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Due Date
                </th>
                
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                   Action
                </th>
                
              
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    {{ $task->id }}
                </th>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                     {{ $task->name }}
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    {{ $task->due_date }}
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                     @can('update', $task)
                     <a href="{{ route('admin.tasks.edit', $task->id) }}"
                     class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent 
                     rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">
                   
                     Edit Tasks
                   </a> 
                     @endcan
                    
                      @can('delete', $task)
                      
                      <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST"
                        onsubmit="return confirm('Are You Sure')" style="display: inline-block;">
                        @csrf
                        @method('delete')
                        <x-primary-button class="ml-3">
                         Delete
                        </x-primary-button>
                        @endcan
                    </form>

                    
                     
                    
                </td>
            </tr>
          
            @endforeach
            
        
               
        </tbody>
    </table>
</div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
