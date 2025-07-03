<x-layout>
    <div class="px-[5vw] my-[2vw]">
        <h1 class="text-[2vw] font-bold mb-[2vw]">Review Product</h1>

        <form action="/review" method="POST" enctype="multipart/form-data" class="flex flex-col gap-[2vw]">
            @csrf
            
            <div class="flex flex-col gap-[1vw]">
                <label for="rate" class="text-[1.2vw] font-bold">Rate</label>
                <input type="text" name="rate" id="rate" class="hidden" value="{{ old('rate') }}">
                <div class="flex gap-[0.5vw] cursor-pointer">
                    <i class="fa-solid fa-star text-gray-200 text-[2vw] star" data-value="1"></i>
                    <i class="fa-solid fa-star text-gray-200 text-[2vw] star" data-value="2"></i>
                    <i class="fa-solid fa-star text-gray-200 text-[2vw] star" data-value="3"></i>
                    <i class="fa-solid fa-star text-gray-200 text-[2vw] star" data-value="4"></i>
                    <i class="fa-solid fa-star text-gray-200 text-[2vw] star" data-value="5"></i>
                </div>
                @error('name')
                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-col gap-[1vw]">
                <label for="description" class="text-[1.2vw] font-bold">Description</label>
                <textarea name="description" id="desc" rows="3" class="rounded-[0.5vw] p-[1vw] focus:outline-none border text-[1.2vw]"></textarea>
                @error('description')
                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-col gap-[1vw]">
                <label for="images" class="text-[1.2vw] font-bold">Review Image</label>
                <label for="images" class="cursor-pointer w-fit px-[2vw] py-[0.75vw] rounded-[0.5vw] bg-green-600 text-[1.1vw] text-white font-bold mb-[0.5vw]">Add Review Image +</label>
                <input id="images" name="images[]" type="file" class="hidden mb-[1vw]" multiple onchange="handleImageChange(event)" value="{{ old('images[]') }}"/>
                <div class="flex flex-wrap gap-[1vw]" id="image-container"></div>
                @error('image')
                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button class="cursor-pointer w-fit px-[2vw] py-[0.5vw] rounded-[0.5vw] bg-green-600 text-white font-bold">
                Submit
            </button>
        </form>
    </div>

    <script>
    document.querySelectorAll(".star").forEach(star => {
        star.addEventListener('click', function () {
            document.querySelectorAll('.star').forEach(s => {
                s.classList.remove('text-yellow-400');
                s.classList.add('text-gray-200');
            });

            this.classList.add('text-yellow-400');
            this.classList.remove('text-gray-200');

            let previousSiblings = Array.from(this.parentElement.children).filter(el => el.dataset.value < this.dataset.value);
            previousSiblings.forEach(el => {
                el.classList.add('text-yellow-400');
                el.classList.remove('text-gray-200');
            });

            document.getElementById('rate').value = this.dataset.value;
        });
    });

    let selectedFiles = [];

    function handleImageChange(e) {
        const files = Array.from(e.target.files);
        const imgContainer = document.getElementById('image-container');

        files.forEach(file => {
            if (file && file.type.startsWith('image/')) {
                selectedFiles.push(file);

                const reader = new FileReader();
                reader.onloadend = () => {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'relative w-[10vw] h-[10vw]';

                    const img = document.createElement('img');
                    img.src = reader.result;
                    img.alt = 'Review Image';
                    img.className = 'w-full h-full rounded-[1vw] object-cover';

                    const deleteBtn = document.createElement('button');
                    deleteBtn.innerText = '×';
                    deleteBtn.className = 'cursor-pointer absolute top-[0.5vw] right-[0.5vw] bg-red-500 text-white w-[1.5vw] h-[1.5vw] rounded-full text-[1vw] flex items-center justify-center';
                    deleteBtn.onclick = () => {
                        wrapper.remove();
                        selectedFiles = selectedFiles.filter(f => f !== file);
                    };

                    wrapper.appendChild(img);
                    wrapper.appendChild(deleteBtn);
                    imgContainer.appendChild(wrapper);
                };
                reader.readAsDataURL(file);
            } else {
                console.error('Invalid file type. Please upload an image.');
            }
        });

        // Clear the input so the same file can be re-uploaded if needed
        e.target.value = '';
    }
</script>

</x-layout>