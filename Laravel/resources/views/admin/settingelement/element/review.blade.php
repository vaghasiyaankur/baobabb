<form
    action="@if (isset($elementdata)){{ route('admin.setting.element.put', ['elementupdate' => $element]) }}@else{{ route('admin.setting.element.store', ['element' => $element]) }}@endif"
    method="post" enctype="multipart/form-data">
    @csrf
    {{-- @if (isset($elementdata))@method('PUT')@endif --}}
    <input type="hidden" name="name" value="{{ $element }}">
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3>
                <div class="mb-3 col-md-6">
                    <h3><b>Reviews</b></h3>
                </div>
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="guests_comments" value="0">
                    <input type="checkbox" value="1" name="guests_comments" class="form-check-input"
                        style="cursor: pointer;" {{ @$elementdata->guests_comments == 1 ? 'checked' : '' }}>
                    <label class="form-check-label fw-bolder">Allow Guests to post Reviews</label>
                    <div class="form-text">Allow guest users to post Ratings and Comments</div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary ms-3"> Submit </button>
        </div>
    </div>
</form>
