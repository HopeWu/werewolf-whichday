<x-a-master>
    <div class="search-bar wrapper">
        <input type="text" name="search" placeholder="enter an email or a date">
        <div class="icon">
            <img src="{{asset('images/search_icon.png')}}" alt="search icon">
        </div>
    </div>
    <article class="today schedules">
        <div>
            <form action="/admin123qwe" method='post'>
                @csrf
                <label for="since">选择计票开始时间</label>
                <input type="date" name="since" id="since">
                @error("since")
                <p class="error">{{$message}}</p>
                @enderror
                <div><button type="submit">开始统计</button></div>

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
