@extends('admin.layouts.base')

@section('styles')
    <style>
        #links {
            display: none;
            opacity: 0.7;
            font-size: small;
            margin-top: 3px;
        }

        tr:hover #links {
            display: block;
        }

        th {
            color: #0f0f0f;
            background-color: darkgrey;
        }
    </style>
@endsection

@section('main')
    @if(count($posts)>0)
        <br>
        <br>
        <br>
        <br>
        <a class="btn btn-success" href="{{ url('/management/post/confirm') }}">تایید تمام پست ها</a>
        <br>
        <br>
        <table class="table table-bordered table-striped table-hover table-condensed table-responsive">
            <thead>
            <tr>
                <th>
                    عنوان
                </th>
                <th>
                    نویسنده
                </th>
                <th>
                    دسته بندی
                </th>
                <th>
                    تگ ها
                </th>
                <th>
                    کامنت
                </th>
                <th>
                    تاریخ
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td STYLE="width: 30%">
                        <a href="{{ url('/post/'.$post->slug) }}">{{ $post->title }}</a>
                        <br>
                        <p id="links">
                            <a href="{{ url('/management/post/edit/'.$post->id) }}" style="color: #1f648b">ویرایش</a>
                            &nbsp&nbsp|&nbsp&nbsp
                            <a href="{{ url('/management/post/delete/'.$post->id) }}" style="color: red">حذف</a>
                            &nbsp&nbsp|&nbsp&nbsp
                            <a href="{{ url('/management/post/confirm/'.$post->id) }}" style="color: green">تایید</a>
                        </p>
                    </td>
                    <td style="width: 12%">
                        <a href="{{ url('/users/'.$post->user->id) }}">{{ $post->user->name }}</a>
                    </td>
                    <td style="width: 12%">
                        <a href="{{ url('/users/'.$post->category->id) }}">{{ $post->category->name }}</a>
                    </td>
                    <td style="width: 26%">
                        {{ str_replace('-', ' - ', $post->tags) }}
                    </td>
                    <td style="width: 5%">
                        {{ count($post->comments) }}
                    </td>
                    <td style="width: 15%">
                        <p style="direction: ltr">{{ $post->create_date }}</p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <br>
    @else
        <h4 style="text-align: center">هیچ پستی ثبت نشده است</h4>
        <br>
        <br>
    @endif
@endsection