<div class="card-footer bg-transparent" dir="rtl">
  <div class="d-flex">
    <div class="d-flex align-items-center">
      <img src="{{asset('img/alarm.svg')}}" alt="">
      <div class="mr-1">
        {{$project->created_at->diffForHumans()}}

      </div>
    </div>


    <div class="d-flex align-items center">
      <img src="{{asset('img/list-check.svg')}}" alt="">
      <div class="mr-1">
       

      </div>
    </div>

    <div class="d-flex align-items-center mr-auto">
      <form action="{{route('projects.destroy',$project->id)}}" method="POST">
        @method('DELETE')
        @csrf

        <input type="submit" class="btn-delete" >
      </form>
    </div>
  </div>
</div>