<x-layout>
    <main class="mx-auto p-6 pt-12 min-h-screen" style="background-color: #F7F6EB;">
        <div class="flex mx-[5vw] gap-10">
            <!-- Left Sidebar: User Profile and Navigation -->
            @include('components.profilebar', ['user' => $user])

            <!-- Right Side: Order History -->
            <div class="flex flex-col w-full">
                <!-- search bar + filter-->
                <div class="w-full bg-[#FCFCF5] h-fit rounded-xl px-5 mb-5" style="box-shadow: 0 0 12.2px 0 rgba(0,0,0,0.06);">
                    <!-- search bar -->
                    <form method="GET" action="{{ route('orders') }}" class="w-full flex items-center p-4 gap-2 text-[#A6A66B]">
                        <input
                            type="text"
                            name="keyword"
                            value="{{ request('keyword') }}"
                            placeholder="Search by Order ID or Product Name"
                            class="flex-1 border border-[#D2D2B0] rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#D2D2B0]"
                        >
                        <button
                            type="submit"
                            class="bg-[#D2D2B0] px-4 py-2 rounded hover:bg-[#bdbd8d] transition"
                        >
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                    
                    <!-- filter -->
                    <div class="flex gap-3 flex-wrap ml-6" style="margin-top: -10px;">
                        @php
                            $statuses = [
                                'all' => 'All',
                                'to-ship' => 'To Ship',
                                'to-receive' => 'To Receive',
                                'delivered' => 'Delivered',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled'
                            ];
                            $active = request('status', 'all');
    
                            // Mapping for filtering orders by status
                            $statusMap = [
                                'to-ship' => ['ORDER PLACED'],
                                'to-receive' => ['ORDER SHIPPED'],
                                'delivered' => ['ORDER ARRIVED'],
                                'completed' => ['ORDER RECEIVED', 'ORDER COMPLETED'],
                                'cancelled' => ['CANCELLED'],
                            ];
                        @endphp
    
                        @foreach($statuses as $key => $label)
                            <a 
                                href="{{ route('orders', ['status' => $key]) }}"
                                class="relative px-4 py-2 {{ $active === $key ? 'text-[#3E6137] font-bold' : 'text-[#D2D2B0]' }}"
                            >
                                <span class="relative z-10">{{ $label }}</span>
                                @if($active === $key)
                                    <span class="absolute left-0 right-0 bottom-0 h-1 bg-[#3E6137] rounded" style="margin-left: -1px; margin-right: -1px;"></span>
                                @endif
                            </a>
                        @endforeach

                    </div>
                </div>

                <!-- Orders -->
                @forelse ($orders as $order)
                    <!-- order card -->
                    <div class="mb-5 rounded-xl" style="box-shadow: 0 0 12.2px 0 rgba(0,0,0,0.06);">
                        <!-- atas -->  
                        <a href="{{ route('order.show', $order->order_id) }}">
                            <div class="w-full bg-[#FCFCF5] h-fit rounded-xl px-8 py-6 flex flex-col">                        
                                <!-- header -->
                                <div class="flex justify-between items-center mb-5">
                                    <div class="flex flex-col gap-1">
                                        <p class="text-[#D1764F] text-sm font-bold">
                                            ORDER ID: {{ $order->order_id }}
                                        </p>
                                        <p class="text-[#7B8C7F] text-sm font-semibold">
                                            {{ \Carbon\Carbon::parse($order->statusHistories->last()->changed_at)->format('d M Y, g:i A') }}
                                        </p>
                                    </div>
                                    <p class="font-bold text-[#D1764F] text-xl">
                                        @php
                                            $status = $order->statusHistories->first()->status;
                                            $statusLabels = [
                                                'ORDER PLACED'    => 'TO SHIP',
                                                'ORDER SHIPPED'   => 'TO RECEIVE',
                                                'ORDER ARRIVED'   => 'DELIVERED',
                                                'ORDER RECEIVED'  => 'COMPLETED',
                                                'ORDER COMPLETED' => 'COMPLETED',
                                                'CANCELLED'       => 'CANCELLED',
                                            ];
                                        @endphp
                                        <span>
                                            {{ strtoupper($statusLabels[$status] ?? $status) }}
                                        </span>
                                    </p>
                                </div>
                                
                                <!-- products -->
                                @foreach ($order->items as $item)
                                    <div class="flex items flex-col">
                                        <div class="flex items-center flex-row">
                                            <img src="{{ asset('storage/' . $item->img) }}" alt="{{ $item->name }}" class="w-25 h-25 rounded-xs">
                                            <div class="ml-4 flex-1">
                                                <h2 class="text-[#3E6137] font-bold text-lg">{{ $item->name }}</h2>
                                                <p class="text-[#7B8C7F] text-sm">Variant: {{ $item->variant }}</p>
                                                <p class="text-[#7B8C7F] text-sm">{{ $item->quantity }}x</p>
                                            </div>
                                            <p class="text-[#7B8C7F] text-md font-bold">Rp {{ number_format($item->price*$item->quantity, 0, ',', '.') }}</p>
                                            
                                        </div>
                                        @if (!$loop->last)
                                            <span class="h-[.5px] bg-[#D2D2B0] rounded my-5" style="margin-left: -1px; margin-right: -1px;"></span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            
                        </a>
                        
                        <!-- bawah -->
                        <div class="flex flex-row justify-between items-center px-8 w-full bg-[#FFFFF4] h-fit rounded-xl px-8 py-6 rounded-lg">
                            <!-- button Berdasarkan Status -->
                            <div class="flex gap-4">
                                @php
                                    $status = $order->statusHistories->first()->status;
                                @endphp

                                @if ($status === 'ORDER PLACED')
                                    <a href="" class="border border-[#7B8C7F] text-[#7B8C7F] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#fef5f1] transition">
                                        Cancel Order
                                    </a>
                                @elseif ($status === 'ORDER SHIPPED' || $status === 'ORDER ARRIVED')
                                    <a href="" class="bg-[#3E6137] text-[#FCFCF5] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#68806f] transition">
                                        Order Received
                                    </a>
                                @elseif ($status === 'ORDER RECEIVED')
                                    <a href="" class="bg-[#3E6137] text-[#FCFCF5] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#68806f] transition">
                                        Buy Again
                                    </a>
                                    <a href="" class="border border-[#7B8C7F] text-[#7B8C7F] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#f0f5f2] transition">
                                        Rate
                                    </a>
                                @elseif ($status === 'ORDER COMPLETED')
                                    <a href="" class="bg-[#3E6137] text-[#FCFCF5] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#68806f] transition">
                                        Buy Again
                                    </a>
                                @elseif ($status === 'CANCELLED')
                                    <a href="" class="bg-[#3E6137] text-[#FCFCF5] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#68806f] transition">
                                        Buy Again
                                    </a>
                                    <a href="" class="border border-[#7B8C7F] text-[#7B8C7F] text-sm font-semibold px-10 py-2 rounded-lg hover:bg-[#f5f5e8] transition">
                                        View Cancellation Detail
                                    </a>
                                @endif
                            </div>

                            <!-- 💰 Total -->
                            <div class="flex flex-row items-center gap-10 text-right">
                                <p class="text-sm font-semibold text-[#7B8C7F]">Order total:</p>
                                @php
                                    $total = $order->items->sum(fn($item) => $item->price * $item->quantity);
                                @endphp

                                <p class="text-xl font-bold text-[#D1764F]">
                                    Rp {{ number_format($total, 0, ',', '.') }}
                                </p>

                            </div>
                        </div>
                    </div>
                    
                @empty
                    <img src="{{ asset('images/noorders.svg') }}" alt="No Orders" class="h-50 w-auto mt-30">
                    
                @endforelse

            </div>
        </div>
    </div>
</x-layout>
