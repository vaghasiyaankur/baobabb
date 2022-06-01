@extends('user.layouts.app')
@section('content')
    <div class="details-box">
        <div>
            <h3><b>Feedback</b></h3>
        </div>
        <div class="row">
            <div class="col-lg-6 p-5">
                <div class="position-relative">
                    <div class="">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="feedback-user">
                        <span class="d-flex justify-content-end text-muted">By test</span>
                    </div>
                </div>
                <div class="feed-b-card p-4 bg-white mt-3 rounded-3">
                    <div class="feed_card_title d-flex align-items-center justify-content-between pb-3">
                        <h5 class="m-0" >from User</h5>
                        <div class="feed_s_icon">
                        <a href="javascript:;" class="text-dark"><i class="fa-solid fa-share"></i></a>
                        </div>
                    </div>
                    <div class="feed_vard_inner">
                        <form>
                            <div class="mb-2">
                                  <label for="exampleFormControlTextarea1" class="form-label">Answer *</label>
                                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            </div>
                            <div class="send_review">
                                <h6 class="text-muted">Respond to this review (This cannot be changed)</h6>
                                <a href="javascript:;"><button type="button" class="btn btn-primary btn-sm">SEND</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-5">
                 <div class="position-relative">
                    <div class="">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="feedback-user">
                        <span class="d-flex justify-content-end text-muted">By test</span>
                    </div>
                </div>
                <div class="feed-b-card p-4 bg-white mt-3 rounded-3">
                    <div class="feed_card_title d-flex align-items-center justify-content-between pb-3">
                        <h5 class="m-0">from Admin</h5>
                    </div>
                    <div class="feed_vard_inner px-4 py-2" style="background-color: whitesmoke;">
                        <h6 class="text-muted">Aouther's Response :</h6>
                        <p class="m-0">dsdsdsdsdsd</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
