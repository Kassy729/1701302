<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('자동차정보 목록보기') }}
        </h2>
    </x-slot>
    <x-post-list :posts="$posts" />
</x-app-layout>
