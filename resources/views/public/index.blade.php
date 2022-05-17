<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Authors and their books') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ml-4 bg-white border-b border-gray-200">
                    <ol class="list-decimal">
                        @foreach($authors as $author)
                            <li class="mb-5">
                                <h2 class="font-semibold text-xl inline-flex">{{$author->name}}</h2> - <span>{{count($author->books)}}</span>
                                <br>
                                @foreach ($author->books as $book)
                                    {{$book->title}}<br>
                                @endforeach
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
