<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    
</head>
<body>
    <div id="sidebar" class="bg-green-200 text-green-900 h-screen w-16 fixed top-0 left-0 flex flex-col justify-between transition-all duration-300 overflow-hidden rounded-tr-md rounded-br-md">
        <div class="p-4 border-b border-green-400 flex items-center justify-center sidebar-header">
             <img id="LogoIcon" src="{{ asset('assets/images/revo.svg')}}" alt="Logo Icon" class="h-20 w-20">
             <img id="LogoFull" src = "{{ asset('assets/images/GrevoHD.svg')}}" alt="Logo Full" class="h-20 w-20 hidden">
        </div>

    <nav class="flex-1 mt-4">
        <ul class="space-y-4">
            @php
                $navItems = [
                    ['img' => 'Home.svg', 'label' => 'Home', 'route' => 'organization.listorg'],
                    ['img' => 'ProductList.svg', 'label' => 'Product List', 'route' => 'organization.listorg'],
                    ['img' => 'TreeList.svg', 'label' => 'Tree List', 'route' => 'organization.listorg'],
                    ['img' => 'OrgList.svg', 'label' => 'Organization List', 'route'=> 'organization.listorg'],
                    ['img' => 'OrderList.svg', 'label' => 'Order List', 'route' => 'organization.listorg'],
                    ['img' => 'OrderTree.svg', 'label' => 'Order Tree', 'route' => 'organization.listorg'],
                    ['img' => 'Reforestation.svg', 'label' => 'Reforestation', 'route' => 'organization.listorg'],
                ];
            @endphp

            @foreach ($navItems as $item)
                <li class ="flex items-center px-4 space-x-4 hover:bg-green-300 cursor-pointer">
                    <a href="{{route($item['route'])}}" class="flex items-center py-2 space-x-4 justify-center">
                        <img src ="{{ asset('assets/images/' . $item['img']) }}" alt="{{ $item['label']}}" class="h-6 min-w-6 object-contain">
                        <span class="link-text hidden">{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

        <div class="border-t border-green-400 p-4 flex justify-between items-center">
            <div class="flex flex-row gap-4">
                <img src ="{{ asset('assets/images/Admin.svg')}}" alt="Admin" class="h-8 w-auto">
                <span class ="link-text hidden">Admin</span>
            </div>
            <div class="ml-auto">
                <a href="{{ route('tree.listtree') }}" class="flex items-center gap-2">
                    <img id="logoutIcon" src="{{ asset('assets/images/Logout.svg') }}" alt="Logout" class="hidden h-8 w-auto">
                    <!-- <span class="link-text hidden">Logout</span> -->
                </a>
            </div>
        </div>      
    </div>
    <button id="toggleSidebar" class="fixed top-1/2 left-16 transform -translate-y-1/2 bg-green-300 p-1 rounded z-10">
                ▶
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('toggleSidebar');
            const textElements = sidebar.querySelectorAll('.link-text');
            const logoFull = document.getElementById('LogoFull');
            const logoIcon = document.getElementById('LogoIcon');
            const logoutIcon = document.getElementById('logoutIcon'); 

            let expanded = false;
            toggleBtn.addEventListener('click', function(){
                expanded = !expanded;
                sidebar.classList.toggle('w-64', expanded);
                sidebar.classList.toggle('w-16', !expanded);
                textElements.forEach(el => el.classList.toggle('hidden', !expanded));
                // logoText.classList.toggle('hidden', !expanded);
                // alert("AYAM");  
                if (expanded) {
                    logoIcon.classList.add('hidden');
                    logoFull.classList.remove('hidden');
                    logoutIcon.classList.remove('hidden');
                } else {
                    logoIcon.classList.remove('hidden');
                    logoFull.classList.add('hidden');
                    logoutIcon.classList.add('hidden');
                }
                toggleBtn.innerText = expanded ? '◀' : '▶';
                toggleBtn.style.left = expanded ? '16rem' : '4rem';
            });
        });
    </script>
</body>
</html>