@extends('layouts.app')

<style>
    input[type="date"] {
        width: 200px;
    }
</style>

@section('content')

<h1>タスクを新規追加</h1>

<form action="{{ route('tasks.store') }}" method="post">
@csrf
    <div class="mb-3">
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title" class="form-control
        @error('title')
            is-invalid
        @enderror
        " value="{{ old('title') }}" aria-describedby="validateTitle">
        @error('title')
            <div id="validateTitle" class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="expiration_date">期限日</label>
        <input type="date" name="expiration_date" id="expiration_date" class="form-control
        @error('expiration_date')
            is-invalid
        @enderror
        " value="{{ old('expiration_date') }}" aria-describedby="validateExpirationDate">
        @error('expiration_date')
            <div id="validateExpirationDate" class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="completion_date">完了日</label>
        <input type="date" name="completion_date" id="completion_date" class="form-control
        @error('completion_date')
            is-invalid
        @enderror
        " value="{{ old('completion_date') }}" aria-describedby="validCompletionDate">
        @error('completion_date')
            <div id="validCompletionDate" class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description">説明</label>
        <textarea name="description" id="description" rows="5" class="form-control
        @error('description')
            is-invalid
        @enderror
        " aria-describedby="validDescription">{{ old('description') }}</textarea>
        @error('description')
            <div id="validDescription" class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit">送信</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">もどる</a>
</form>

@endsection