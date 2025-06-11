@extends('layout.layout')

@php
    $title = 'Client Details - '. $client->name;
    $subTitle = 'Client Details';
@endphp

@section('content')

<div class="max-w-4xl mx-auto bg-white dark:bg-neutral-800 shadow rounded-xl p-8">
    <h6>This page needs dark mode optimization</h6>
    <div class="overflow-x-auto">
        <table class="w-full table-auto border border-gray-200 dark:border-neutral-600 text-sm">
            <tbody>
                <tr class="border-b border-gray-100 dark:border-neutral-700">
                    <td class="p-4 font-semibold text-neutral-600 dark:text-neutral-300">Full Name</td>
                    <td class="p-4 text-neutral-800 dark:text-neutral-100">{{ $client->name }}</td>
                </tr>
                <tr class="border-b border-gray-100 dark:border-neutral-700">
                    <td class="p-4 font-semibold text-neutral-600 dark:text-neutral-300">Email</td>
                    <td class="p-4 text-neutral-800 dark:text-neutral-100">{{ $client->email ?? 'No email provided' }}</td>
                </tr>
                <tr class="border-b border-gray-100 dark:border-neutral-700">
                    <td class="p-4 font-semibold text-neutral-600 dark:text-neutral-300">Phone</td>
                    <td class="p-4 text-neutral-800 dark:text-neutral-100">{{ $client->phone ?? 'N/A' }}</td>
                </tr>
                <tr class="border-b border-gray-100 dark:border-neutral-700">
                    <td class="p-4 font-semibold text-neutral-600 dark:text-neutral-300">Website</td>
                    <td class="p-4 text-neutral-800 dark:text-neutral-100">{{ $client->website ?? 'N/A' }}</td>
                </tr>
                <tr class="border-b border-gray-100 dark:border-neutral-700">
                    <td class="p-4 font-semibold text-neutral-600 dark:text-neutral-300">Industry</td>
                    <td class="p-4 text-neutral-800 dark:text-neutral-100">{{ $client->industry ?? 'N/A' }}</td>
                </tr>
                <tr class="border-b border-gray-100 dark:border-neutral-700">
                    <td class="p-4 font-semibold text-neutral-600 dark:text-neutral-300">Tags</td>
                    <td class="p-4 text-neutral-800 dark:text-neutral-100">{{ $client->tags ?? '-' }}</td>
                </tr>
                <tr class="border-b border-gray-100 dark:border-neutral-700">
                    <td class="p-4 font-semibold text-neutral-600 dark:text-neutral-300">Address</td>
                    <td class="p-4 text-neutral-800 dark:text-neutral-100">{{ $client->address ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="p-4 font-semibold text-neutral-600 dark:text-neutral-300">Client Since:</td>
                    <td class="p-4 text-neutral-800 dark:text-neutral-100">{{ $client->created_at->format('d M, Y') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
