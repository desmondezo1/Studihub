@extends('admin.template.adminpage')

@section('css')

@endsection

@section('page')
Questions
@endsection



@section('content')
<div class="container" style="padding:15px;">
<form class="form-inline my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>

<table class="table table-bordered table-responsive  table-striped table-dark">
    <caption>List of lessons</caption>
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
        <td class="bg-success">Active</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Mathematics</td>
        <td>Jafar</td>
        <td>
            <span class="badge badge-pill badge-light">number base</span>
            <span class="badge badge-pill badge-light">Base 2</span>
            <span class="badge badge-pill badge-light">Base 3</span>
        </td>
        <td>
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-success">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Pending</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-success">Edit</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td class="bg-danger">Denied</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>the Bird</td>
        <td>@twitter</td>

        <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-success">Edit</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </td>
      </tr>
    </tbody>
  </table>


@endsection