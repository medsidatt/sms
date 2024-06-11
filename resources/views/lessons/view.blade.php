@extends('layouts.app')
@section('title', 'Emploi du temp')

@section('content')

    <div class="pagetitle">
        <h1>Lesson</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lessons') }}">Les emploies du temps</a></li>
                <li class="breadcrumb-item">Emploies du temp</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section">

        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div>
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>Heures</th>
                            @foreach($days as $day)
                                <th>{{ $day }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($times as $time)
                            <tr>
                                <td>{{ $time['start'] . ' - ' . $time['end'] }}</td>
                                @foreach($days as $index => $day)
                                    @php
                                        $lesson = $lessons->where('day', $index + 1)->where('start', $time['start'].':00')->first();
                                    @endphp
                                    @if($lesson)
                                        <td rowspan="{{ $lesson->duration }}" class="align-middle text-center"
                                            style="background: rgba(232,232,232,0.69)">
                                            {{ $lesson->subject->name }} <br>
                                            Prof: {{ $lesson->teachers->first_name. ' ' .$lesson->teachers->last_name  }}
                                        </td>
                                    @elseif($lessons->where('day', $index + 1)->where('start', '<', $time['start'])->where('end', '>', $time['end'])->count() > 0)
                                    @else
                                        <td></td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
