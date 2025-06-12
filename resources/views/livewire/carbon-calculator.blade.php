<div class="flex flex-col mx-[5vw] my-[2vw]">
    <h1 class="text-[2vw] font-bold mb-[3vw]">Carbon Footprint Calculator</h1>

    <div class="flex flex-col justify-center items-center mb-[3vw]">
        <div class="flex flex-col w-fit gap-[0.5vw]">
            <h3 class="text-[1.4vw] font-bold">Question {{ $step }} of 12</h3>
            <div class="w-[70vw] h-[1vw] rounded-[10vw] bg-gray-300">
                <div class=" h-full rounded-[10vw] bg-green-600" style="width: {{ $this->progress }}%;"></div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <div class="w-[60%]">
            @if ($step == 1)
                @includeif("User.carbon-calculator.question-list.question1")
            @elseif ($step == 2)
                @includeif("User.carbon-calculator.question-list.question2")
            @elseif ($step == 3)
                @includeif("User.carbon-calculator.question-list.question3")
            @elseif ($step == 4)
                @includeif("User.carbon-calculator.question-list.question4")
            @elseif ($step == 5)
                @includeif("User.carbon-calculator.question-list.question5")
            @elseif ($step == 6)
                @includeif("User.carbon-calculator.question-list.question6")
            @elseif ($step == 7)
                @includeif("User.carbon-calculator.question-list.question7")
            @elseif ($step == 8)
                @includeif("User.carbon-calculator.question-list.question8")
            @elseif ($step == 9)
                @includeif("User.carbon-calculator.question-list.question9")
            @elseif ($step == 10)
                @includeif("User.carbon-calculator.question-list.question10")
            @elseif ($step == 11)
                @includeif("User.carbon-calculator.question-list.question11")
            @elseif ($step == 12)
                @includeif("User.carbon-calculator.question-list.question12")
            @endif

            <div class="flex justify-center">
                <p class="text-red-">{{ $this->error }}</p>
            </div>

            <div class="flex justify-between">
                <button wire:click="prevStep" class="px-[3vw] py-[0.5vw] rounded-[0.5vw] border border-green-600 font-bold text-green-600">Prev</button>
                @if ($step != 12)
                    <button wire:click="nextStep" class="px-[3vw] py-[0.5vw] rounded-[0.5vw] bg-green-600 font-bold text-white">Next</button>
                @else
                    <button id="endBtn" class="px-[3vw] py-[0.5vw] rounded-[0.5vw] bg-green-600 font-bold text-white">End</button>
                @endif
            </div>

            <div id="confirmationDialog" class="fixed top-0 left-0 w-full h-full hidden justify-center items-center" style="background: rgba(0, 0, 0, 0.5)">
                <div class="bg-white w-fit p-[2vw] rounded-[0.5vw]">
                    <h2 class="text-xl font-bold mb-4">Are you sure you want to finish the Questionnaire?</h2>
                    <div class="flex justify-end space-x-4">
                        <button id="cancelButton" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                        <button wire:click="endQuestioner" id="confirmButton" class="px-4 py-2 bg-red-500 text-white rounded">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const observer = new MutationObserver(() => {
        const endBtn = document.getElementById("endBtn");
        if (endBtn) {
            observer.disconnect(); // Stop observing once the button is found
            endBtn.addEventListener("click", function () {
                const confirmation = document.getElementById("confirmationDialog");
                confirmation.classList.toggle("hidden");
                confirmation.classList.toggle("flex");
            });
        }
    });

    observer.observe(document.body, { childList: true, subtree: true });
});



</script>

