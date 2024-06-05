@extends('layouts.app')

@section('content')

<section class="py-5">
  <div class="container">

    <table class="table table-warning table-hover">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Working-hours</th>
          <th scope="col">Co-workers</th>
        </tr>
      </thead>
      @foreach($projects as $project)
      <tbody>
        <tr>
        <th scope="row"> <a class=" link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{route('admin.projects.show',$project)}}">{{$project->project_name}}</a></th>
        <td>{{$project->description}}</td>
        <td>{{$project->working_hours}}</td>
        <td>{{$project->co_workers}}</td>
    
        </tr>
    
      </tbody>
    
      @endforeach
    </table>
  </div>
</section>

@endsection