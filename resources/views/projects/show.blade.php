@extends('layouts.app')

@section('content')

<header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
  <div class="h6 text-dark">
    <a href="{{route('projects.index')}}">العودة الى المشاريع</a>
  </div>
  <div>
    <a class="btn btn-primary" href="{{route('projects.edit',$project->id)}}">تعديل مشروع</a>
  </div>
</header>


<section class="row text-right" dir="rtl">
<div class="col-lg-4">
  <div class="card text-right mt-4">
    <div class="card-body">
     
      <div class="status">

        @switch($project->status)
            @case(1)
                <span class="text-success">مكتمل</span>
                @break
            @case(2)
            <span class="text-danger">ملغي</span>
                @break
            @default
             <span class="text-warning">قيد الانجاز</span>
        @endswitch
      </div>
      <h5 class="font-weight-bold card-title">
        <a href="{{route('projects.show',$project->id)}}">{{$project->title}}</a>
      </h5>
      <div class="card-text mt-4">
        {{$project->description,150}}
      </div>
    </div>
    @include('projects.footer')
  </div>


<div class="card">
  <div class="card-body">
    <h5 class="font-weight-bold">تغير حالة المشروع</h5>
    <form action="{{route('projects.update',$project->id)}}" method="POST"> 
      @method('PATCH')
      @csrf
    <select name="status" class="custom-select" onchange="this.form.submit()">
      <option value="0" {{($project->status ==0) ? 'selected' : ""}}>قيد الانجاز</option>
      <option value="1" {{($project->status ==1) ? 'selected' : ""}}>مكتمل</option>
      <option value="2" {{($project->status ==2) ? 'selected' : ""}}>ملغي</option>
    </select>
  </form>
  </div>
</div>
</div>

<div class="col-lg-8 ">
@foreach ($project->tasks as $task)
    <div class="card d-flex flex-row mt-3 align-items-center p-4">
      <div class="{{$task->done ? 'checked muted':""}} p-3 ">
        
        {{$task->body}}
      </div>
    
    <div class="mr-auto">
      <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="checkbox" name="done" class=" ml-4" onchange="this.form.submit()"
        {{$task->done? 'checked':''}}
        >
      </form>
    </div>

    <div class="d-flex align-items-center pt-2 ">
      <form action="/projects/{{$task->project_id}}/tasks/{{$task->id}}" method="POST">
        @method('DELETE')
        @csrf
        <input type="submit" class="btn-delete" value="">
      </form>
    </div>

    </div>
@endforeach
<div class="card mt-4">
  <form action="{{route('tasks.store',$project->id)}}" method="post" class="d-flex p-3">
    @csrf
    <input type="text" name="body" class="form-control p-2 ml-2 border-0" placeholder="اضف مهمة جديدة">
    <button type="submit" class="btn btn-primary">اضافة</button>
  </form>
</div>
</div>
</section>
    
@endsection