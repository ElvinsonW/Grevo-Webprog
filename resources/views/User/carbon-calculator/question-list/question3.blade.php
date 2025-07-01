<h3 class="text-[1.4vw] font-bold text-center mb-[2vw]">
    How often do you consume livestock meat or animal products?
</h3>
<div class="flex flex-col gap-[1.5vw] mb-[3vw]">
    @foreach ([
        'Every day' => 10,
        'Several times a week' => 8,
        "I'm vegetarian" => 4,
        "I'm vegan / I only consume wild meat" => 2,
    ] as $label => $value)
        <div class="relative">
            <input id="op{{ $value }}" type="radio" name="household" wire:model="answer.{{ $step - 1 }}"
                value="{{ $value }}" class="hidden peer">
            <label for="op{{ $value }}"
                class="flex justify-center items-center w-full h-[3.5vw] rounded-[0.5vw] bg-green-600 text-white text-[1.2vw] font-bold hover:bg-white hover:border-2 hover:text-green-600 peer-checked:bg-black peer-checked:text-white transition-colors">
                {{ $label }}
            </label>
        </div>
    @endforeach
</div>
