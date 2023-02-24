@php
$title = '応募内容確認';
@endphp

@extends('layout')

@section('content')
<div class="col-12 mt-5 mb-5">
  <h1>応募内容確認</h1>
  <p>入力内容をご確認いただき、よろしければ「送信する」ボタンを押してください。</p>
</div>
<div class="col-12 mb-5">
  <form method="post" action="{{ route('form.send') }}">
    @csrf
    <div class="row col-12 mt-3">
      <div class="col-2">
        名前
      </div>
      <div class="col-10">
        {{ $input["InputName"] }}
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        メールアドレス
      </div>
      <div class="col-10">
        {{ $input["InputMail"] }}
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        郵便番号
      </div>
      <div class="col-10">
        {{ $input["InputZip"] }}
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        都道府県
      </div>
      <div class="col-10">
        {{ $input["InputPrefecture"] }}
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        都道府県
      </div>
      <div class="col-10">
        {{ $input["InputPrefecture"] }}
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        住所
      </div>
      <div class="col-10">
        {{ $input["InputAddress"] }}
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        建物名など
      </div>
      <div class="col-10">
        {{ $input["InputBuilding"] }}
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        性別
      </div>
      <div class="col-10">
        @if ( $input["InputGender"] == 0)
            選択なし
        @elseif ( $input["InputGender"] == 1)
            男性
        @elseif ( $input["InputGender"] == 2)
            女性
        @else
        
        @endif
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        画像
      </div>
      <div class="col-10">
      @if ($image)
        <img src="{{ asset($image)}}" class="image_preview">
      @endif
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        電話番号
      </div>
      <div class="col-10">
        {{ $input["InputTel"] }}
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        メッセージ
      </div>
      <div class="col-10">
        {!! nl2br(e($input["InputMessage"])) !!}
      </div>
    </div>
    <div class="row col-10 offset-2 mt-5">
      <div class="col-1">
        <input name="back" class="btn btn-secondary" type="submit" value="戻る" />
      </div>
      <div class="col-1">
        <input type="submit" class="btn btn-primary ml-5" value="送信" />
      </div>
    </div>
  </form>
</div>
@endsection