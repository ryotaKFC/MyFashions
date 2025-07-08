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


  // 季節自動入力
  const month = new Date().getMonth() + 1; // 0月始まりなので +1
  let season = '';
  if ([3, 4, 5].includes(month)) {
      season = '春';
  } else if ([6, 7, 8].includes(month)) {
      season = '夏';
  } else if ([9, 10, 11].includes(month)) {
      season = '秋';
  } else {
      season = '冬';
  }
document.querySelector('select[name="season"]').value = season;
  // 気温関係自動で入力
      navigator.geolocation.getCurrentPosition(success => {
        const lat = success.coords.latitude;
        const lon = success.coords.longitude;

        fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current=temperature_2m,relative_humidity_2m,weather_code&timezone=Asia%2FTokyo`)
            .then(response => response.json())
            .then(data => {
                const current = data.current;
                const temperature = current.temperature_2m;
                const humidity = current.relative_humidity_2m;
                const weatherCode = current.weather_code;

                // 天気コード → 天気表現（例: 晴れ、曇り、雨）
                const weatherMap = {
                    0: '晴れ',
                    1: '晴れ',
                    2: '曇り',
                    3: '曇り',
                    45: '曇り',
                    48: '曇り',
                    51: '雨',
                    61: '雨',
                    63: '雨',
                    65: '雨',
                    71: '雪',
                    73: '雪',
                    75: '雪',
                    95: '雨',
                    99: '雨'
                };
                const weather = weatherMap[weatherCode] || '不明';

                // 値を input 要素にセット
                document.querySelector('input[name="temperature"]').value = temperature;
                document.querySelector('input[name="humidity"]').value = humidity;
                document.querySelector('select[name="weather"]').value = weather;
            });
    }, error => {
        console.error('位置情報の取得に失敗しました:', error);
    });
</script>
<style>
  
</style>
