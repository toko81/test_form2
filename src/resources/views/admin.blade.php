@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('link')
<form action="/logout" method="post">
  @csrf
  <input class="header__link" type="submit" value="logout">
</form>
@endsection

@section('content')

<div class="main-content">
    <h2 class="admin-title">Admin</h2>
    <form action="{{ route('contacts.search') }}" method="GET" class="search-form">
        <div class="search-container">
            <div class="search-input-group">
                <input type="text" name="name" value="{{ request('name') }}" placeholder="名前やメールアドレスを入力してください" class="search-input">
                <select name="gender" class="search-select">
                    <option value="">性別</option>
                        <option value="all" @if(request('gender') == 'all') selected @endif>全て</option>
                        <option value="male" @if(request('gender') == 'male') selected @endif>男性</option>
                        <option value="female" @if(request('gender') == 'female') selected @endif>女性</option>
                        <option value="all" @if(request('gender') == 'all') selected @endif>全て</option>
                        <option value="male" @if(request('gender') == 'male') selected @endif>男性</option>
                        <option value="female" @if(request('gender') == 'female') selected @endif>女性</option>
                        <option value="other" @if(request('gender') == 'other') selected @endif>その他</option>
                </select>
                <select name="category" class="search-select">
                    <option value="">お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(request('category') == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
                <input type="date" name="date" value="{{ request('date') }}" class="search-input date-input">
            </div>
            <div class="search-actions">
                <button type="submit" class="search-btn">検索</button>
                <a href="{{ route('contacts.index') }}" class="reset-btn">リセット</a>
            </div>
        </div>
        <div class="export-container">
            <button type="submit" name="export" value="true" class="export-btn">エクスポート</button>
        </div>
    </form>
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->fullname }}</td>
                    <td>{{ $contact->gender_text }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->name }}</td>
                    <td><button type="button" class="detail-btn" data-contact-id="{{ $contact->id }}">詳細</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection