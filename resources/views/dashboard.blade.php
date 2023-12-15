<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- <form action="{{ route('task.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="judul">
                        <input type="text" name="kegiatan">
                        <select name="kategori" id="">
                            @foreach ($kategoris as $task)
                                <option value="{{ $task->id }}">{{ $task->nama }}</option>
                            @endforeach
                        </select>
                        <input type="submit">
                    </form> --}}
                    <a href="{{ route('task.create') }}">tambah</a>
                    <table>
                        <tr>
                            <td>judul</td>
                            <td>kegiatan</td>
                            <td>kategori</td>
                        </tr>
                        @foreach ($tasks as $task)
                        <tr>

                            <td>{{ $task->judul }}</td>
                            <td>{{ $task->kegiatan }}</td>
                            <td>{{ $task->kategori->nama }}</td>

                            <td><a href="{{ route('task.edit', $task) }}" class="btn btn-warning btn-sm">Edit</a></td>
                            <td>
                                <form action="{{ route('task.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-indigo-600 hover:text-indigo-900"
                                      onclick="return confirm('Are you sure delete thisdata?')">Delete</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
