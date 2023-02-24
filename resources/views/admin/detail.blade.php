@php
$title = '応募内容詳細';
@endphp

@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
              <div class="card-header">
                <h1 class="col-md-10">応募内容詳細</h1>
                <div class="col-md-2 logout">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" value="ログアウト" class="btn btn-warning">
                    </form>
                </div>
            </div>
              <div class="card-body">
                  <div class="row col-12">
                      <div class="row col-12 mt-3">
                          <div class="col-3">
                            名前
                          </div>
                          <div class="col-9">
                            {{ $entry->name }}
                          </div>
                        </div>
                  </div>
                  <div class="row col-12 mt-3">
                      <div class="col-3">
                        メールアドレス
                      </div>
                      <div class="col-9">
                        {{ $entry->email }}
                      </div>
                  </div>
                  <div class="row col-12 mt-3">
                      <div class="col-3">
                        郵便番号
                      </div>
                      <div class="col-9">
                        {{ $entry->zip }}
                      </div>
                  </div>
                  <div class="row col-12 mt-3">
                      <div class="col-3">
                        都道府県
                      </div>
                      <div class="col-9">
                        {{ $entry->prefecture }}
                      </div>
                  </div>
                  <div class="row col-12 mt-3">
                      <div class="col-3">
                        住所
                      </div>
                      <div class="col-9">
                        {{ $entry->address }}
                      </div>
                  </div>
                  @if ($entry->building)
                    <div class="row col-12 mt-3">
                        <div class="col-3">
                          建物名
                        </div>
                        <div class="col-9">
                          {{ $entry->building }}
                        </div>
                    </div>
                  @endif
                  <div class="row col-12 mt-3">
                      <div class="col-3">
                        性別
                      </div>
                      <div class="col-9">
                          @if ( $entry->gender == 0)
                              選択なし
                          @elseif ( $entry->gender == 1)
                              男性
                          @elseif ( $entry->gender == 2)
                              女性
                          @endif
                      </div>
                  </div>
                  @if ($entry->image)
                    <div class="row col-12 mt-3">
                        <div class="col-3">
                          画像
                        </div>
                        <div class="col-9">
                            <img src="{{ asset($entry->image)}}" class="image_preview">
                        </div>
                    </div>
                  @endif
                  <div class="row col-12 mt-3">
                      <div class="col-3">
                        電話番号
                      </div>
                      <div class="col-9">
                        {{ $entry->tel }}
                      </div>
                  </div>
                  <div class="row col-12 mt-3">
                      <div class="col-3">
                        メッセージ
                      </div>
                      <div class="col-9">
                        {{ $entry->message }}
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <a href="/admin" class="btn btn-secondary">
                 << 一覧へ戻る
            </a>
        </div>
    </div>
</div>
@endsection
