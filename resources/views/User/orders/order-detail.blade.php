<x-layout>
    <main class="mx-auto p-6 pt-12 min-h-screen" style="background-color: #F7F6EB;">
        <div class="flex mx-[5vw] gap-10">
            <!-- kiri side -->
            @include('components.profilebar', ['user' => $user])

            <!-- kanan side -->
            <div class="flex flex-col w-full">
                <div class="w-full bg-[#FCFCF5] h-fit rounded-xl px-5 mb-5" style="box-shadow: 0 0 12.2px 0 rgba(0,0,0,0.06);">
                    @php
                    $status = $order->statusHistories->first();
                    $statuses = $order->statusHistories;
                    @endphp
                    <!-- top  -->
                    <div class="flex items-center justify-between my-4">
                        <!-- back -->
                        <a href="javascript:history.back()" class="btn flex flex-row gap-5">
                            <i class="fa-solid fa-chevron-down text-[1vw] transition-transform duration-400 rotate-90 text-[#7B8C7F]" id="dropdown-icon"></i>
                            <h1 class="font-bold text-lg text-[#7B8C7F]">BACK</h1>
                        </a>

                        <!-- order info -->
                        <div class="flex flex-row gap-4 text-right">
                            <h1 class="font-bold text-lg text-[#3E6137]">ORDER ID: {{ $order->order_id }}</h1>
                            <h1 class="font-semibold text-xl text-[#7B8C7F]">|</h1>
                            <h1 class="font-bold text-lg text-[#D1764F]">{{ $status->status }}</h1>
                        </div>
                    </div>

                    <span class="block h-[1px] w-full rounded my-2 bg-[#D2D2B0]"></span>

                    <!-- header -->
                    <div class="my-8">
                         @if ($status->status === 'ORDER PLACED')
                             <div class="flex flex-col gap-4 justify-center items-center">
                                 <div class="flex flex-row justify-between items-center w-full px-23">
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">Order Placed</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">To Ship</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">To Receive</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">To Rate</h3>
                                 </div>
    
                                 <img src="{{ asset('images/placed.svg') }}" alt="">
                                     
                                     
                                 <div class="flex flex-row justify-between items-center w-full px-22 text-xs text-[#7B8C7F] font-medium">
                                     <div class="flex flex-col justify-center items-center w-30">
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->format('G:i A') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30">
                                         <h3>Expected</h3>
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->format('d M Y') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30">
                                         <h3>Expected</h3>
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->addDays(3)->format('d M Y') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30"></div>
                                 </div>
                             </div>
    
                         @elseif ($status->status === 'ORDER SHIPPED')
                             <div class="flex flex-col gap-4 justify-center items-center">
                                 <div class="flex flex-row justify-between items-center w-full px-23">
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">Order Placed</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">Order Shipped</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">To Receive</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">To Rate</h3>
                                 </div>
    
                                 <img src="{{ asset('images/shipped.svg') }}" alt="">
                                     
                                     
                                 <div class="flex flex-row justify-between items-center w-full px-22 text-xs text-[#7B8C7F] font-medium">
                                     <div class="flex flex-col justify-center items-center w-30">
                                         @php
                                             $placed = $statuses->where('status', 'ORDER PLACED')->first();
                                         @endphp
                                         <h3>{{ \Carbon\Carbon::parse($placed->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($placed->changed_at)->format('G:i A') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30">
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->format('G:i A') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30">
                                         <h3>Expected</h3>
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->addDays(3)->format('d M Y') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30"></div>
                                 </div>
                             </div>
    
                         @elseif ($status->status === 'ORDER ARRIVED')
                             <div class="flex flex-col gap-4 justify-center items-center">
                                 <div class="flex flex-row justify-between items-center w-full px-23">
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">Order Placed</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">Order Shipped</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">To Receive</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">To Rate</h3>
                                 </div>
    
                                 <img src="{{ asset('images/arrived.svg') }}" alt="">
                                     
                                     
                                 <div class="flex flex-row justify-between items-center w-full px-22 text-xs text-[#7B8C7F] font-medium">
                                     <div class="flex flex-col justify-center items-center w-30">
                                         @php
                                             $placed = $statuses->where('status', 'ORDER PLACED')->first();
                                         @endphp
                                         <h3>{{ \Carbon\Carbon::parse($placed->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($placed->changed_at)->format('G:i A') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30">
                                         @php
                                             $shipped = $statuses->where('status', 'ORDER SHIPPED')->first();
                                         @endphp
                                         <h3>{{ \Carbon\Carbon::parse($shipped->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($shipped->changed_at)->format('G:i A') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30">
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->format('G:i A') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30"></div>
                                 </div>
                             </div>
                         @elseif ($status->status === 'ORDER RECEIVED')
                             <div class="flex flex-col gap-4 justify-center items-center">
                                 <div class="flex flex-row justify-between items-center w-full px-23">
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">Order Placed</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">Order Shipped</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">Order Received</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">To Rate</h3>
                                 </div>
    
                                 <img src="{{ asset('images/received.svg') }}" alt="">
                                     
                                     
                                 <div class="flex flex-row justify-between items-center w-full px-22 text-xs text-[#7B8C7F] font-medium">
                                     <div class="flex flex-col justify-center items-center w-30">
                                         @php
                                             $placed = $statuses->where('status', 'ORDER PLACED')->first();
                                         @endphp
                                         <h3>{{ \Carbon\Carbon::parse($placed->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($placed->changed_at)->format('G:i A') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30">
                                         @php
                                             $shipped = $statuses->where('status', 'ORDER SHIPPED')->first();
                                         @endphp
                                         <h3>{{ \Carbon\Carbon::parse($shipped->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($shipped->changed_at)->format('G:i A') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30">
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->format('G:i A') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30"></div>
                                 </div>
                             </div>
                     
                         @elseif ($status->status === 'ORDER COMPLETED')
                             <div class="flex flex-col gap-4 justify-center items-center">
                                 <div class="flex flex-row justify-between items-center w-full px-23">
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">Order Placed</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">Order Shipped</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">Order Received</h3>
                                     <h3 class="text-sm font-bold w-30 text-center text-[#7B8C7F]">Order Completed</h3>
                                 </div>
    
                                 <img src="{{ asset('images/completed.svg') }}" alt="">
                                     
                                     
                                 <div class="flex flex-row justify-between items-center w-full px-22 text-xs text-[#7B8C7F] font-medium">
                                     <div class="flex flex-col justify-center items-center w-30">
                                         @php
                                             $placed = $statuses->where('status', 'ORDER PLACED')->first();
                                         @endphp
                                         <h3>{{ \Carbon\Carbon::parse($placed->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($placed->changed_at)->format('G:i A') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30">
                                         @php
                                             $shipped = $statuses->where('status', 'ORDER SHIPPED')->first();
                                         @endphp
                                         <h3>{{ \Carbon\Carbon::parse($shipped->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($shipped->changed_at)->format('G:i A') }}</h3>
                                     </div>
    
                                     <div class="flex flex-col justify-center items-center w-30">
                                         @php
                                             $received = $statuses->where('status', 'ORDER RECEIVED')->first();
                                         @endphp
                                         <h3>{{ \Carbon\Carbon::parse($received->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($received->changed_at)->format('G:i A') }}</h3>
                                     </div>
                                     
                                     <div class="flex flex-col justify-center items-center w-30">
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->format('d M Y') }}</h3>
                                         <h3>{{ \Carbon\Carbon::parse($status->changed_at)->format('G:i A') }}</h3>
                                     </div>
                                 </div>
                             </div>
                         @endif
                        
                    </div>

                    <span class="block h-[1.5px] w-full rounded my-2 bg-[#D2D2B0]"></span>
                    
                    <!-- buttons -->
                    <div class="flex gap-10 justify-center my-8">
                        @php
                            $status = $order->statusHistories->first()->status;
                        @endphp

                        @if ($status === 'ORDER PLACED')
                            <a href="" class="border border-[#7B8C7F] text-[#7B8C7F] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#fef5f1] transition">
                                View Invoice
                            </a>
                            <a href="" class="border border-[#7B8C7F] text-[#7B8C7F] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#fef5f1] transition">
                                Cancel Order
                            </a>
                        @elseif ($status === 'ORDER SHIPPED')
                            <a href="" class="border border-[#7B8C7F] text-[#7B8C7F] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#fef5f1] transition">
                                View Invoice
                            </a>
                            <a href="" class="bg-[#3E6137] text-[#FCFCF5] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#68806f] transition">
                                Buy Again
                            </a>
                        @elseif ($status === 'ORDER ARRIVED')
                            <a href="" class="border border-[#7B8C7F] text-[#7B8C7F] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#fef5f1] transition">
                                View Invoice
                            </a>
                            <a href="" class="border border-[#7B8C7F] text-[#7B8C7F] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#fef5f1] transition">
                                Buy Again
                            </a>
                            <a href="" class="bg-[#3E6137] text-[#FCFCF5] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#68806f] transition">
                                Order Received
                            </a>
                        @elseif ($status === 'ORDER RECEIVED')
                            <a href="" class="border border-[#7B8C7F] text-[#7B8C7F] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#fef5f1] transition">
                                View Invoice
                            </a>
                            <a href="" class="border border-[#7B8C7F] text-[#7B8C7F] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#f0f5f2] transition">
                                Buy Again
                            </a>
                            <a href="" class="bg-[#3E6137] text-[#FCFCF5] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#68806f] transition">
                                Rate
                            </a>
                        @elseif ($status === 'ORDER COMPLETED')
                            <a href="" class="border border-[#7B8C7F] text-[#7B8C7F] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#fef5f1] transition">
                                View Invoice
                            </a>
                            <a href="" class="bg-[#3E6137] text-[#FCFCF5] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#68806f] transition">
                                Buy Again
                            </a>
                        @endif
                    </div>

                    <span class="block h-[1px] w-full rounded my-2 bg-[#D2D2B0]"></span>

                    <!-- products -->
                    <div class="my-8">
                        @foreach ($order->items as $item)
                            <a href="{{ route('products.show', $item->variant->product->slug) }}">
                                <div class="flex items flex-col mx-10">
                                    <div class="flex items-center flex-row mx-10">
                                        <img src="{{ asset('storage/' . $item->img) }}" alt="{{ $item->name }}" class="border w-25 h-25 rounded-xs">
                                        <div class="ml-4 flex-1">
                                            <h2 class="text-[#3E6137] font-bold text-xl">{{ $item->name }}</h2>
                                            <p class="text-[#7B8C7F] text-sm">Variant: {{ $item->varname }}</p>
                                            <p class="text-[#7B8C7F] text-sm">{{ $item->quantity }}x</p>
                                        </div>
                                        <p class="text-[#7B8C7F] text-md font-bold">Rp {{ number_format($item->price*$item->quantity, 0, ',', '.') }}</p>
                                    </div>
                                    @if (!$loop->last)
                                        <span class="h-[.5px] bg-[#D2D2B0] rounded my-5"></span>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                    
                    <span class="block h-[1px] w-full rounded my-2 bg-[#D2D2B0]"></span>
                    
                    <!-- info -->
                    <div class="flex flex-row justify-between items-top mx-20 my-8 text-left gap-10 mb-16">
                        <div class="flex flex-col gap-10 w-2/3">
                            <div class="flex flex-col gap-2">
                                <h1 class="text-sm text-[#D1764F] font-bold">Shipping Address</h1>
                                <div class="text-xs text-[#7B8C7F] font-medium">
                                    <p>{{ $user->name }}</p>
                                    <p>Jl. Pakuan no.3, Sumur Batu, Kec. Babakan Madang,</p>
                                    <p>Kabupaten Bogor</p>
                                    <p>Jawa Barat 16810</p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <h1 class="text-sm text-[#D1764F] font-bold">Payment Method</h1>
                                <p class="text-xs text-[#7B8C7F] font-medium">{{ $order->payment_method }}</p>
                            </div>
                        
                        </div>

                        <div class="flex flex-col gap-1 w-1/2">
                            @php
                                $merchadise = $order->items->sum(fn($item) => $item->price * $item->quantity);
                                $shipping = $order->shipping;
                                $total = $merchadise + $shipping;
                            @endphp
                            <h1 class="text-sm text-[#D1764F] font-bold">Billing Details</h1>
                            <div class="flex flex-row justfy-between items-center">
                                <div class="text-xs text-[#7B8C7F] font-medium text-right pl-5 w-1/2">
                                    <p>Merchandise Subtotal</p>
                                </div>

                                <div class="text-md text-[#7B8C7F] font-semibold text-right pl-5 w-1/2">
                                    <p>Rp {{ number_format($merchadise, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <div class="flex flex-row justfy-between items-center">
                                <div class="text-xs text-[#7B8C7F] font-medium text-right pl-5 w-1/2">
                                    <p>Shipping</p>
                                </div>

                                <div class="text-md text-[#7B8C7F] font-semibold text-right pl-5 w-1/2">
                                    <p>Rp {{ number_format($shipping, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <span class="block h-[1px] w-full rounded my-2 bg-[#D2D2B0]"></span>
                            
                            <div class="flex flex-row justfy-between items-center font-bold text-[#3E6137] text-lg text-right">
                                <div class="pl-5 w-1/2">
                                    <p>Total</p>
                                </div>

                                <div class="pl-5 w-1/2">
                                    <p>Rp {{ number_format($total, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    

                    
                </div>
            </div>
        </div>
    </main>
</x-layout>