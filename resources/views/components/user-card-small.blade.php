<div x-data="{ open: false }" 
    @click.outside="open = false" 
    @close.stop="open = false"
    class="ml-3 relative">
    <div>
        <button type="button"
            class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
            @click="open = ! open">
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full"
                src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                alt="">
        </button>
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
        x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
        role="menu" aria-orientation="vertical"
        aria-labelledby="user-menu-button" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()"
        @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false"
        @keydown.enter.prevent="open = false; focusButton()" @keyup.space.prevent="open = false; focusButton()">
        <div class="py-1" role="none">
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm">View profile</a>
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm">Settings</a>
        </div>
        <div class="py-1" role="none">
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm">Logout</a>
        </div>
    </div>

</div>