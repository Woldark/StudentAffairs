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
    @if(count($categories)>0)
        <br>
        <br>
        <br>
        <br>
        <table class="table table-bordered table-striped table-hover table-condensed table-responsive">
            <thead>
            <tr>
                <th>
                    عنوان
                </th>
                <th>
                    نوع
                </th>
                <th>
                    تاریخ
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td style="width: 50%">
                        <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                        <br>
                        <p id="links">
                            <a href="#" style="color: #1f648b">ویرایش</a>
                            &nbsp&nbsp|&nbsp&nbsp
                            <a href="{{ url('/management/category/delete/'.$category->id) }}" style="color: red">حذف</a>
                        </p>
                    </td>
                    <td style="width: 25%">
                        @if($category->type==0)
                            <p>پست</p>
                        @else
                            <p>عکس</p>
                        @endif
                    </td>
                    <td style="width: 25%">
                        <p style="direction: ltr">{{ $category->create_date }}</p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <br>
    @else
        <h4 style="text-align: center">هیچ دسته بندی ثبت نشده است</h4>
        <br>
        <br>
    @endif
@endsection