<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add device') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Choose Device Type and Model') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Add your smart device type and model of device.") }}
                            </p>
                        </header>

                        <div class="mt-6 flex flex-col gap-8">
                            @foreach ($type as $item)
                                <div class="flex flex-col gap-3">
                                    <h3>{{ $item->name }}</h3>
                                    <div class="w-full flex flex-row flex-wrap gap-[1.35rem]">
                                        @foreach ($item->devices as $device)
                                        <form method="post" action="/device/add-device" class="shrink-0 w-[10.5rem] sm:w-[13.5rem] h-20 items-center flex rounded-md px-4 py-4 bg-stone-100/90 hover:bg-stone-200/80 duration-300 transition-colors">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $device->id }}">
                                            <button class="grid grid-cols-2 place-items-center w-full">
                                                <img src="{{ asset('storage/device/'.$device->image) }}" alt="{{ $device->image }}" class="h-10">
                                                <span class="text-sm">
                                                    {{ $device->name }}
                                                </span>
                                            </button>
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
