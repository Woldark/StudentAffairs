@extends('admin.layouts.base')

@section('main')
    <form method="post" action="{{ route('admin::categories.edit') }}">
        {{ csrf_field() }}
        <input type="hidden" name="user" value="{{ $authUser->id }}">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="name">نام دسته بندی</label>
                <input class="form-control" type="text" name="name" id="name" value="{{$category->name}}"
                       style="direction: rtl; text-align: right">
            </div>
            <div class="col-md-6 form-group">
                <label for="type">دسته بندی</label>
                <select id="type" type="text" style="text-align: center"
                        class="form-control" tabindex="5"
                        name="type" required>
                    <option value="0">پست</option>
                    <option value="1">عکس</option>
                </select>
            </div>
        </div>
        <br>
        <input class="btn btn-success" type="submit" value="ثبت">
        <br>
        <br>
    </form>
@endsection