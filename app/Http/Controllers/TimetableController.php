<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Subjects;
use App\Models\Teacher;
use App\Models\Timetable;
use App\Models\TimeTableServices;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index(TimeTableServices $timeTableServices)
    {

        $classes = Classes::whereHas('timetables')->get();

        return view('lessons.index', [
            'classes' => $classes
        ]);
    }

    public function view(TimeTableServices $timeTableServices, $classId)
    {

        $times = $timeTableServices->generateTime();
        $days = Timetable::WEEK_DAYS;
        $lessons = Timetable::with('subject', 'classes', 'teachers')->where('class_id', $classId)->get();
        return view('lessons.view', [
            'days' => $days,
            'lessons' => $lessons,
            'times' => $times
        ]);
    }


    public function create()
    {
        $classes = Classes::all();
        $teachers = Teacher::all();
        $subjects = Subjects::all();
        return view('lessons.create', [
            'classes' => $classes,
            'subjects' => $subjects,
            'teachers' => $teachers
        ]);
    }

    public function store(Request $request)
    {
        $customMessages = [
            'required' => 'Le champ :attribute est obligatoire.',
            'date_format' => 'Le champ :attribute doit être une heure valide au format HH:MM.',
            'after' => 'Le champ :attribute doit être une heure après :date.',
        ];

        $customAttributes = [
            'day' => 'jour',
            'subject_id' => 'matière',
            'teacher_id' => 'enseignant',
            'class_id' => 'classe',
            'start' => 'heure de début',
            'end' => 'heure de fin',
        ];

        $validated = $request->validate([
            'day' => ['required'],
            'subject_id' => ['required'],
            'teacher_id' => ['required'],
            'class_id' => ['required'],
            'start' => ['required', 'date_format:H:i'],
            'end' => ['required', 'date_format:H:i', 'after:start'],
        ], $customMessages, $customAttributes);

        $start = Carbon::createFromFormat('H:i', $validated['start']);
        $end = Carbon::createFromFormat('H:i', $validated['end']);
        $duration = $end->diffInHours($start);
        $day = $validated['day'];

        $isSlotFree = Timetable::where('day', $day)
            ->where(function ($query) use ($start, $end) {
                $query->where(function ($query) use ($start, $end) {
                    $query->where('start', '>=', $start)
                        ->where('start', '<', $end);
                })->orWhere(function ($query) use ($start, $end) {
                    $query->where('end', '>', $start)
                        ->where('end', '<=', $end);
                });
            })
            ->doesntExist();

        if (!$isSlotFree) {
            return redirect()->back()->with('fail', 'Le créneau horaire est déjà occupé.');
        }

        $validated['duration'] = $duration;
        $timetable = Timetable::create($validated);

        if ($timetable) {
            return redirect()->back()->with('success', 'Le cours est ajouté dans l\'emploi du temps.');
        } else {
            return redirect()->back()->with('fail', 'Le cours n\'est pas ajouté dans l\'emploi du temps.');
        }
    }

}
