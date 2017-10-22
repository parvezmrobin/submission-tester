@extends("layouts.app")

@section('style')
    <style>
        .removed {
            color: red;
        }

        .added {
            color: deepskyblue;
        }
    </style>
@endsection

@section("content")
    <div class="container" style="font-weight: bold; font-size: large">
        <div class="col-sm-6" id="first">
            {!! $str1!!}
        </div>
        <div class="col-sm-6">
            {!! $str2 !!}
        </div>
    </div>
@endsection

@section('script')
    <script>
//        $(document).ready(function () {
//            var text = $("#first").text();
//            $("#first").html(text);
//        })
    </script>
@endsection