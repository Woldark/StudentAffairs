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
    @if(count($comments)>0)
        <br>
        <br>
        <br>
        <br>
        <a class="btn btn-success" href="{{ url('/management/comment/confirm') }}">تایید تمام نظرات</a>
        <br>
        <br>
        <table class="table table-bordered table-striped table-hover table-condensed table-responsive">
            <thead>
            <tr>
                <th>
                    فرستنده
                </th>
                <th>
                    ایمیل
                </th>
                <th>
                    وب سایت
                </th>
                <th>
                    محتوا
                </th>
                <th>
                    وضعیت
                </th>
                <th>
                    تاریخ
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td STYLE="width: 15%">
                        <p>{{ $comment->name }}</p>
                        <br>
                        <p id="links">
                            <a href="{{ url('/management/comment/delete/'.$comment->id) }}" style="color: red">حذف</a>
                            &nbsp&nbsp|&nbsp&nbsp
                            <a href="{{ url('/management/comment/confirm/'.$comment->id) }}" style="color: green">تایید</a>
                            &nbsp&nbsp|&nbsp&nbsp
                            <a href="{{ url('/blog/post/'.$comment->post->slug) }}" target="_blank" style="color: blue">پست</a>
                        </p>
                    </td>
                    <td style="width: 12%">
                        <p>{{ $comment->email }}</p>
                    </td>
                    <td style="width: 13%">
                        <p>{{ $comment->website }}</p>
                    </td>
                    <td style="width: 40%">
                        <p>{{ $comment->body }}</p>
                    </td>
                    <td style="width: 5%">
                        <p>{{ $comment->confirm }}</p>
                    </td>
                    <td style="width: 15%">
                        <p style="direction: ltr">{{ $comment->create_date }}</p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <br>
    @else
        <h4 style="text-align: center">هیچ نظری ثبت نشده است</h4>
        <br>
        <br>
    @endif
@endsection