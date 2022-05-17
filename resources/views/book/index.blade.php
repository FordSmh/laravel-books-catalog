<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="{{route('books.create')}}" class="px-4 py-2 font-semibold text-sm bg-gray-800 hover:bg-gray-100 hover:text-gray-400 transition text-white rounded-full shadow-sm">Add new book</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th>Book title</th>
                            <th>Authors</th>
                            <th>Publish year</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->title}}</td>
                                    <td>
                                        @foreach($book->authors as $key => $author)
                                           {{$author->name}}{{ (count($book->authors) - 1 === $key) ? '' : ',' }}
                                        @endforeach
                                    </td>
                                    <td>{{$book->publish_date}}</td>
                                    <td><a href="{{route('books.edit', $book)}}">Edit</a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
