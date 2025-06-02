<div class="flex flex-col mx-[5vw] my-[2vw]">
    <h1 class="text-[2vw] font-bold mb-[3vw]">Carbon Footprint Calculator</h1>

    <div class="flex flex-col justify-center items-center mb-[3vw]">
        <div class="flex flex-col w-fit gap-[0.5vw]">
            <h3 class="text-[1.4vw] font-bold">Question {{ $step }} of 12</h3>
            <div class="w-[70vw] h-[1vw] rounded-[10vw] bg-gray-300">
                @php
                    $percent = floor((((int)$step - 1)/ 12 * 100));
                @endphp
                <div class="w-[{{ $percent . '%' }}] h-full rounded-[10vw] bg-green-600"></div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <div class="w-[60%]">
            @if ($step == 1)
                <h3 class="text-[1.4vw] font-bold text-center mb-[2vw]">How many people live in your household</h3>
                <div class="flex flex-col gap-[1.5vw] mb-[3vw]">
                    <label class="flex justify-center items-center w-full h-[3.5vw] rounded-[0.5vw] bg-green-600 text-white text-[1.2vw] font-bold hover:bg-white hover:border-2 hover:text-green-600">
                        <input type="radio" wire:model="q1" value="1" class="hidden">
                        1 people
                    </label>     
                    <label class="flex justify-center items-center w-full h-[3.5vw] rounded-[0.5vw] bg-green-600 text-white text-[1.2vw] font-bold hover:bg-white hover:border-2 hover:text-green-600">
                        <input type="radio" wire:model="q1" value="" class="hidden">
                        2 people
                    </label>     
                    <label class="flex justify-center items-center w-full h-[3.5vw] rounded-[0.5vw] bg-green-600 text-white text-[1.2vw] font-bold hover:bg-white hover:border-2 hover:text-green-600">
                        <input type="radio" wire:model="q1" value="a" class="hidden">
                        3 people
                    </label>     
                    <label class="flex justify-center items-center w-full h-[3.5vw] rounded-[0.5vw] bg-green-600 text-white text-[1.2vw] font-bold hover:bg-white hover:border-2 hover:text-green-600">
                        <input type="radio" wire:model="q1" value="a" class="hidden">
                        4 people
                    </label>     
                    <label class="flex justify-center items-center w-full h-[3.5vw] rounded-[0.5vw] bg-green-600 text-white text-[1.2vw] font-bold hover:bg-white hover:border-2 hover:text-green-600">
                        <input type="radio" wire:model="q1" value="a" class="hidden">
                        5 people
                    </label>           
                </div>
            @elseif ($step == 2)
                <p>halo</p>
            @elseif ($step == 3)

            @elseif ($step == 4)

            @elseif ($step == 5)

            @elseif ($step == 6)

            @elseif ($step == 7)

            @elseif ($step == 8)

            @elseif ($step == 9)

            @elseif ($step == 10)

            @elseif ($step == 11)

            @elseif ($step == 12)

            @endif

            <div class="flex justify-between">
                <button wire:click="prevStep" class="px-[3vw] py-[0.5vw] rounded-[0.5vw] border border-green-600 font-bold text-green-600">Prev</button>
                <button wire:click="nextStep" class="px-[3vw] py-[0.5vw] rounded-[0.5vw] bg-green-600 font-bold text-white">Next</button>
            </div>
        </div>
    </div>
</div>
