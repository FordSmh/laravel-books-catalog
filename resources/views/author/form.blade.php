<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(isset($author))
                {{ __('Update author') }}
            @else
                {{ __('Add new author') }}
            @endif
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ isset($author) ? route('authors.update', $author) : route('authors.store') }}">
                @if (isset($author))
                @method('PUT')
                @endif
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('name')" />

                    <x-input id="name"
                             required
                             class="block mt-1 w-full"
                             type="text"
                             name="name"
                             value="{{old('name') ?? $author->name ?? ''}}" />
                </div>

                <!-- Birthday -->
                <div class="mt-4">
                    <x-label for="birthday" :value="__('birthday')" />

                    <x-input id="birthday" class="block mt-1 w-full"
                             type="date"
                             name="birthday"
                             value="{{old('birthday') ?? $author->birthday ?? ''}}"
                             required/>
                </div>

                <!-- Bio -->
                <div class="mt-4">
                    <x-label for="bio" :value="__('bio')" />

                    <x-input id="bio" required class="block mt-1 w-full" type="text" rows="3" name="bio" value="{{old('bio') ?? $author->bio ?? ''}}" />
                </div>

                <!-- Submit -->
                <x-button class="my-3">
                    {{ __('Submit') }}
                </x-button>
            </form>
        </div>
    </div>
</x-app-layout>
