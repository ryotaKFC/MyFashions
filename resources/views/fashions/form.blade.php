@csrf 
<dl class="form-list">
    <dt>写真</dt>
    <dd><input type="file" name="photo_path" accept="image/*"></dd>
    <dt>名前</dt>
    <dd><input type="text" name="name" value="{{ old('name') }}"></dd>
    <dt>季節</dt>
    <dd><input type="text" name="season" value="{{ old('season') }}"></dd>
    <dt>天気</dt>
    <dd><input type="text" name="weather" value="{{ old('weather') }}"></dd>
    <dt>温度</dt>
    <dd><input type="text" name="temperature" value="{{ old('temperature') }}"></dd>
    <dt>湿度</dt>
    <dd><input type="text" name="humidity" value="{{ old('humidity') }}"></dd>
</dl>
