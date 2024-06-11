@extends('layouts.app')
@section('title', 'Ajouter une lesson dans l\'emploi de temp')

@section('content')
    @if(Session::has('success'))
        <x-alert type="success">
            {{ Session::get('success') }}!
        </x-alert>
    @elseif(Session::has('fail'))
        <x-alert type="danger">
            {{ Session::get('fail') }}!
        </x-alert>
    @endif

    <div class="pagetitle">
        <h1>Lesson</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Ajouter une lesson dans l'emploi de temp</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div id="alert"></div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Ajouter une lesson dans l'emploi de temp
                </div>
            </div>
            <div class="card-body mt-2">

                <form action="{{ route('lessons.create') }}" method="post">
                    @csrf
                    <div class="row mt-2">
                        <label for="day" class="form-label">Jour</label>
                        <select id="day" class="form-select @error('day') is-invalid @enderror" name="day">
                            <option value="" selected>Selectionner le jour</option>
                            <option value="0" {{ old('day') == 1 ? 'selected' : '' }}>Lundi</option>
                            <option value="1" {{ old('day') == 2 ? 'selected' : '' }}>Mardi</option>
                            <option value="2" {{ old('day') == 3 ? 'selected' : '' }}>Mercredi</option>
                            <option value="3" {{ old('day') == 4 ? 'selected' : '' }}>Jeudi</option>
                            <option value="4" {{ old('day') == 5 ? 'selected' : '' }}>Vendredi</option>
                            <option value="5" {{ old('day') == 6 ? 'selected' : '' }}>Samedi</option>
                            <option value="5" {{ old('day') == 7 ? 'selected' : '' }}>Dimanche</option>
                        </select>
                        <div class="invalid-feedback">@error('day') {{ $message }} @enderror</div>
                    </div>

                    <div class="row mt-2">
                        <label for="class_id" class="form-label">Classe</label>
                        <select id="class_id" class="form-select @error('class_id') is-invalid @enderror" name="class_id">
                            <option value="" selected>Selectionner une classe</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('class_id') {{ $message }} @enderror</div>
                    </div>

                    <div class="row mt-2">
                        <label for="teacher_id" class="form-label">Professeur</label>
                        <select id="teacher_id" class="form-select @error('teacher_id') is-invalid @enderror" name="teacher_id">
                            <option value="" {{ old('teacher_id') == '' ? 'selected' : '' }}>Selectionner un professeur</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->first_name . ' ' . $teacher->last_name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('teacher_id') {{ $message }} @enderror</div>
                    </div>

                    <div class="row mt-2">
                        <label for="subject_id" class="form-label">Matière</label>
                        <select id="subject_id" class="form-select @error('subject_id') is-invalid @enderror" name="subject_id">
                            <option value="" {{ old('subject_id') == '' ? 'selected' : '' }}>Selectionner une matière</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('subject_id') {{ $message }} @enderror</div>
                    </div>

                    <div class="row mt-2">
                        <label for="start">Heure de début</label>
                        <select id="start" class="form-control @error('start') is-invalid @enderror" name="start">
                            @for ($hour = 7; $hour <= 19; $hour++)
                                <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00</option>
                            @endfor
                        </select>
                        <div class="invalid-feedback">@error('start') {{ $message }} @enderror</div>
                    </div>

                    <div class="row mt-2">
                        <label for="end">Heure de fin</label>
                        <select id="end" class="form-control @error('end') is-invalid @enderror" name="end">
                            @for ($hour = 7; $hour <= 19; $hour++)
                                <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00</option>
                            @endfor
                        </select>
                        <div class="invalid-feedback">@error('end') {{ $message }} @enderror</div>
                    </div>

                    <button class="btn btn-primary mt-2" type="submit">Enregistrer</button>
                </form>


            </div>
        </div>
    </section>


@endsection
