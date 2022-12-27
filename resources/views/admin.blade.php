<x-a-master>

    <form action="/admin123qwe" method='post'>
        @csrf
        <div class="search-bar wrapper">
            <input type="text" name="wechat-name" placeholder="输入微信名搜索">
            <button type="submit">
                <div class="icon">
                    <img src="{{asset('images/search_icon.png')}}" alt="search icon">
                </div>
            </button>
        </div>
    </form>
    @isset($records)
        <article class="today schedules">
            <div class="schedule">
                <table>
                    <caption>{{$records->first()->wechat_name}}的投票记录:</caption>
                    <thead>
                    <tr>
                        <th>微信名</th>
                        <th>选择日期</th>
                        <th>选择时间</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($records as $item)
                        <tr>
                            <td>{{$item->wechat_name}}</td>
                            <td>{{$item->which_day}}</td>
                            <td>{{$item->time}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </article>
    @endisset


    <article class="today schedules">
        <div>
            <form action="/admin123qwe" method='post'>
                @csrf
                <label for="since">选择计票开始时间</label>
                <input type="date" name="since" id="since">
                @error("since")
                <p class="error">{{$message}}</p>
                @enderror
                <div>
                    <button type="submit">开始统计</button>
                </div>

            </form>
        </div>
        @isset($votes)
            <div class="schedule">
                <table>
                    <caption>Schedules for Today:</caption>
                    <thead>
                    <tr>
                        <th>微信名</th>
                        <th>选择日期</th>
                        <th>选择时间</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($votes as $item)
                        <tr>
                            <td>{{$item->wechat_name}}</td>
                            <td>{{$item->which_day}}</td>
                            <td>{{$item->time}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endisset
    </article>
</x-a-master>
