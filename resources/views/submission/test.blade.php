@extends("layouts.app")

@section('style')
    <style>
        .removed {
            background-color: red;
        }

        .added {
            background-color: green;
        }

        .start {
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .end {
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }

        pre {
            padding: 2px 4px;
            font-size: 90%;
            color: #fff;
            background-color: #333;
            border-radius: 3px;
            -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.25);
            box-shadow: inset 0 -1px 0
        }
    </style>
@endsection

@section("content")
    <div class="container" style="background-color: #444; border-radius: 3px">
        <h2 class="page-header" style="color: #eee;">Compare</h2>
        <pre class="col-sm-6 lead">{!! $str1!!}</pre>
        <pre class="col-sm-6 lead">{!! $str2 !!}</pre>
    </div>
@endsection

@section('script')
    <script>
        const removed = $('.removed');
        $(removed).filter(function () {
            return !$(this).prev().hasClass('removed')
        }).addClass('start');
        $(removed).filter(function () {
            return !$(this).next().hasClass('removed')
        }).addClass('end');

        const added = $('.added');
        $(added).filter(function () {
            return !$(this).prev().hasClass('added')
        }).addClass('start');
        $(added).filter(function () {
            return !$(this).next().hasClass('added')
        }).addClass('end');
    </script>
@endsection