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
      <select name="temperature">
        <option value="">選択してください</option>
        <option value="0" {{ old('temperature') == 0 ? 'selected' : '' }}>0℃以下</option>
        <option value="5" {{ old('temperature') == 5 ? 'selected' : '' }}>5℃</option>
        <option value="10" {{ old('temperature') == 10 ? 'selected' : '' }}>10℃</option>
        <option value="15" {{ old('temperature') == 15 ? 'selected' : '' }}>15℃</option>
        <option value="20" {{ old('temperature') == 20 ? 'selected' : '' }}>20℃</option>
        <option value="25" {{ old('temperature') == 25 ? 'selected' : '' }}>25℃</option>
        <option value="30" {{ old('temperature') == 30 ? 'selected' : '' }}>30℃</option>
        <option value="35" {{ old('temperature') == 35 ? 'selected' : '' }}>35℃以上</option>
      </select>
      <!-- <input type="number" name="temperature" value="{{ old('temperature') }}"min="-20" max="50" step="1"> ℃ -->
    </dd>
    <dt>湿度</dt>
    <dd>
      <select name="humidity">  
        <option value="">選択してください</option>
        <option value="10" {{ old('humidity') == 10 ? 'selected' : '' }}>10%</option>
        <option value="30" {{ old('humidity') == 30 ? 'selected' : '' }}>30%</option>
        <option value="70" {{ old('humidity') == 50 ? 'selected' : '' }}>50%</option>
        <option value="70" {{ old('humidity') == 70 ? 'selected' : '' }}>70%</option>
        <option value="90" {{ old('humidity') == 90 ? 'selected' : '' }}>90%</option>
      </select>
      <!-- <input type="number" name="humidity" value="{{ old('humidity') }}" min="0" max="100" step="1"> % -->
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


  // // 季節自動入力
  // const month = new Date().getMonth() + 1; // 0月始まりなので +1
  // let season = '';
  // if ([3, 4, 5].includes(month)) {
  //     season = '春';
  // } else if ([6, 7, 8].includes(month)) {
  //     season = '夏';
  // } else if ([9, 10, 11].includes(month)) {
  //     season = '秋';
  // } else {
  //     season = '冬';
  // }
// document.querySelector('select[name="season"]').value = season;
//   // 気温関係自動で入力
//       navigator.geolocation.getCurrentPosition(success => {
//         const lat = success.coords.latitude;
//         const lon = success.coords.longitude;

//         fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current=temperature_2m,relative_humidity_2m,weather_code&timezone=Asia%2FTokyo`)
//             .then(response => response.json())
//             .then(data => {
//                 const current = data.current;
//                 const temperature = Math.round(current.temperature_2m);
//                 const humidity = current.relative_humidity_2m;
//                 const weatherCode = current.weather_code;

//                 // 天気コード → 天気表現（例: 晴れ、曇り、雨）
//                 const weatherMap = {
//                     0: '晴れ',
//                     1: '晴れ',
//                     2: '曇り',
//                     3: '曇り',
//                     45: '曇り',
//                     48: '曇り',
//                     51: '雨',
//                     61: '雨',
//                     63: '雨',
//                     65: '雨',
//                     71: '雪',
//                     73: '雪',
//                     75: '雪',
//                     95: '雨',
//                     99: '雨'
//                 };
//                 const weather = weatherMap[weatherCode] || '不明';

//                 // 値を input 要素にセット
//                 document.querySelector('input[name="temperature"]').value = temperature;
//                 document.querySelector('input[name="humidity"]').value = humidity;
//                 document.querySelector('select[name="weather"]').value = weather;
//             });
//     }, error => {
//         console.error('位置情報の取得に失敗しました:', error);
//     });
</script>
<style>
  body {
  font-family: 'M PLUS Rounded 1c', sans-serif;
  color: #333;
  text-align: center;
  padding: 30px;
}

header {
  background-color: #d0f0fd; /* 明るい水色 */
  padding: 15px 0;
}

.accept-button {

}

.site-title, h1 {
  font-size: 2rem;
  font-weight: 700;
  color: #007acc; 深めの青
  text-shadow: 1px 1px #fff;
  margin: 20px 0;
  font-family: 'M PLUS Rounded 1c', sans-serif;
}

/* フォーム全体 */
.form-list {
  display: inline-block;
  background-color: #e6f4ff; /* うすい水色 */
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 0 10px #a3d8ff;
  text-align: left;
  margin-bottom: 40px;
}

/* ラベル部分 */
.form-list dt {
  font-weight: bold;
  margin-top: 15px;
  color: #1a73e8; /* Googleブルーっぽい青 */
}

/* 入力欄 */
.form-list dd {
  margin-bottom: 10px;
}

input[type="file"],
input[type="number"],
select {
  width: 100%;
  padding: 6px 12px;
  border-radius: 10px;
  border: 1px solid #bbb;
  background: #fff;
  font-size: 1em;
  box-sizing: border-box;
  margin-top: 5px;
  margin-bottom: 10px;
}

/* 画像プレビュー */
#preview {
  margin-bottom: 20px;
  border-radius: 10px;
  box-shadow: 0 0 8px #7bbfff;
}

/* ボタンまわり */
.form-buttons {
  text-align: right;
  margin-top: 25px;
  padding-right: 10px;
}

.form-buttons input[type="submit"] {
  background-color: #4aa8ff;
  border: none;
  padding: 10px 20px;
  color: white;
  font-weight: bold;
  border-radius: 12px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.form-buttons input[type="submit"]:hover {
  background-color: #007acc;
}

.form-buttons a {
  margin-left: 15px;
  color: #007acc;
  font-weight: bold;
  text-decoration: none;
}

.form-buttons a:hover {
  text-decoration: underline;
}
.form-buttons input[type="submit"] {
  background: linear-gradient(to bottom, #a8d8ff, #4aa8ff); /* グラデ青 */
  border: none;
  padding: 10px 25px;
  color: white;
  font-weight: bold;
  border-radius: 25px;
  cursor: pointer;
  font-size: 1rem;
  box-shadow: 0 4px 6px rgba(100, 150, 255, 0.4);
  transition: all 0.3s ease;
}

.form-buttons input[type="submit"]:hover {
  background: linear-gradient(to bottom, #4aa8ff, #007acc);
  box-shadow: 0 6px 12px rgba(100, 150, 255, 0.6);
  transform: translateY(-2px);
}
.form-buttons a {
  margin-left: 15px;
  padding: 8px 16px;
  border-radius: 20px;
  background-color: #e0f0ff;
  color: #007acc;
  font-weight: bold;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.form-buttons a:hover {
  background-color: #c0e0ff;
}
.form-buttons {
  text-align: right;
  margin-top: 25px;
  padding-right: 10px;
}

.form-buttons input[type="submit"] {
  background: linear-gradient(to bottom, #a8d8ff, #4aa8ff);
  border: none;
  padding: 10px 25px;
  color: white;
  font-weight: bold;
  border-radius: 25px;
  cursor: pointer;
  font-size: 1rem;
  box-shadow: 0 4px 6px rgba(100, 150, 255, 0.4);
  transition: all 0.3s ease;
}

.form-buttons input[type="submit"]:hover {
  background: linear-gradient(to bottom, #4aa8ff, #007acc);
  box-shadow: 0 6px 12px rgba(100, 150, 255, 0.6);
  transform: translateY(-2px);
}
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
