@extends('user.layouts.app')
@section('content')
<style>
    .checked{
        font-weight: 600 !important;
    }
</style>
    <div class="details-box">
        <div>
            <h3><b>Feedback</b></h3>
        </div>
        <div class="row">
            @if(count($ratings) > 0)
                @foreach($ratings as $rating)
                <?php $child = App\Models\Rating::where('parent_id',$rating->id)->first(); ?>
                    <div class="col-lg-6 p-5">
                        <div class="position-relative">
                            <div class="">
                                <span class="fa-star fa-regular @if($rating->rate >= 1) checked @endif"></span>
                                <span class="fa-star fa-regular @if($rating->rate >= 2) checked @endif"></span>
                                <span class="fa-star fa-regular @if($rating->rate >= 3) checked @endif"></span>
                                <span class="fa-star fa-regular @if($rating->rate >= 4) checked @endif"></span>
                                <span class="fa-star fa-regular @if($rating->rate >= 5) checked @endif"></span>
                            </div>
                            <div class="feedback-user">
                                <span class="d-flex justify-content-end text-muted">By {{$rating->from_user->name}}</span>
                            </div>
                        </div>
                        <div class="feed-b-card p-4 bg-white mt-3 rounded-3">
                            <div class="feed_card_title d-flex align-items-center justify-content-between pb-3">
                                <h5 class="m-0" >{{$rating->review}}</h5>
                                <div class="feed_s_icon">
                                    @if($child == null)
                                    <a href="javascript:;" class="response" data-id="{{$rating->id}}" class="text-dark"><i class="fa-solid fa-share"></i></a>
                                    @endif
                                </div>
                            </div>
                            @if($child == null)
                                <div class="feed_vard_inner" id="response-model-{{$rating->id}}" style="display: none;">
                                    <form action="{{route('user.response.store')}}" method="POST">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="exampleFormControlTextarea1" class="form-label">Answer *</label>
                                            <input type="hidden" name="parent_id" value="{{$rating->id}}">
                                            <textarea class="form-control" id="response" name="response" rows="5" required></textarea>
                                        </div>
                                        <div class="send_review">
                                            <h6 class="text-muted">Respond to this review (This cannot be changed)</h6>
                                            <a href="javascript:;"><button type="submit" class="btn btn-primary btn-sm">SEND</button></a>
                                        </div>
                                    </form>
                                </div>
                            @else 
                                <div class="feed_vard_inner px-4 py-2" style="background-color: whitesmoke;">
                                    <h6 class="text-muted">Aouther's Response :</h6>
                                    <p class="m-0">{{$child->review}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else 
                <div class="col-md-12 text-center p-5">
                    <i class="fa-solid fa-question" style="font-size: 55px; color:#364b5a;"></i>
                    <h3>Currently you don't have any Feedback.</h3>
                </div>
            @endif
        </div>
    </div>

    <script>
        $('.response').click(function(){
            var id = $(this).data('id');
            console.log('#response-model-'+id);
            $('#response-model-'+id).toggle()
        })
    </script>
@endsection
