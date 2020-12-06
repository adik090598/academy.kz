@extends('modules.front.layouts.app-full')
@section('content')
    <div class="container pt-5" style="min-height: 766px;">
        <div class="row">
            <div class="col-md-3">
                <div class="account">
                    <a class="dropdown-item" href="{{route('profile.quizzes')}}"><i class="fa fa-list"></i> Менің тесттарым</a></li>
                    <a class="dropdown-item" href="{{route('profile.certificates')}}"><i class="fa fa-file"></i> Менің сертификаттарым</a></li>
                </div>
            </div>
            <div class="col-md-8 certificates">
                <div class="row">
                @foreach($results as $result)
                    <a href="{{route('profile.certificate',['id'=> $result->id])}}" target="_blank" class="card credentialing">
                        <div class="overlay"></div>
                        <div class="circle">
                            <div class="certificate-type text-center">
                                <h1><i class="ti-cup"></i></h1>
                                <h5>{{$result->place}}</h5>
                            </div>
                        </div>
                        <div class="description text-center">
                            <h5>{{$result->quiz->name}}</h5>
                            <h5>{{($result->result / $result->all_score) * 100 .'%'}}</h5>
                        </div>
                    </a>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
