@extends('admin.layouts.base')

@section('main')
    <form method="post" action="{{ url('/management/quote/create') }}">
        {{ csrf_field() }}
        <input type="hidden" name="user" value="{{ $authUser->id }}">
        <div class="row">
            <div class="col-md-3 form-group">
                <label for="author">نام گوینده</label>
                <input class="form-control" type="text" name="author" id="author"
                       style="direction: rtl; text-align: right">
            </div>
            <div class="col-md-9 form-group">
                <label for="body">متن نقل قول</label>
                <textarea class="form-control" type="text" name="body" id="body"
                          style="direction: rtl; text-align: right"></textarea>
            </div>
        </div>
        <br>
        <input class="btn btn-success" type="submit" value="ثبت">
        <br>
        <br>
    </form>
@endsection