@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed rounded-md top-1 left-1/2 transform -translate-x-1/2 bg-dark-blue text-white px-4 py-3 whitespace-nowrap">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif
