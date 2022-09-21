<?php

namespace App\Http\Livewire;

use App\Models\TodoItem;
use Livewire\Component;

class TodoList extends Component
{
    public $todos;
    public string $todoText = '';

    //Mount
    public function mount(){
        $this->selectTodos();
    }

    //AddTodo
    public function addTodo(){
        $todo = new TodoItem();
        $todo->todo = $this->todoText;
        $todo->completed = false;
        $todo->save();

        $this->todoText = '';
        $this->selectTodos();
    }

    //ToogleTodo
    public function toogleTodo($id){
        $todo = TodoItem::where('id', $id)->first();
        if(!$todo){
            return;
        }
        $todo->completed = !$todo->completed;
        $todo->save();
        $this->selectTodos();
    }

    //selectTodos function
    public function selectTodos(){
        $this->todos = TodoItem::orderBy('created_at', 'DESC')->get();
    }

    //Delete
    public function deleteTodo($id){
        $todo = TodoItem::where('id', $id)->first();
        if(!$todo){
            return;
        }
        $todo->delete();
        $this->selectTodos();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
