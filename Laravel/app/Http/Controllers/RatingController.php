<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Message;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use Illuminate\Http\Request;


class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreRatingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rating = new Rating;
        $rating->user_from = auth()->user()->id;
        $rating->user_to = $request->user_id;
        $rating->rate = $request->stars;
        $rating->review = $request->review;
        $rating->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('user.feedback');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRatingRequest  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }

    public function check(Request $request)
    {
        $rating = Rating::where('user_from',auth()->user()->id)->where('user_to',$request->id)->first();
        if($rating)
        {
            return false;
        }
        else
        {
            $message_to = Message::where('to_user',auth()->user()->id)->where('from_user',$request->id)->first();
            $message_from = Message::where('to_user',$request->id)->where('from_user',auth()->user()->id)->first();
            if($message_to && $message_from)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        
    }
}
