@extends('layouts.app')
@section('content')
@include('commons.errors')

<form action="{{ route('fashions.store') }}" method="post" enctype="multipart/form-data">
    <div>
        @include('components.form')
    </div>
    <div>
        <button type="submit" class="create_btn theme-primary-color">登録する</button>
    </div>
    <div>
        <a href="{{ route('fashions.index') }}">キャンセル</a>
    </div>
</form> 
@endsection()
<style>
    .create_btn{
        background: linear-gradient(to bottom,rgb(147, 199, 241),hsl(209, 72.50%, 57.30%)); /* グラデーション青 */
        border: none;
        padding: 10px 25px;
        color: white;
        font-weight: bold;
        border-radius: 25px;
        cursor: pointer;
        font-size: 1rem;
        box-shadow: 0 4px 6px rgba(100, 150, 255, 0.4);
        transition: all 0.3s ease;
        margin-top: 15px;
    }

    .create_btn:hover {
        background: linear-gradient(to bottom, #4aa8ff, #007acc);
        box-shadow: 0 6px 12px rgba(100, 150, 255, 0.6);
        transform: translateY(-2px);
    }


</style>
