<x-master2>
    <main class="fill-form">
        <div>
            <img class="main-photo mouse" src="images/mouse1.jpg" alt="">
        </div>
        <div class="flex-center thank-you-note">
            谢谢你呀, {{$whichDay->wechat_name}}~
        </div>
        <a href="{{ URL::previous() }}">
            <button id="ty-return">
                返回
            </button>
        </a>

    </main>
</x-master2>
