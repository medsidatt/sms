@extends('layouts.app')
@section('title', 'Emploi du temp')

@section('content')

    <div class="pagetitle">
        <h1>Lesson</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Emploies de temp</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section">

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>Liste des enploies du temps</h3>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <ul class="list-group mt-2">
                        @foreach($classes as $class)
                            <li class="list-group-item">
                                <a href="{{route('lessons.show', $class->id) }}">{{ $class->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection
