<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <form action="{{ route('task.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="judul">
            <input type="text" name="kegiatan">
            <select name="kategori_id" id="">
                @foreach ($taskses as $taski)
                    <option value="{{ $taski->id }}">{{ $taski->nama }}</option>
                @endforeach
            </select>
            <input type="submit">
        </form>
    </div>
</x-app-layout>