<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-12">
        <a href="/">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1>Вернуться на главную страницу</h1>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="py-12">
        <a href="/adminpannel">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @if(Auth::user()->is_admin)
                            <h1>Перейти в панель администратора</h1>
                        @endif
                    </div>
                </div>
            </div>
        </a>
    </div>
</x-app-layout>
