<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $days = [];

        //Load config
        $numberOfDaysToShow = env('NUMBER_OF_DAYS_TO_SHOW', 14);
        $weekStartsFrom = env('WEEK_STARTS_FROM', Carbon::MONDAY);
        $showWeekend = env('SHOW_WEEKEND', false);

        for ($i = 0; $i < $numberOfDaysToShow; $i++) {

            $day = Carbon::now()->startOfWeek($weekStartsFrom)->addDays($i);

            if (!$showWeekend)
                if ($day->dayOfWeek == Carbon::SATURDAY || $day->dayOfWeek == Carbon::SUNDAY)
                    continue;

            $dayStart = $day->format('Y-m-d H:i');
            $dayEnd = $day->endOfDay()->format('Y-m-d H:i');

            $days[$dayStart] = Todo::where(function ($q) use ($dayStart, $dayEnd) {
                $q->whereBetween('start_date', [$dayStart, $dayEnd]);
                $q->orWhereBetween('end_date', [$dayStart, $dayEnd]);
            })
                ->orWhere(function ($q) use ($dayStart, $dayEnd) {
                    $q->where('start_date', '<=', $dayStart);
                    $q->where('end_date', '>=', $dayEnd);
                })
                ->get();
        }

        return view('dashboard', compact('days', 'showWeekend'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'body' => 'required',
        ]);

        $todo = new Todo();

        $todo->body = $request->body;
        $todo->assigned_by = $request->assigned_by;
        $todo->start_date = self::sanitizeDate($request->start_date);
        $todo->end_date = self::sanitizeDate($request->end_date);

        $todo->save();

        return redirect()->back();
    }

    private static function sanitizeDate($date)
    {
        return empty($date) ? Carbon::now()->format('Y-m-d') : $date;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return $todo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {

        $request->validate([
            'body' => 'required',
        ]);

        $todo->body = $request->body;
        $todo->assigned_by = $request->assigned_by;
        $todo->start_date = self::sanitizeDate($request->start_date);
        $todo->end_date = self::sanitizeDate($request->end_date);

        $todo->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
    }
}
