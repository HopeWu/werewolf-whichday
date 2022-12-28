<x-master2>
    <main>
        <article class="fill-form">
            <div>
                <img class="main-photo" src="{{asset('images/castle-small.jpg')}}" alt="">
            </div>

            <form class="which-day-time" action="/which-day/{{$activity_code}}" method="post">
                @csrf

                <div class="inputs">
                    <div class="flex-center wechat-id">
                        {{--            <label for="wechat-id" >微信名: </label>--}}
                        <input id="wechat-id" placeholder="微信名" name="wechat-name" type="text">
                    </div>
                    <div class="flex-center">
                        @error("wechat-name")
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="date flex-center">
                        <input id="date" placeholder="日期" name="which-day" type="date"
                               value="{{old('which-day')}}">
                    </div>
                    <div class="flex-center">
                        @error("which-day")
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="time flex-center" id="disabled">
                        <input id="time" name="time" type="text"
                               placeholder="晚上18:00左右" disabled>
                    </div>
                    <div class="flex-center">
                        @error("time")
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit">提交</button>
                </div>

            </form>
        </article>

    </main>
</x-master2>
