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
            <option value="">なし</option>
            <option value="season" {{ $filter === 'season' ? 'selected' : '' }}>季節</option>
            <option value="weather" {{ $filter === 'weather' ? 'selected' : '' }}>天気</option>
            <option value="temperature" {{ $filter === 'temperature' ? 'selected' : '' }}>気温</option>
            <option value="humidity" {{ $filter === 'humidity' ? 'selected' : '' }}>湿度</option>
            <option value="luck" {{ $filter === 'luck' ? 'selected' : '' }}>運勢</option>
            <option value="comment" {{ $filter === 'comment' ? 'selected' : '' }}>コメント</option>
        </select>
        <select name="filter_value" id="filter_value"></select>

        <button type="submit">検索</button>
    </form>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterSelect = document.getElementById('filter');
        const valueSelect = document.getElementById('filter_value');

        const targetValues = {
            season: ['春', '夏', '秋', '冬'],
            weather: ['晴れ', '曇り', '雨', '雪'],
            temperature: ['0℃以下','5℃', '10℃', '15℃', '20℃', '25℃', '30℃', '35℃以上'],
            humidity: ['10%', '30%', '50%', '70%', '90%'],
            luck: ['大吉','スーパー吉','超吉','神吉','Nice吉'],
            comment: ['服好きと繋がりたい','テスト']
        };

        function updateFilterOptions(selectedFilter, selectedValue = '') {
            valueSelect.innerHTML = '';
            if (targetValues[selectedFilter]) {
                targetValues[selectedFilter].forEach(function (val) {
                    const option = document.createElement('option');
                    option.value = val;
                    option.textContent = val;
                    if (val === selectedValue) {
                        option.selected = true;
                    }
                    valueSelect.appendChild(option);
                });
            }
        }

        // 🔽 初期表示時に復元（PHPから渡された変数をJSで使う）
        const selectedFilter = "{{ $filter }}";
        const selectedValue = "{{ $filter_value }}";
        if (selectedFilter && targetValues[selectedFilter]) {
            updateFilterOptions(selectedFilter, selectedValue);
        }

        // 🔽 フィルター選択時の動的更新
        filterSelect.addEventListener('change', function () {
            updateFilterOptions(this.value);
        });
    });
</script>
