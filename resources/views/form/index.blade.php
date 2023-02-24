@php
$title = '応募フォーム';
@endphp

@extends('layout')
 
@section('content')
<div class="col-12 mt-3 mb-3">
  <h1>応募フォーム</h1>
  <p>以下の応募フォームに必要事項をご入力いただきまして、「入力内容確認」ボタンを押してください。</p>
</div>
<div class="col-12 mb-5">
  <form method="POST" action="{{ route('form.post') }}" enctype="multipart/form-data">
    @csrf
    <div class="row col-12 mt-3">
      <div class="col-2">
        <label for="InputName" class="form-label required">名前</label>
      </div>
      <div class="col-10">
        <input type="text" name="InputName" value="{{ old('InputName') }}" class="form-control" id="InputName" aria-describedby="nameHelp" placeholder="応募　太郎" required>
        @if ($errors->has('InputName'))
          <p class="error-message">
            {{ $errors->first('InputName') }}
          </p>
        @endif
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        <label for="InputMail" class="form-label required">メールアドレス</label>
      </div>
      <div class="col-10">
        <input type="email" name="InputMail" value="{{ old('InputMail') }}" class="form-control" id="InputMail" aria-describedby="mailHelp" placeholder="example-test@example.test" required>
        @if ($errors->has('InputMail'))
          <p class="error-message">
            {{ $errors->first('InputMail') }}
          </p>
        @endif
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        <label for="InputZip" class="form-label required">郵便番号</label>
      </div>
      <div class="col-10">
        <input type="text" name="InputZip" value="{{ old('InputZip') }}" class="form-control" id="InputZip" aria-describedby="zipHelp" placeholder="1234567" required>
        <div id="zipHelp" class="form-text">ハイフン( - )不要</div>
        @if ($errors->has('InputZip'))
          <p class="error-message">
            {{ $errors->first('InputZip') }}
          </p>
        @endif
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        <label for="InputPrefecture" class="form-label required">都道府県</label>
      </div>
      <div class="col-10">
        <select name="InputPrefecture" id="InputPrefecture" class="form-select" aria-describedby="prefectureHelp" requred>
          @include('form/selectPrefecture')
        </select>
        @if ($errors->has('InputPrefecture'))
          <p class="error-message">
            {{ $errors->first('InputPrefecture') }}
          </p>
        @endif
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        <label for="InputAddress" class="form-label required">住所</label>
      </div>
      <div class="col-10">
        <input type="text" name="InputAddress" value="{{ old('InputAddress') }}" class="form-control" id="InputAddress" aria-describedby="addressHelp" placeholder="〇〇市××町 △丁目□番地ＸＹＺ" required>
        @if ($errors->has('InputAddress'))
          <p class="error-message">
            {{ $errors->first('InputAddress') }}
          </p>
        @endif
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        <label for="InputBuilding" class="form-label">建物名など</label>
      </div>
      <div class="col-10">
        <input type="text" name="InputBuilding" value="{{ old('InputBuilding') }}" class="form-control" id="InputBuilding" aria-describedby="buildingHelp" placeholder="〇×マンション　△△△号室">
        @if ($errors->has('InputBuilding'))
          <p class="error-message">
            {{ $errors->first('InputBuilding') }}
          </p>
        @endif
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        <label for="InputGender" class="form-label required">性別</label>
      </div>
      <div class="row col-10">
        <div class="col-1">
          <input class="form-check-input" type="radio" name="InputGender" value="1" id="InputGender1" @if(old('InputGender') == 1) checked @endif>
          <label class="form-check-label" for="InputGender1">
            男性
          </label>
        </div>
        <div class="col-1">
          <input class="form-check-input" type="radio" name="InputGender" value="2" id="InputGender2" @if(old('InputGender') == 2) checked @endif>
          <label class="form-check-label" for="InputGender2">
            女性
          </label>
        </div>
        <div class="col-2">
          <input class="form-check-input" type="radio" name="InputGender" value="0" id="InputGender0" @if(old('InputGender') == 0) checked @endif>
          <label class="form-check-label" for="InputGender0">
            選択しない
          </label>
        </div>
        @if ($errors->has('InputGender'))
          <p class="error-message">
            {{ $errors->first('InputGender') }}
          </p>
        @endif
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        <label for="InputImage" class="form-label">画像</label>
      </div>
      <div class="col-10">
        @if ($image)
          <div class="image_form">
            <img src="{{ asset($image)}}">
          </div>
        @endif
        <input type="file" name="InputImage" value="{{ old('InputImage') }}" class="form-control" id="InputImage" aria-describedby="imageHelp">
        <div id="imageHelp" class="form-text">画像形式のみ( .jpg .png .gif )</div>
        @if ($errors->has('InputImage'))
          <p class="error-message">
            {{ $errors->first('InputImage') }}
          </p>
        @endif
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        <label for="InputTel" class="form-label required">電話番号</label>
      </div>
      <div class="col-10">
        <input type="tel" name="InputTel" value="{{ old('InputTel') }}" class="form-control" id="InputTel" aria-describedby="telHelp" placeholder="00000000000" required>
        <div id="telHelp" class="form-text">ハイフン( - )不要</div>
        @if ($errors->has('InputTel'))
          <p class="error-message">
            {{ $errors->first('InputTel') }}
          </p>
        @endif
      </div>
    </div>
    <div class="row col-12 mt-3">
      <div class="col-2">
        <label for="InputMessage" class="form-label">メッセージ</label>
      </div>
      <div class="col-10">
        <textarea class="form-control" name="InputMessage" id="InputMessage" aria-describedby="messageHelp" rows="5">{{ old('InputMessage') }}</textarea>
        @if ($errors->has('InputMessage'))
          <p class="error-message">
            {{ $errors->first('InputMessage') }}
          </p>
        @endif
      </div>
    </div>
    <div class="col-10 offset-2 mt-5">
      <button type="submit" class="btn btn-primary">
          入力内容確認
      </button>
    </div>
  </form>
</div>
@endsection