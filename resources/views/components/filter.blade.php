<div class="sort-filter">
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
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterSelect = document.getElementById('filter');
        const valueSelect = document.getElementById('filter_value');

        const targetValuesName = {
            season: ['春', '夏', '秋', '冬'],
            weather: ['晴れ', '曇り', '雨', '雪'],
            temperature: ['0℃以下','5℃', '10℃', '15℃', '20℃', '25℃', '30℃', '35℃以上'],
            humidity: ['10%', '30%', '50%', '70%', '90%'],
            luck: ['大吉','スーパー吉','超吉','神吉','Nice吉'],
            comment: ['服好きと繋がりたい','テスト','デート服','カフェ巡り','ChatGPT','vacation','にっこり','えんじょい','遠出','日帰り','ドラゴンボール','すごろく']
        };
        const targetValues = {
            season: ['春', '夏', '秋', '冬'],
            weather: ['晴れ', '曇り', '雨', '雪'],
            temperature: ['-1','5', '10', '15', '20', '25', '30', '35'],
            humidity: ['10', '30', '50', '70', '90'],
            luck: ['大吉','スーパー吉','超吉','神吉','Nice吉'],
            comment: ['服好きと繋がりたい','テスト','デート服','カフェ巡り','ChatGPT','vacation','にっこり','えんじょい','遠出','日帰り','ドラゴンボール','すごろく']
        };

        function updateFilterOptions(selectedFilter, selectedValue = '') {
            valueSelect.innerHTML = '';
            if (targetValues[selectedFilter] && targetValuesName[selectedFilter]) {
                targetValues[selectedFilter].forEach(function (val, index) {
                    const option = document.createElement('option');
                    option.value = val;
                    option.textContent = targetValuesName[selectedFilter][index];
                    if (val === selectedValue) {
                        option.selected = true;
                    }
                    valueSelect.appendChild(option);
                });
            }
        }

        const selectedFilter = @json($filter);
        const selectedValue = @json($filter_value);
        if (selectedFilter && targetValues[selectedFilter]) {
            updateFilterOptions(selectedFilter, selectedValue);
        }

        filterSelect.addEventListener('change', function () {
            updateFilterOptions(this.value);
        });
    });
</script>
