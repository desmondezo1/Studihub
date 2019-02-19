@extends('admin.template.adminpage')

@section('css')
<link href="{{ URL::asset('css/adminpagemessages.css') }}" rel="stylesheet">
@endsection

@section('page')
Lessons
@endsection


@section('content')

<table class="table table-bordered table-responsive">
    <caption>List of users</caption>
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th> 
        <th scope="col">Status</th> 
        <th scope="col">% completion</th>
        <th scope="col">Enrolled</th>
        <th scope="col">Subject</th>
        <th scope="col">Tutor</th>
        <th scope="col">Tags</th>
       
      </tr>
    </thead>
    <tbody>
      <tr >
        <th scope="row">1</th>
        <td>How to convert from one base to another (Base 2 to base 3)</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>


@endsection