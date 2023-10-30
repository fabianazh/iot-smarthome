<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Add Device
        </h2>
    </x-slot>

    <div class="flex py-12 sm:px-[3.5rem] lg:px-[4.5rem] gap-4">
        {{-- Top --}}
        <div class="flex flex-col-reverse sm:flex-nowrap sm:flex-row w-full gap-4">

            {{-- Device Information --}}
            <section class="w-full sm:w-8/12">
                <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Device Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Update your device information.") }}
                        </p>
                    </header>

                    <form method="post" action="/device/add" class="mt-6 space-y-6">
                        @csrf

                        <input type="hidden" name="device_model_id" value="{{ $device->id }}">

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $device->name)" placeholder="Add device name." required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="type" :value="__('Type')" />
                            <x-text-input id="type" name="type" type="text" class="block w-full mt-1"  placeholder="{{ $device->deviceType['name'] }}" disabled />
                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                        </div>

                        <div>
                            <x-input-label for="room" :value="__('Room')" />
                            <x-text-input id="room" name="room" type="text" class="block w-full mt-1" :value="old('room')" placeholder="Add device room." required autofocus autocomplete="room" />
                            <x-input-error class="mt-2" :messages="$errors->get('room')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Add') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </section>
            {{-- End Device Information --}}

            {{-- Display --}}
            <section class="w-full sm:w-4/12 h-auto max-w-7xl">
                <div class="grid place-items-center h-full p-6 overflow-hidden bg-white shadow-sm gap-1 sm:gap-2.5 rounded-lg">
                    <img src="{{ asset('storage/device/'.$device->image) }}" alt="{{ $device->name }}" class="w-40 sm:w-full">
                    <span class="text-sm sm:text-base">
                        {{ __('Model : '. $device->name) }}
                    </span>
                </div>
            </section>
            {{-- End Display --}}
        </div>
        {{-- End Top --}}
    </div>
</x-app-layout>
