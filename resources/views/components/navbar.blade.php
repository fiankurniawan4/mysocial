<div class="navbar bg-base-100">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">MySocial</a>
    </div>
    <div class="flex-none gap-2">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img alt="Tailwind CSS Navbar component"
                        src="https://www.gravatar.com/avatar/1a2dc59abe16bd6f16165b76ffc69a50?d=mm&s=100" />
                </div>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                @auth
                    <x-nav-link href='#'>Profile</x-nav-link>
                    <x-nav-link href='#'>Logout</x-nav-link>
                @endauth
                @guest
                    <x-nav-link href="#">Login</x-nav-link>
                    <x-nav-link href="#">Register</x-nav-link>
                @endguest
            </ul>
        </div>
    </div>
</div>
