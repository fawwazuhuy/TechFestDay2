<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div>
        <form action="{{ route('task.update', $taskas) }}"method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="mb-2">
                        <div for="judul">Title</div>
                            <input type="text" name="judul"class="w-full form-input rounded-md shadow-sm 
                            @error('judul') border border-red-500 
                            @enderror" placeholder="enter blog title" value="{{ old('judul') ?? $taskas->judul}}">
                    </div>
                    <div class="mb-2">
                        <div for="kegiatan">pengarang</div>
                            <input type="text" name="kegiatan"class="w-full form-input rounded-md shadow-sm 
                            @error('pengarang') border border-red-500 
                            @enderror" placeholder="enter blog title" value="{{ old('kegiatan') ?? $taskas->kegiatan}}">
                    </div>
                    <select name="kategori">
                        @foreach ($taskses as $taski)
                            <option value="{{ $taski->id }}">{{ $taski->nama }}</option>
                        @endforeach
                    </select>
                    <input type="submit">
        </form>
    </div>
</x-app-layout>