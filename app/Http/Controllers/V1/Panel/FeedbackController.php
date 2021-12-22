<?php

namespace App\Http\Controllers\V1\Panel;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //todo
        if(auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399')) {

            $feedbacks = Feedback::latest()->paginate(10);
            return view('v1.panel.layouts.feedback.feedbacks', compact('feedbacks'));
        } else {

            return abort(403, 'Forbidden');
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function watch(Feedback $feedback)
    {
        //todo
        if(auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399')) {

            DB::transaction(function () use($feedback) {
                if($feedback->show != true) {

                    $feedback = $feedback->update([
                        'show' => true
                    ]);
                } else {

                    $feedback = $feedback->update([
                        'show' => false
                    ]);
                }
            });
            
            $this->custom_alert('Feedback ', 'Updated');
            return redirect()->route('feedbacks.index');
        } else {

            abort(403, 'Forbidden.');
        }
    }
}
