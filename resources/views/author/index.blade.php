<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Author index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-white inline-flex mb-5 p-3">{{ session('success') }}</div>
            @endisset
            @if(session('danger'))
                <div class="bg-white inline-flex mb-5 p-3">{{ session('danger') }}</div>
            @endisset
            <div class="mb-5">
                <a href="{{route('authors.create')}}" class="px-4 py-2 font-semibold text-sm bg-gray-800 hover:bg-gray-100 hover:text-gray-400 transition text-white rounded-full shadow-sm">Add new author</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th>Author name</th>
                            <th>Books count</th>
                            <th>Books</th>
                            <th>Bio</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($authors as $author)
                                <tr>
                                    <td>{{$author->name}}</td>
                                    <td>{{count($author->books)}}</td>
                                    <td>
                                        @foreach($author->books as $key => $book)
                                           {{$book->title}}{{ (count($author->books) - 1 === $key) ? '' : ',' }}
                                        @endforeach
                                    </td>
                                    <td>{{$author->bio}}</td>
                                    <td><a href="{{route('authors.edit', $author)}}">Edit</a>
                                        <br>
                                        <form method="POST" action="{{ route('authors.destroy', $author) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
