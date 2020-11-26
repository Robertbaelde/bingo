<div wire:poll.5s class="bg-cover bg-center w-screen h-screen" style="background-image: url('https://publicart.amsterdam/wp-content/uploads/2018/06/1.2.-het-wiel-wsvanvliet-BETER.jpg')">
    <div class="top-0 left-0 z-40 absolute h-screen w-screen flex items-center justify-center font-lato" style=''>
        <div class="">
            <div class="bg-white opacity-75 p-8 text-gray-900 text-center text-lg max-w-lg rounded-sm" style="backdrop-filter: blur(4px)">
                <h1 class="font-black text-4xl text-center">Bingo!</h1>
                <p class="mt-4 leading-relaxed">
                    Hi {{auth()->user()->name}},<br>
                    Welcome to the bingo!<br>
                    @if($game === null)
                        There is no game active yet
                    </div>
                    @else
                        <span class="text-base">Click the number to mark it. (Click again to unmark it when you've made a mistake).</span>
                    @endif
                </p>
                @if($game !== null && $game->card->first() === null)
                    <h1>Generating your magic numbers!</h1>
                @endif
                @if($game !== null && $game->card->first() !== null)
                <div class="mt-8">
                    <div class="grid grid-cols-5 gap-4">
                        @foreach($game->card->first()->numbers as $number)
                            <a wire:click="markNumber({{$number->id}})" class="relative flex h-16 w-16 text-center bg-white text-3xl border-2 border-gray-300 cursor-pointer">
                                <div class="text-center m-auto px-3 py-3">{{$number->number}}</div>
                                @if($number->marked === 1)<div class="absolute bg-green-500 w-full h-full opacity-50 rounded-full" ></div>@endif
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
