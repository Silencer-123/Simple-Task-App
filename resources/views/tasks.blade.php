@extends('layouts.app')

@section('content')

<!-- Display Validation Errors -->
@include('common.errors')
<div class="container mx-auto w-1/2 mt-2 ">
  <form action="/task" method="POST" class="border-2 mt-4 bg-slate-50">
    {{ csrf_field() }}
    <h2 class="border p-2 bg-gray-500 mb-4 text-white">New Task</h2>
    <div class="ml-4 pb-4">
      <label for="Task" class="pb-4">Task</label>
      <input type="text" name="name" id="" class="block outline-none border-2 border-black w-9/12 h-9 my-4 rounded-xl pl-4">
      <button class="border w-24 h-12 mb-4 rounded-md text-white bg-black" type="submit"><span class="font-bold text-2xl">+</span>Add Task</button>
    </div>
  </form>
  <!-- Current Tasks -->
  @if(count($tasks) > 0)
  <div class="container border-2 mt-4 text-center bg-slate-50">
    <h2 class="p-2 border bg-gray-500">Current Tasks</h2>
    <table class="table-auto border-collapse border border-slate-500 mx-auto mt-2 mb-2 w-4/5">
      <thead class="border border-slate-600 bg-gray-300">
        <th>Task</th>
        <th>&nbsp;</th>
      </thead>
      <tbody>
        @foreach($tasks as $task)
        <tr>
          <td class="border border-slate-700 p-2">{{$task->name}}</td>
          <td class="border border-slate-700">
            <form action="/task/{{ $task->id }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button class="bg-red-500 w-20 p rounded-md">
                <i class="fa-solid fa-trash"></i>
                Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection