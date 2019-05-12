@extends('layouts.email')

@section('main')
    <div>
        [Realty-edits] - Thông tin người dùng liên hệ<br>
        <br>
        <br>
        <br>
        ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝<br>
        <strong>Tên người dùng:</strong> {{ $firstName }} {{ $lastName }}<br>
        <strong>Công ty:</strong> {{ $company }}<br>
        <strong>Email:</strong> {{ $email }}<br>
        <strong>Thông điệp:</strong> {{ $content }}<br>

        ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝<br>
        <br>
        <a href="{{ route('backend.home.index') }}">Xem danh sách liên hệ</a> <br>
        <a href="{{ route('backend.home.edit', $id) }}">Chỉnh sửa liên hệ này</a> <br>
        <br>
        <br>
        <br>
        info@realty-edit.scom<br>
         (+84) 97 6243 323<br>
        CT1 A1 Building, Hoang Liet Str., Hoang Mai Dis., Hanoi, Vietnam, 100000<br>
    </div>
@stop
