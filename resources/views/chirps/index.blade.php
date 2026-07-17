<x-layout>
    {{-- <x-slot:title>
        Welcome
    </x-slot:title> --}}
    <x-slot:username>Jhon Doe</x-slot:username>
    <main>
        <h3>Latest Chirps</h3>        
        <x-chirpEdit :users="$users" :chirp="$chirp" />
        <p>
           @foreach($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
           @endforeach
        </p>
    </main>
</x-layout>