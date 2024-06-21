@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed rounded-md top-1 left-1/2 transform -translate-x-1/2 bg-dark-blue border border-white shadow text-white text-xs md:text-sm lg:text-base px-4 py-3 w-3/5 md:w-2/5 text-center">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif
