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
                        <th>活动代码</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($records as $item)
                        <tr>
                            <td>{{$item->wechat_name}}</td>
                            <td>{{$item->which_day}}</td>
                            <td>{{$item->time}}</td>
                            <td>{{$item->activity_code}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </article>
    @endisset

    <article class="today schedules">
        <h3>
            查看投票结果
        </h3>
        <div>
            <form action="/admin123qwe" method='post'>
                @csrf
                <div>
                    <label for="activity-code-result">活动代码</label>
                    <input type="number" name="activity-code-result" id="activity-code-result" placeholder="投票链接后四位">
                    @error("activity-code-result")
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit">开始统计</button>
                </div>
            </form>
            @isset($counter)
                <div class="schedule">
                    <table>
                        <caption>统计结果</caption>
                        <thead>
                        <tr>
                            <th>日期</th>
                            <th>票数</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($counter as $key => $value)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$value}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endisset
        </div>
    </article>

    <article class="today schedules">
        <h3>
            查询投票记录
        </h3>
        <div>
            <form action="/admin123qwe" method='post'>
                @csrf
                <div>
                    <label for="activity-code-records">活动代码</label>
                    <input type="number" name="activity-code-records" id="activity-code-records" placeholder="投票链接后四位">
                    @error("activity-code-records")
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit">开始查询</button>
                </div>

            </form>
        </div>
        @isset($votes)
            <div class="schedule">
                <table>
                    <caption>投票记录</caption>
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
