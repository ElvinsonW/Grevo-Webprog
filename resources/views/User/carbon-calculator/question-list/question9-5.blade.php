<h3 class="text-[1.4vw] font-bold text-center mb-[2vw]">
    Do you recycle your waste?
</h3>
<div class="flex flex-col gap-[1.5vw] mb-[3vw]">
    @foreach ([
        'Kaca' => 'kaca',
        'Plastik' => 'plastik',
        'Kertas' => 'kertas',
        'Aluminium' => 'aluminium',
        'Besi' => 'besi',
        'Limbah makanan (pembuatan kompos)
' => 'makanan',
    ] as $label => $value)
        <input id="op{{ $value }}" 
            type="radio" 
            name="household" 
            wire:model="recycleValue" 
            value="{{ $value }}" 
            class="hidden peer">
        <label for="op{{ $value }}" 
            class="flex justify-center items-center w-full h-[3.5vw] rounded-[0.5vw] bg-green-600 text-white text-[1.2vw] font-bold hover:bg-white hover:border-2 hover:text-green-600 peer-checked:bg-black peer-checked:text-white transition-colors">
            {{ $label }}
        </label>
    @endforeach
</div>
