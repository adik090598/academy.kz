@extends('modules.front.layouts.app-full')

@section('content')
<div class="container pt-5" style="min-height: 766px;">

            <div class="card-body">
                @if($quizzes)
                <ul>
                    @foreach($quizzes as $quiz)

                    <div class="alert alert-primary" role="alert">
                        <h4 class="alert-heading">{{ $quiz->quiz->name  }} </h4>
                        <p>{{ $quiz->result*100 }}%</p>
                        <p class="text-right">{{ $quiz->created_at }}</p>
                    </div>

                    @endforeach
                </ul>
                @endif
            </div>
</div>
@endsection

@section('scripts')
@endsection
