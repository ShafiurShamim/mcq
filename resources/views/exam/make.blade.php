@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <h3>MCQ Test</h3>
                <div class="card">
                    <div class="card-header">
                        <div class="toolbar">
                            <a href="" class="btn btn-primary">Home</a>
                            <a href="" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <p class="card-test">
                            <div class="unit-name"><span>Topic:</span>{{ $topic->name }}</div>
                            <div class="total-ques"><span>Total MCQ:</span> {{ $topic->questions_count }}</div>
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="btn-start">
                            <a href="{{ $benchPath }}" class="btn btn-primary">Start</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection