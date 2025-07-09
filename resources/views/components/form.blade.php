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
      <input type="number" name="temperature" value="{{ old('temperature') }}"min="-20" max="50" step="1"> ℃
    </dd>
    <dt>湿度</dt>
    <dd>
      <input type="number" name="humidity" value="{{ old('humidity') }}" min="0" max="100" step="1"> %
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
                const temperature = Math.round(current.temperature_2m);
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
  body {
  background: #fffafc;
  font-family: 'M PLUS Rounded 1c', sans-serif;
  color: #333;
  text-align: center;
  padding: 30px;
}

h1, .site-title {
  font-size: 2.5em;
  font-weight: bold;
  color: #ff69b4;
  text-shadow: 1px 1px #fff;
  margin-bottom: 20px;
}

.form-list {
  display: inline-block;
  background-color: #ffeef4;
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 0 10px #f4d6de;
  text-align: left;
}

.form-list dt {
  font-weight: bold;
  margin-top: 15px;
  color: #d63384;
}

.form-list dd {
  margin-bottom: 10px;
}

input[type="file"],
input[type="number"],
select {
  width: 100%;
  padding: 6px 12px;
  border-radius: 10px;
  border: 1px solid #ccc;
  background: #fff;
  font-size: 1em;
  box-sizing: border-box;
}

button, input[type="submit"] {
  background-color: #ffb6c1;
  border: none;
  padding: 10px 20px;
  color: white;
  font-weight: bold;
  border-radius: 12px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  margin-top: 15px;
}
button:hover, input[type="submit"]:hover {
  background-color: #ff69b4;
}

a {
  color: #d63384;
  font-weight: bold;
  text-decoration: none;
}
a:hover {
  text-decoration: underline;
}

#preview {
  margin-bottom: 20px;
  border-radius: 10px;
  box-shadow: 0 0 8px #d63384;
}
.site-title, h1 {
  font-size: 2rem; /* ←ここを調整、もとの2.5remより小さく */
  font-weight: 700;
  color: #ff69b4;
  text-shadow: 1px 1px #fff;
  margin: 20px 0;
  font-family: 'M PLUS Rounded 1c', sans-serif;
}
header {
  background-color: #d8f3dc;
  padding: 15px 0;
}
<p style="font-size: 1rem; color: #888;">今日はどんなコーデにしよう？🌸</p>
.form-list dd input[type="file"] {
  margin-top: 5px;
  margin-bottom: 15px; /* ← 写真とその次の要素に余白 */
}

input[type="submit"], button {
  margin-top: 20px;  /* 登録ボタンの上に余白 */
}
.form-list {
  margin-bottom: 40px; /* 下に余白を追加して、画面にくっつきすぎないように */
}
/* 写真入力の余白を調整 */
input[type="file"] {
  margin-top: 10px;
  margin-bottom: 20px;  /* 写真と季節の間に余白を追加 */
  display: block;
}

/* 登録ボタンの余白を調整 */
input[type="submit"], button[type="submit"] {
  margin-top: 25px;   /* 上に余白 */
  margin-bottom: 10px;
  display: inline-block;
}

/* フォーム全体の下にもスペースを */
.form-list {
  margin-bottom: 40px;
}
.form-buttons {
  text-align: right;
  margin-top: 20px;
  padding-right: 10px;
}

.form-buttons input[type="submit"] {
  background-color: #ffb6c1;
  border: none;
  padding: 10px 20px;
  color: white;
  font-weight: bold;
  border-radius: 12px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.form-buttons input[type="submit"]:hover {
  background-color: #ff69b4;
}

.form-buttons a {
  margin-left: 15px;
  color: #006400;
  font-weight: bold;
  text-decoration: none;
}

</style>
