@extends('layouts.app')
@section('content')
@include('commons.errors')

<x-form.base action="{{ route('fashions.store') }}" method="post" enctype="multipart/form-data">
    <img id="preview" class="max-w-48 mx-auto"/>
    <x-form.input label="写真" name="photo" type="file" accept="image/*" required />
    <x-form.select label="季節" name="season" :options="['春','夏','秋','冬']" required />
    <x-form.select label="天気" name="weather" :options="['晴れ', '曇り', '雨', '雪']" required />
    <x-form.input label="気温" name="temperature" type="number" placeholder="℃" required />
    <x-form.input label="湿度" name="humidity" type="number" placeholder="％" required />
    <x-form.input label="日付" name="created_at" type="date" value="{{\Carbon\Carbon::today()->format('Y-m-d')}}" required />
    <x-button type="submit" class="my-3">登録する</x-button>
</x-form.base>
<a href="home">キャンセル</a>


<script>
    document.getElementById('photo').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (event) {
        const preview = document.getElementById('preview');
        preview.src = event.target.result;
        preview.style.display = 'block';
      };

      reader.readAsDataURL(file);
    }
  });
</script>

@endsection()
