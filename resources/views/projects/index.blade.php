@extends('layouts.app')

@section('content')
<header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
  <div class="h6 text-white">
    <a class="btn btn-primary text-white" href="{{route('projects.index')}}">المشاريع</a>
  </div>
  <div>
    <a class="btn btn-primary" href="{{route('projects.create')}}">انشاء مشروع</a>
  </div>
</header>

<section>
  <div class="row">

 
  @forelse ($projects as $project)
      <div class="col-4 mb-4">
        <div class="card text-right" style="height: 230px">
          <div class="card-body">
            @switch($project->status)
                @case(1)
                    <span class="bg-success p-2 text-white mb-2 rounded-pill">مكتمل</span>
                    @break
                @case(2)
                <span class="bg-danger p-2 text-white mb-2 rounded-pill">ملغي</span>
                    @break
                @default
                 <span class="bg-warning p-2 text-white mb-2 rounded-pill">قيد الانجاز</span>
            @endswitch
            <h5 class="font-weight-bold card-title mt-3">
              <a href="{{route('projects.show',$project->id)}}">{{$project->title}}</a>
            </h5>
            <div class="card-text mt-4">
              {{Str::limit($project->description,150)}}
            </div>
          
          </div>
        </div>
        @include('projects.footer')
      </div>
  @empty
      <div class="m-auto align-content-center text-center">
        <p>لوحة العمل خالية من المشاريع</p>
        <div class="mt-5">
          <a href="{{route('projects.create')}}" class="btn btn-primary btn-lg d-inline-flex align-items-center" role="button">انشاء مشروع جديد</a>
        </div>
      </div>
  @endforelse
</div>
</section>
    
@endsection