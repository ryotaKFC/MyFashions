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
    .create_btn {
  background-color: #1e3a8a; /* 深い青系 */
  color: #fff;
  font-size: 1.1rem;
  font-weight: bold;
  padding: 14px 30px;
  border: none;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s ease;
  display: inline-block;
  text-align: center;
}

.create_btn:hover {
  /* background-color: #777;  */
}

</style>
