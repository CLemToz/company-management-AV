@extends('layout.layout')

@php
    $title = 'Edit Client';
    $subTitle = 'Edit Profile';
@endphp

@section('content')

    <div class="max-w-4xl mx-auto bg-white dark:bg-neutral-800 shadow-xl rounded-2xl p-10">

        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="block text-sm font-semibold text-gray-600 dark:text-neutral-300 mb-2">Full Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $client->name) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-primary-300 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 dark:text-neutral-300 mb-2">Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $client->email) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-primary-300 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 dark:text-neutral-300 mb-2">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $client->phone) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring dark:bg-neutral-700 dark:border-neutral-600 dark:text-white">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 dark:text-neutral-300 mb-2">Website</label>
                    <input type="text" name="website" value="{{ old('website', $client->website) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring dark:bg-neutral-700 dark:border-neutral-600 dark:text-white">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 dark:text-neutral-300 mb-2">Industry</label>
                    <input type="text" name="industry" value="{{ old('industry', $client->industry) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring dark:bg-neutral-700 dark:border-neutral-600 dark:text-white">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-600 dark:text-neutral-300 mb-2">Tags</label>
                    <input type="text" name="tags" value="{{ old('tags', $client->tags) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring dark:bg-neutral-700 dark:border-neutral-600 dark:text-white">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-600 dark:text-neutral-300 mb-2">Address</label>
                    <textarea name="address" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring dark:bg-neutral-700 dark:border-neutral-600 dark:text-white">{{ old('address', $client->address) }}</textarea>
                </div>
            </div>

            <div class="flex items-center justify-end mt-10 space-x-4">
                <a href="{{ route('clients.index') }}"
                    class="px-6 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-100 dark:border-neutral-500 dark:text-white dark:hover:bg-neutral-700" style="margin-right: 10px">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>

@endsection