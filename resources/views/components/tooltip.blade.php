<span 
    x-data="{ tooltip: false }" 
    x-on:mouseover="tooltip = true" 
    x-on:mouseleave="tooltip = false"
    class="ml-2 h-5 w-5 cursor-pointer">
    {{ $trigger }}
  <div x-show="tooltip"
    class="text-sm text-white absolute bg-gray-900 rounded-lg 
    p-1 transform -translate-y-8 translate-x-8 z-40"
  >
     {{$slot}}
  </div>
</span>