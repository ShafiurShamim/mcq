@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <h3>MCQ</h3>

                <div>
                    <ul>
                        @foreach ($grades as $grade)
                            <li>{{ $grade->name }}
                            
                                {{-- {{ dd($grade->subjects ) }} --}}
                                <ul>
                                    @forelse ($grade->subjects as $subject)
                                        <li> {{ $subject->name }}
                                            <ul>
                                                @forelse ($subject->topics as $topic)
                                                <li>
                                                    <a href="/exam/make/{{ $grade->slug }}/{{ $subject->slug }}/{{ $topic->slug }}">{{ $topic->name }} [{{ $topic->questions_count }}]</a> 
                                                </li>
                                                @empty
                                                    <li>No Topics</li>
                                                @endforelse
                                            </ul>
                                        </li>
                                    @empty
                                        <li>No Subjects</li>
                                    @endforelse
                                </ul>
                                

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection