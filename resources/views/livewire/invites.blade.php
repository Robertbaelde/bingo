<div wire:poll.5s>
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
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Invites
                        </h3>
                        {{$invites->count()}} total invites, {{$invites->where('used', 1)->count()}} used, {{$invites->where('used', 0)->count()}} pending,
                </div>
            </div>
            <div class="mt-8 flex items-center justify-between flex-wrap">
                <div>
                    <label for="code" class="block text-sm font-medium leading-5 text-gray-700">Create invite</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input wire:model="code" id="code" class="form-input block w-full sm:text-sm sm:leading-5" placeholder="invite code" />
                    </div>
                    <a class="cursor-pointer" wire:click="randomCode()">generate random code</a>
                </div>
                <span class="inline-flex rounded-md shadow-sm">
                  <button wire:click="createInvite()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                    Create
                  </button>
                </span>
            </div>
        </div>
        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6 mt-8 shadow sm:rounded-lg">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Invites
                    </h3>
                </div>
            </div>
            <div class="overflow-hidden sm:rounded-md mt-4">
                <ul>
                    @foreach($invites as $invite)
                        <li class="border-t border-gray-200">
                            <a class="hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                                <div class="flex items-center px-4 py-4 sm:px-6">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                            <div>
                                                <div class="text-sm leading-5 font-medium text-indigo-600 truncate">{{$invite->code}}</div>
                                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                                    <span onclick="copyToClipboard('{{route('register', ['code' => $invite->code])}}')">{{route('register', ['code' => $invite->code])}}    (click to copy)</span>
                                                </div>
                                            </div>
                                            <div class="hidden md:block">
                                                <div>
                                                    @if($invite->used)
                                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                            </svg>
                                                            used by {{$invite->user->name}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <script>
        function copyToClipboard(code) {
            const el = document.createElement('textarea');
            el.value = code;
            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-9999px';
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            console.log('done');
        }
    </script>
</div>

