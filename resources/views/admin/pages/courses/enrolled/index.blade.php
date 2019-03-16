@extends('admin.template.app')

@section('page_title', "Enrolled Courses")
@section('description', "List of courses to manage")
@section('keyword', "subjects, english,mathematics,geography ...")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' => 'Enrolled Courses',
            ])
    @endcomponent

@endsection


@section("content")

    <!--Section: Main panel-->
    <section>
        <div class="container-fluid">
            <div class="row" data-aos="flip-down">
                <div class="col-lg-12 col-xs-12 text-center">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow" style="display: none; position: absolute; transform: translate3d(19px, 24px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-end"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>{{--<a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>--}}</div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4 text-center">Manage Enrolled Course</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::user()->fullname }}!</h4>
                                <p class="card-text">Manager All Enrolled Courses Here</p>
                            </div>
                            <hr class="my-2">
                            <div class="mb-3">
                                <h4 class="info-color-dark white-text text-center mb-5">
                                    @if(Auth::user()->can('read-admin-admin-enrolled-course-controller'))
                                        <span class="new-button" style="float:left;">
                                                        <i class="fa fa-admin-plus" style="color: #005983"></i>&nbsp;
                                                    <a href="{{ route('admin.enrolled.chart') }}" class="btn btn-info btn-sm"><span class="fa fa-plus"></span>
                                                        &nbsp;Visualize Data
                                                    </a>
                                        </span>
                                    @endif
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" data-aos="fade-in"
                 data-aos-anchor-placement="top-center">
                <div class="col-lg-12 col-xs-12">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">List of Enrolled Courses</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="enrolledCourses" class="table table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th># </th>
                                        <th>Course</th>
                                        <th>Date Enrolled</th>
                                        <th>Expires At</th>
                                        <th>Date Completed</th>
                                        <th>Progress</th>
                                        <th>Date Created</th>
                                        <th class="col-md-4">
                                            Actions </i>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($enrolledCourses as $index=>$course)
                                        <tr>
                                            <th scope="row">{{ ++$index }}</th>
                                            <td>{{ $course->$course->title }}</td>
                                            <td>{{ $course->date_enrolled }}</td>
                                            <td>{{ \Carbon\Carbon::parse($course->expires_at)->diffForHumans() }}</td>
                                            <td>{{ \Carbon\Carbon::parse($course->date_comleted)->diffForHumans()}}</td>
                                            <td>{{ $course->progress}}</td>
                                            <td>{{ \Carbon\Carbon::parse($course->created_at)->diffForHumans()}}</td>
                                            <td>
                                                @if(Auth::user()->can('read-admin-admin-enrolled-course-controller'))
                                                    <a target="_blank" href="{{ route('admin.enrolled.show', $course->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                                @endif
                                                @if(Auth::user()->can('delete-admin-admin-enrolled-course-controller'))
                                                    <button type="button" class="btn btn-danger btn-xs delete" data-url="{{ route('admin.enrolled.destroy', $course->id) }}" data-id="{{ $course->id }}"><i class="fa fa-trash-o"></i> Delete</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th># </th>
                                        <th>Course</th>
                                        <th>Date Enrolled</th>
                                        <th>Expires At</th>
                                        <th>Date Completed</th>
                                        <th>Progress</th>
                                        <th>Date Created</th>
                                        <th class="col-md-4">
                                            Actions
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('#enrolledCourses').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                "order" : [['3', "desc"]]
            })
        });
    </script>

@endpush

