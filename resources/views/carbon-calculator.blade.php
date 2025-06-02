<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="flex items-center gap-[7vw] mt-[7vw] px-[10vw]">
        <div class="flex flex-col w-[40vw] gap-[1vw]">
            <h1 class="text-[3.5vw] font-bold">What's your personal contribution to carbon emissions?</h1>
            <h3 class="text-[1.1vw] font-bold">Every choice you make, how you travel, what you eat, the energy you use, has an impact on the environment. Your carbon footprint is the total amount of greenhouse gases you produce through your daily activities, and understanding it is a key step toward making more sustainable decisions. </h3>
            <button class="w-fit px-[3vw] py-[0.75vw] rounded-[0.5vw] bg-green-600 text-[1.2vw] font-bold text-white mt-[1vw]"><a href="/carbon-question">Take a Questioner</a></button>
        </div>
        <img src="{{ asset('images/elvinson.jpg') }}" alt="elvinson" class="w-[35vw] h-[35vw] rounded-[2vw] object-cover">
    </div>
</body>
</html>