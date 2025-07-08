@csrf 
<dl class="form-list">
    <img id="preview" style="max-width: 200px; display: none;" />
    <dt>写真</dt>
    <dd><input type="file" name="photo" id="photoInput" accept="image/*"></dd>
    <dt>季節</dt>
    <dd>
      <select name="season">
          <option value="">選択してください</option>
          @foreach (['春', '夏', '秋', '冬'] as $option)
              <option value="{{ $option }}" {{ old('season') == $option ? 'selected' : '' }}>{{ $option }}</option>
          @endforeach
      </select>
    </dd>
    <dt>天気</dt>
    <dd>
      <select name="weather">
        <option value="">選択してください</option>
        @foreach (['晴れ', '曇り', '雨', '雪'] as $option)
            <option value="{{ $option }}" {{ old('weather') == $option ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
      </select>
    </dd>
    <dt>温度</dt>
    <dd>
      <input type="number" name="temperature" value="{{ old('temperature') }}" min="-20" max="50" step="5"> ℃
    </dd>
    <dt>湿度</dt>
    <dd>
      <input type="number" name="humidity" value="{{ old('humidity') }}" min="0" max="100" step="10"> %
    </dd>
    <!-- <dt>コメント</dt>
    <dd><input type="text" name="comment" value="{{ old('comment') }}"></dd> -->

</dl>

<script>
  document.getElementById('photoInput').addEventListener('change', function (e) {
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
<style>
  
</style>
