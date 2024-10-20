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
                    {{ __("You're logged in!") }}

                    <div class="mt-4">
                        <h3 class="text-lg font-semibold">Referral Data:</h3>
                        <p>Total Referrals: {{ $referralCount }}</p>
                        <p>Invited Users: {{ $invitedUsers->count() }}</p>
                        <p>Registered through Referrals: {{ $registeredCount }}</p>

                        <h4 class="mt-4">Invited Users List:</h4>
                        <ul>
                            @foreach ($invitedUsers as $invitedUser)
                                <li>{{ $invitedUser->email }} (Status: {{ $invitedUser->status }})</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Referral link -->
                    <a href="{{ route('referrals.create') }}"
                    class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold py-2 px-4 rounded-lg shadow-lg hover:from-pink-500 hover:to-purple-500 transition duration-300 ease-in-out transform hover:scale-105">
                    Refer Your Friends
                 </a>

            </div>
        </div>
    </div>
</x-app-layout>
