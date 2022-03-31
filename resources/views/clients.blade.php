<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>List of clients</p>
                    @foreach ($clients as $client)
                        <div class="py-3 text-gray-900">
                            <h3 class="text-lg text-gray-500">
                                {{ $client->name }}
                            </h3>
                            <p>{{ $client->id }}</p>
                            <p>{{ $client->redirect }}</p>
                            <p>{{ $client->secret }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-3 p-6 bg-white border-b border-gray-200">
                    <form action="/oauth/clients" method="post">
                        @csrf
                        <div>
                            <x-label for="name">Name</x-label>
                            <x-input name="name" type="text"></x-input>
                        </div>
                        <div class="mt-3">
                            <x-label for="redirect">Redirect</x-label>
                            <x-input name="redirect" type="text"></x-input>
                        </div>

                        <div class="mt-3">
                            <x-button>Create Client</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
