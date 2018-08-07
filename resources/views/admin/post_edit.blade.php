@extends('admin.layouts.base')

@section('main')
    <form method="post" action="{{ route('admin::posts.edit') }}">
        {{ csrf_field() }}
        <input type="hidden" name="user" value="{{ $authUser->id }}">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="title">عنوان پست</label>
                <input class="form-control" type="text" name="title" id="title"
                       style="direction: rtl; text-align: right">
            </div>
            <div class="col-md-6 form-group">
                <label for="category">دسته بندی</label>
                <select id="category" type="text" style="text-align: center"
                        class="form-control" tabindex="5"
                        name="category" required>
                    <option>انتخاب کنید</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <br>
        <div class="form-group">
            <label for="content">محتوای پست</label>
            <textarea class="form-control" id="content" name="body"
                      style="direction: rtl; text-align: right"></textarea>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="tags" style="direction: rtl">تگ ها ( با - جدا شوند )</label>
                <input class="form-control" type="text" name="tags" id="tags">
            </div>
            <div class="col-md-6 form-group">
                <label for="slug" style="direction: rtl">اسلاگ ( اختیاری )</label>
                <input class="form-control" type="text" name="slug" id="slug">
            </div>
        </div>
        <br>
        <input class="btn btn-success" type="submit" value="post">
    </form>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>

    <script>
        CKEDITOR.config.contentsLangDirection = 'rtl';
        CKEDITOR.config.language = 'fa';
        CKEDITOR.replace('content');
    </script>
@endsection