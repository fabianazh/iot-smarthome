<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Manage Device
        </h2>
    </x-slot>

    <div class="flex flex-wrap py-12 sm:px-[3.5rem] lg:px-[4.5rem] gap-4">
        {{-- Top --}}
        <div class="flex sm:flex-nowrap  flex-wrap w-full gap-4">

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

                    <form method="post" action="/device/{{ $device->slug }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $device->name)" required autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="type" :value="__('Type')" />
                            <x-text-input id="type" name="type" type="text" class="block text-gray-600 w-full mt-1" placeholder="{{ $device->model->deviceType['name'] }}" disabled />
                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                        </div>

                        <div>
                            <x-input-label for="room" :value="__('Room')" />
                            <x-text-input id="room" name="room" type="text" class="block w-full mt-1" :value="old('room', $device->room)" required autocomplete="room" />
                            <x-input-error class="mt-2" :messages="$errors->get('room')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update') }}</x-primary-button>

                            @if (session('status') === 'device-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </section>
            {{-- End Device Information --}}

            {{-- Remote --}}
            <section class="w-full sm:w-4/12 order-first sm:order-none h-auto max-w-7xl">
                <div class="flex flex-col h-full p-6 overflow-hidden bg-white shadow-sm gap-11 sm:rounded-lg">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Device Controller') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Control your device.") }}
                        </p>
                    </header>
                    @if ($device->status === 'On')
                        <div class="grid remote-wrapper mx-auto rounded-full shadow-lg cursor-pointer w-44 place-items-center text-9xl aspect-square">
                            <input name="onoff" id="onoff" type="checkbox" class="sr-only on-button text-blue-700"/>
                            <label data-device-id={{ $device->id }} data-action="off" for="onoff" class="cursor-pointer remote-button">
                                <i class="fa-solid fa-power-off"></i>
                            </label>
                        </div>
                    @else
                        <div class="grid remote-wrapper mx-auto rounded-full shadow-lg cursor-pointer w-44 place-items-center text-9xl aspect-square">
                            <input name="onoff" id="onoff" type="checkbox" class="sr-only off-button text-stone-900"/>
                            <label data-device-id={{ $device->id }} data-action="on" for="onoff" class="cursor-pointer remote-button">
                                <i class="fa-solid fa-power-off"></i>
                            </label>
                        </div>
                    @endif
                    <div class="flex flex-col w-full h-16 gap-3">
                        <label for="default-range" class="block font-medium text-gray-900 text dark:text-white">Brightness</label>
                        <div class="flex items-center justify-between w-full mb-3 text-xl">
                            <i class='bx bx-moon'></i>
                            <input name="brightness" type="range" id="brightness" min="0" max="255" step="1" value="1" class="w-[80%] translate-y-[1px] h-3 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                            <i class='bx bx-sun'></i>
                        </div>
                    </div>
                </div>
            </section>
            {{-- End Remote --}}
        </div>
        {{-- End Top --}}

        {{-- Delete Device --}}
        <div class="w-full h-auto p-6 space-y-6 overflow-hidden bg-white border shadow-sm sm:rounded-lg">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Delete Device') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your device is deleted, all of its resources and data will be permanently deleted.') }}
                </p>
            </header>

            <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            >{{ __('Delete Device') }}</x-danger-button>

            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="/device/{{ $device->slug }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Are you sure you want to delete this device?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Once your device is deleted, all of its resources and data will be permanently deleted.') }}
                    </p>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3">
                            {{ __('Delete Device') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        </div>
        {{-- End Delete Device --}}
    </div>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('js/command.js') }}"></script>
    <script src="{{ asset('js/onoff-button.js') }}"></script>
    <script src="{{ asset('js/device-status.js') }}"></script>
</x-app-layout>
