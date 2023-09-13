<li class="flex item-start space-x-4 py-6">
    <img src="{{ $image }}" class="h-20 w-20 flex-none rounded-md object-cover object-center" alt="{{ $name }}">
    <div class="flex-auto space-y-1">
        <h3 class="text-white">{{ $name }}</h3>
        @foreach($features as $feature)
            <p class="text-primary-200">{{ $feature }}</p>
        @endforeach
    </div>
    <div class="flex flex-col">
        <p class="flex-none text-base font-medium text-secondary-300">@money($price)</p>
        <p class="text-white">x {{$quantity}}</p>
    </div>
</li>
