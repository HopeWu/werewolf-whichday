<x-master2>
    <main class="fill-form">
        <div>
            <img class="main-photo mouse" src="{{asset('images/mouse1.jpg')}}" alt="">
        </div>
        <div class="flex-center thank-you-note">
            谢谢你呀, {{session()->get('whichDay')->wechat_name}}~
        </div>
        @isset($date1)
            <div>
                得票最多：{{$date1}}({{$count1}}票)和{{$date2}}({{$count2}}票)
            </div>
            <div>

            </div>
        @endisset

        <div class="ty-3 flex">
            @isset($date1)
                <a href="{{ URL::previous() }}">
                    <button id="sides">
                        重新填写
                    </button>
                </a>
                <button id="in-between">或者</button>
            @endisset

            <a href="{{ URL::previous() }}">
                <button id="sides">
                    就这样
                </button>
            </a>
        </div>
    </main>
</x-master2>
