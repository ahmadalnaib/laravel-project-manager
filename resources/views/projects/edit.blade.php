@extends('layouts.app')

@section('title','تعديل المشروع')
    

@section('content')
    
<div class="row justify-content-center text-right">
  <div class="col-10">
    <h3 class="text-center pb-5 font-weight-bold">
      تعديل جديد
    </h3>
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
    
       
            @foreach($errors->all() as $error)
                <small>{{ $error }}</small>
            @endforeach
        
    </div>
    @endif

    <form action="{{route('projects.update',$project->id)}}" method="POST" dir="rtl">
      @csrf
      @method('put')
      <div class="mb-3">
        <label for="title" class="form-label">العنوان</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">وصف المشروع</label>
        <textarea name="description" class="form-control" id="description" cols="30" rows="10">
          {{$project->description}}
        </textarea>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">تعديل</button>
        <a class="btn btn-light" href="{{route('projects.index')}}">الغاء</a>
      </div>

    </form>
  </div>
</div>

@endsection
