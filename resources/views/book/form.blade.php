<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(isset($book))
                {{ __('Update book') }}
            @else
                {{ __('Add new book') }}
            @endif
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ isset($author) ? route('books.update', $author) : route('books.store') }}">
                @if (isset($book))
                    @method('PUT')
                @endif
                @csrf

                <!-- Title -->
                <div>
                    <x-label for="book" :value="__('book')" />

                    <x-input id="title" required class="block mt-1 w-full" type="text" name="title" value="{{old('title') ?? $book->title ?? ''}}" autofocus />
                </div>

                <!-- Authors -->
                <div class="mt-4">
                    <x-label for="authors" :value="__('Authors')" />
                    <select type="text" name="authors[]" id="authors" multiple>
                    @foreach ($authors as $author)
                        <option
                            value="{{$author->id}}"
                            @if(isset($book))
                                @if($book->authors->contains($author->id))
                                selected
                                @endif
                            @endif
                        >
                            {{$author->name}}
                        </option>
                    @endforeach
                    </select>
                </div>

                <!-- Birthday -->
                <div class="mt-4">
                    <x-label for="publish_date" :value="__('publish_date')" />

                    <x-input id="publish_date" class="block mt-1 w-full"
                             type="date"
                             name="publish_date"
                             value="{{old('publish_date') ?? $book->publish_date ?? ''}}"
                             required/>
                </div>

                <!-- Bio -->
                <div>
                    <x-label for="description" :value="__('description')" />

                    <x-input
                        id="description"
                        required
                        class="block mt-1 w-full"
                        type="text"
                        rows="3"
                        name="description"
                        value="{{old('description') ?? $book->description ?? ''}}" />
                </div>

                <!-- Submit -->
                <x-button class="my-3">
                    {{ __('Submit') }}
                </x-button>
            </form>
        </div>
    </div>
</x-app-layout>
