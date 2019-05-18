@extends('layouts.email')

@section('main')
    <div>
        [Realty-edits] - Thông tin người dùng liên hệ<br>
        <br>
        <br>
        <br>
        ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝<br>
        <strong>Tên người dùng:</strong> {{ $name }}<br>
        <strong>Email:</strong> {{ $email }}<br>
        <strong>Thông điệp:</strong> {{ $content }}<br>

        ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝<br>
        <br>
        <br>
        info@realty-edits.com<br>
         (+84) 36 681 1991‬<br>
        CT1 A1 Building, Hoang Liet Str., Hoang Mai Dis., Hanoi, Vietnam, 100000<br>
    </div>
@stop
