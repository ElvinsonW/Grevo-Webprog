<x-layout>
    <div class="flex mx-[5vw] my-[2vw]">
        {{-- Left Sidebar: User Profile and Navigation --}}
        <x-profilebar :user="$user" />

        {{-- Right Content: User Review --}}
        <div class="flex flex-col ml-[2vw] w-full bg-yellow-3 px-[3vw] py-[2vw] rounded-[1vw] drop-shadow-md">
            <div class="flex flex-col ">
                @foreach ($reviews as $review)
                    <div class="flex flex-col items-end gap-[2vw] py-[1.5vw] border-0 border-b-1 border-gray-300">
                        <div class="flex justify-between w-full">
                            <div class="flex gap-[1vw]">
                                <img src="{{ asset('storage/' . $review->product->product_images->first()->image) }}" alt="elvinson"
                                    class="w-[5vw] h-[5vw] rounded-[0.5vw] object-cover">
                                <div class="flex flex-col">
                                    <p class="text-[1.3vw] font-bold">{{ $review->product->name }}</p>
                                    
                                </div>
                            </div>
                            <div class="flex flex-col items-end gap-[0.75vw]">
                                <p>Rated at: {{ $review->created_at->format("d M Y, h:i:s A") }}</p>
                                <div>
                                    @for ($i = 0; $i < $review->rate; $i++)
                                        <i class="fa-solid fa-star text-yellow-400 text-[1.5vw]"></i>
                                    @endfor

                                    @for ($i = $review->rate; $i < 5; $i++)
                                        <i class="fa-solid fa-star text-gray-200 text-[1.5vw]"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-[0.5vw] w-[88%]">
                            <div class="text-[1vw] font-bold">
                                {{ $review->description }}
                            </div>

                            <div class="flex gap-[1vw] mt-[0.5vw]">
                                @foreach ($review->review_images as $review_image)
                                    <img src="{{ asset('storage/' . $review_image->source) }}" alt="Review Image"
                                        class="thumbnail w-[3.5vw] h-[3.5vw] rounded-[0.5vw] object-cover cursor-pointer hover:brightness-75"
                                        onclick="showImage('{{ $review->id }}', '{{ asset('storage/' . $review_image->source) }}')">
                                @endforeach
                            </div>
                            <img src="{{ asset('storage/' . $review_image->source) }}" alt="Review Image"
                                class="big-image w-[15vw] h-[15vw] rounded-[0.5vw] object-cover hidden"
                                id="{{ $review->id }}">
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="mt-[2vw]">
                {{ $reviews->links() }}
            </div>
        </div>
    </div>

    <script>
        function showImage(review_id, source) {
            const allBigImage = document.querySelectorAll('.big-image');
            
            const selectedBigImage = document.getElementById(`${review_id}`);
            if(selectedBigImage){
                selectedBigImage.style.display = "block";
                selectedBigImage.src = `${source}`;
            }
        }   
    </script>
</x-layout>
