<h3 class="text-[1.4vw] font-bold text-center mb-[2vw]">
    How many people live in your household with you
</h3>
<div class="flex flex-col gap-[1.5vw] mb-[3vw]">
    @foreach ([
        'I live alone' => 14,
        '1 person' => 12,
        '2 people' => 10,
        '3 people' => 8,
        '4 people' => 6,
        '5 people' => 5,
        'More than 5 people' => 2
    ] as $label => $value)
        <div class="relative">
            <input 
                id="op{{ $value }}" 
                type="radio" 
                name="household" 
                wire:model="answer.{{ $step - 1 }}" 
                value="{{ $value }}" 
                class="peer hidden">
            <label for="op{{ $value }}" 
                class="flex justify-center items-center w-full h-[3.5vw] rounded-[0.5vw] bg-green-600 text-white text-[1.2vw] font-bold hover:bg-white hover:border-2 hover:text-green-600 peer-checked:bg-black peer-checked:text-white transition-colors cursor-pointer">
                {{ $label }}
            </label>
        </div>
    @endforeach
</div>
