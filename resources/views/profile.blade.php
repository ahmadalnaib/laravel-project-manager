@extends('layouts.app')

@section('title','الملف الشخصي')

@section('content')
    
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card">
      <div class="text-center">
        <img src="{{asset(auth()->user()->image)}}" width='82px' height="82px "alt="profile">
        <h3>{{auth()->user()->name}}</h3>
      </div>
      <div class="card-body text-right">
    <form action="{{route('profile')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">الاسم</label>
      <input type="text" class="form-control" id="name" name="name" value="{{auth()->user()->name}}">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">الايميل</label>
      <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">كلمة المرور</label>
      <input type="password" class="form-control" id="password" name="password" >
    </div>
    <div class="mb-3">
      <label for="password-confirmation" class="form-label">تاكيد كلمة المرور  </label>
      <input type="password" class="form-control" id="password" name="password-confirmation" >
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">تغيير الصورة الشخصية </label>
      <div class="custom-file">
        <input type="file" name="image" id="image" class="custom-file-input">
        <label for="image" id="image-label" class="custom-file-label text-left" data-browser="استعراض"></label>
      </div>
     
    </div>
    <div class="mb-3 d-flex mt-5 flex-row-reverse">
      <button type="submit" class="btn btn-primary mr-2">حفظ التعديلات</button>
      <a href="{{route('projects.index')}}"  class="btn btn-light">الرجوع</>
    </div>
    </form>
      </div>
    </div>
  </div>
</div>
    
@endsection