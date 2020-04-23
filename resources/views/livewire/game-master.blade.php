<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-6">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    Bingo game master
                </h2>
            </div>
        </div>

        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6 mt-8 shadow sm:rounded-lg">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
                <div class="ml-4 mt-2">
                    @if($game !== null)
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Game ({{$game->id}}) active
                    </h3>
                    {{$game->card_count}} cards, {{$game->marked_numbers_count}} numbers marked
                    @else
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            No game active
                        </h3>
                    @endif
                </div>
                <div class="ml-4 mt-2 flex-shrink-0">
                  <span class="inline-flex rounded-md shadow-sm">
                      @if($game === null)
                        <button onclick="confirm('Are you sure you want to start a game?') || event.stopImmediatePropagation()" wire:click="startNewGame" type="button" class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700">
                          Start new game
                        </button>
                      @else
                          <button onclick="confirm('Are you sure you want to stop the current game?') || event.stopImmediatePropagation()" wire:click="stopGame" type="button" class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700">
                            End game
                        </button>
                      @endif
                  </span>
                </div>
            </div>
        </div>
        @if($game !== null)
        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6 mt-8 shadow sm:rounded-lg">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                       Cards
                    </h3>
                </div>
            </div>
            <div class="overflow-hidden sm:rounded-md mt-4">
                @if($selectedCard !== null)
                    <div class="max-w-lg mx-auto">
                        Card from {{$selectedCard->user->name}} <a href="#" wire:click="closeCard">close</a>
                        <div class="grid grid-cols-5 gap-4 m-4">
                            @foreach($selectedCard->numbers as $number)
                                <div class="relative flex h-16 w-16 text-center bg-white text-3xl border-2 border-gray-300">
                                    <div class="text-center m-auto px-3 py-3">{{$number->number}}</div>
                                    @if($number->marked === 1)<div class="absolute bg-green-500 w-full h-full opacity-50 rounded-full" ></div>@endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <ul>
                    @foreach($game->cards as $card)
                    <li class="border-t border-gray-200">
                        <a wire:click="selectCard({{$card->id}})" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out cursor-pointer">
                            <div class="flex items-center px-4 py-4 sm:px-6">
                                <div class="min-w-0 flex-1 flex items-center">
                                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                        <div>
                                            <div class="text-sm leading-5 font-medium text-indigo-600 truncate">{{$card->user->name}}</div>
                                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884zM18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="truncate">{{$card->user->email}}</span>
                                            </div>
                                        </div>
                                        <div class="hidden md:block">
                                            <div>
                                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Thinks is a winner
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

    </div>
</div>
