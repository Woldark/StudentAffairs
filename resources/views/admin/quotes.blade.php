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
    @if(count($quotes)>0)
        <br>
        <br>
        <br>
        <br>
        <table class="table table-bordered table-striped table-hover table-condensed table-responsive">
            <thead>
            <tr>
                <th>
                    گوینده
                </th>
                <th>
                    متن
                </th>
                <th>
                    تاریخ
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($quotes as $quote)
                <tr>
                    <td style="width: 20%">
                        <a href="{{ url('/quotes/'.$quote->id) }}">{{ $quote->author }}</a>
                        <br>
                        <p id="links">
                            <a href="#" style="color: #1f648b">ویرایش</a>
                            &nbsp&nbsp|&nbsp&nbsp
                            <a href="{{ url('/management/quote/delete/'.$quote->id) }}" style="color: red">حذف</a>
                        </p>
                    </td>
                    <td style="width: 60%;">
                        <p style="direction: ltr !important;">{{ $quote->quote }}</p>
                    </td>
                    <td style="width: 20%">
                        <p style="direction: ltr">{{ $quote->create_date }}</p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <br>
    @else
        <h4 style="text-align: center">هیچ نقل قولی ثبت نشده است</h4>
        <br>
        <br>
    @endif
@endsection