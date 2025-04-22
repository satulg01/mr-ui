<?php

namespace MrUi\LivewireUiComponents\Components;

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;
use Illuminate\Support\Collection;

class Todo extends Component
{
    public Collection $tasks;
    public string $newTask = '';
    public ?string $filter = null;
    public bool $darkMode = false;
    
    public function mount(Collection $tasks = null, bool $darkMode = null)
    {
        $this->tasks = $tasks ?? collect();
        $this->darkMode = $darkMode ?? config('livewire-ui-components.components.todo.enable_dark_mode', false);
    }
    
    public function addTask()
    {
        if (empty($this->newTask)) {
            return;
        }
        
        $this->tasks->push([
            'id' => uniqid(),
            'text' => $this->newTask,
            'completed' => false,
            'created_at' => now()
        ]);
        
        $this->newTask = '';
        $this->dispatch('task-added');
    }
    
    public function toggleComplete($taskId)
    {
        $index = $this->tasks->search(fn($task) => $task['id'] === $taskId);
        
        if ($index !== false) {
            $task = $this->tasks[$index];
            $task['completed'] = !$task['completed'];
            $this->tasks->put($index, $task);
        }
        
        $this->dispatch('task-updated');
    }
    
    public function removeTask($taskId)
    {
        $this->tasks = $this->tasks->filter(function ($task) use ($taskId) {
            return $task['id'] !== $taskId;
        });
        
        $this->dispatch('task-removed');
    }
    
    public function clearCompleted()
    {
        $this->tasks = $this->tasks->filter(function ($task) {
            return !$task['completed'];
        });
        
        $this->dispatch('tasks-cleared');
    }
    
    public function setFilter($filter)
    {
        $this->filter = $filter === 'all' ? null : $filter;
    }
    
    public function toggleDarkMode()
    {
        $this->darkMode = !$this->darkMode;
    }
    
    #[Computed]
    public function filteredTasks()
    {
        if (!$this->filter) {
            return $this->tasks;
        }
        
        return $this->tasks->filter(function ($task) {
            return $this->filter === 'completed' ? $task['completed'] : !$task['completed'];
        });
    }
    
    #[Computed]
    public function completedCount()
    {
        return $this->tasks->filter(function ($task) {
            return $task['completed'];
        })->count();
    }
    
    #[Computed]
    public function remainingCount()
    {
        return $this->tasks->filter(function ($task) {
            return !$task['completed'];
        })->count();
    }
    
    public function render()
    {
        return view('mrui::components.todo');
    }
} 