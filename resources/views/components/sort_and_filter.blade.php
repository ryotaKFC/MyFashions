 <div>
    <form method="GET" action="{{ route('fashions.index') }}">
        <label for="sort">並び替え：</label>
        <select name="sort" id="sort">
            <option value="created_at" {{ $sort === 'created_at' ? 'selected' : '' }}>作成日</option>
            <option value="season" {{ $sort === 'season' ? 'selected' : '' }}>季節</option>
            <option value="weather" {{ $sort === 'weather' ? 'selected' : '' }}>天気</option>
            <option value="temperature" {{ $sort === 'temperature' ? 'selected' : '' }}>気温</option>
            <option value="humidity" {{ $sort === 'humidity' ? 'selected' : '' }}>湿度</option>
        </select>
        <select name="direction" id="direction">
            <option value="asc" {{ $direction === 'asc' ? 'selected' : '' }}>昇順</option>
            <option value="desc" {{ $direction === 'desc' ? 'selected' : '' }}>降順</option>
        </select>

        <label for="filter">フィルター：</label>
        <select name="filter" id="filter">
            <option value="">選択してください</option>
            <option value="season">季節</option>
            <option value="weather">天気</option>
            <option value="temperature">気温</option>
            <option value="humidity">湿度</option>
            <option value="luck">運勢</option>
            <option value="comment">コメント</option>
        </select>
        <select name="filter_value" id="filter_value"></select>

        <button type="submit">検索</button>
    </form>
</div>


<script>
    // フィルターの処理
    const targetValues = {
        season: ['春', '夏', '秋', '冬'],
        weather: ['晴れ', '曇り', '雨', '雪'],
        temperature: ['5', '10', '15', '20', '25', '30'],
        humidity: ['10', '30', '50', '70', '90'],
        luck: ['大吉','スーパー吉','超吉','神吉','Nice吉'],
        comment: ['服好きと繋がりたい','テスト']
    };
    

    document.addEventListener('DOMContentLoaded', function () {
        const filterSelect = document.getElementById('filter');
        const valueSelect = document.getElementById('filter_value');

        filterSelect.addEventListener('change', function () {
            const selectedFilter = this.value;
            valueSelect.innerHTML = '';

            if (targetValues[selectedFilter]) {
                targetValues[selectedFilter].forEach(function (val) {
                    const option = document.createElement('option');
                    option.value = val;
                    option.textContent = val;
                    valueSelect.appendChild(option);
                });
            }
        });
    });
</script>
