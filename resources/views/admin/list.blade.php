@php
$title = '応募一覧';
@endphp

@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="col-md-10">応募一覧</h1>
                    <div class="col-md-2 logout">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input type="submit" value="ログアウト" class="btn btn-warning">
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">詳細</th>
                            <th scope="col">応募日時</th>
                            <th scope="col">名前</th>
                            <th scope="col">メールアドレス</th>
                            <th scope="col">削除</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($entries as $entry)
                                <tr>
                                    <th scope="row">
                                        <a href="/admin/detail?id={{ $entry->id }}" class="btn btn-primary">
                                            詳細
                                        </a>
                                    </th>
                                    <td>{{ $entry->created_at }}</td>
                                    <td>{{ $entry->name }}</td>
                                    <td>{{ $entry->email }}</td>
                                    <td>
                                        <a href="/admin/delete?id={{ $entry->id }}" class="btn btn-danger">
                                            削除
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
