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
    public function show(Rating $rating)
    {
        //
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

        $str = `<div id="reviewBtn" class="show-modal"><a href="javascript:;" class="launch-review">
        <i class="fa-solid fa-star"></i>
        <span>Rate Your Experience</span>
    </a>
</div>
{{-- Send Message Model --}}
<div id="testmodal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h4 class="modal-title">Rate Your Experience</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body login_modal p-2">
                <form action="{{route('user.rating.post')}}" method="post">
                    @csrf
                    <h5 class="modal-title mb-4" id="exampleModalLabel">Your Rating*</h5>
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="rating">
                        <label>
                            <input type="radio" name="stars" value="1" />
                            <span class="icon">✰</span>
                        </label>
                        <label>
                            <input type="radio" name="stars" value="2" />
                            <span class="icon">✰</span>
                            <span class="icon">✰</span>
                        </label>
                        <label>
                            <input type="radio" name="stars" value="3" />
                            <span class="icon">✰</span>
                            <span class="icon">✰</span>
                            <span class="icon">✰</span>
                        </label>
                        <label>
                            <input type="radio" name="stars" value="4" />
                            <span class="icon">✰</span>
                            <span class="icon">✰</span>
                            <span class="icon">✰</span>
                            <span class="icon">✰</span>
                        </label>
                        <label>
                            <input type="radio" name="stars" value="5" required/>
                            <span class="icon">✰</span>
                            <span class="icon">✰</span>
                            <span class="icon">✰</span>
                            <span class="icon">✰</span>
                            <span class="icon">✰</span>
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                    <h5 class="modal-title mb-4" id="exampleModalLabel">Write Review*</h5>
                    <textarea name="review" id="review" cols="30" rows="5" class="form-control border-0 border-bottom p-0 rounded-0" required></textarea>
                            <span class="error text-danger"></span>
                        </div>
                    </div>
                    <div class="ajax-form-result pb-3">
                        <div class="alert-error" id="login_alert_error"></div>
                    </div>
                    <div class="ajax-form-result pb-3">
                        <div class="alert-success" id="login_alert_success"></div>
                    </div>
                    <div class="my-4">
                        <button type="submit" id="login_btn" class="btn model_btn w-100 fw-bold"
                            type="button">SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>`;

        $rating = Rating::where('user_from',auth()->user()->id)->where('user_to',$request->id)->first();
        if($rating)
        {
            return $str;
        }
        else
        {
            $message_to = Message::where('to_user',auth()->user()->id)->where('from_user',$request->id)->first();
            $message_from = Message::where('to_user',$request->id)->where('from_user',auth()->user()->id)->first();
            if($message_to && $message_from)
            {
                return $str;
            }
            else
            {
                return $str;
            }
        }
        
    }
}
