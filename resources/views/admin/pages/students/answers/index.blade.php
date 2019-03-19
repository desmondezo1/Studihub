@extends('admin.template.app')

@section('page_title', "Questions")
@section('description', "Questions to prepare for SSCE,JAMB,PUME and GCE")
@section('keyword', "subjects, english,mathematics,geography ...")


@section("page-header")
    @component('admin.partials.page-header', [
            'page_name' => 'Questions',
            ])
    @endcomponent

@endsection

@section("breadcrum")
    @component('admin.partials.page-header', [
            'page_name' => 'Questions',
            'page_route' => 'admin.questions.index'
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
                            <h3 class="h4 text-center">Manage Question</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::user()->fullname }}!</h4>
                                <p class="card-text">Manager All Questions Here</p>
                            </div>
                            <hr class="my-2">
                            <div class="mb-3">
                                <h4 class="info-color-dark white-text text-center mb-5">
                                    @if(Auth::user()->can('read-admin-admin-student-answer-controller'))
                                        <span class="new-button" style="float:left;">
                                                        <i class="fa fa-admin-plus"></i>&nbsp;
                                                    <a href="{{ route('admin.answers.chart') }}" class="btn btn-info btn-sm"><span class="fa fa-plus"></span>
                                                        &nbsp;Visualize
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
                            <h3 class="h4">List of {{ $answers->student->fullname }}Answers</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="answers" class="table table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th># </th>
                                        <th>Question</th>
                                        <th>Choice</th>
                                        <th>is Correct</th>
                                        <th>Date Created </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($anwers as $index=>$anwers)
                                        <tr>
                                            <th scope="row">{{ ++$index }}</th>
                                            <td>{{ $$anwer->questions->description }}</td>
                                            <td>{{ $answer->choice->choice_option }}</td>
                                            <td>{{ $answer->choice->is_correct ? "Yes" : "No"}}</td>
                                            <td>{{ \Carbon\Carbon::parse($question->created_at)->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th># </th>
                                        <th>Question</th>
                                        <th>Choice</th>
                                        <th>is Correct</th>
                                        <th>Date Created </th>
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
            $('#anwers').DataTable({
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


