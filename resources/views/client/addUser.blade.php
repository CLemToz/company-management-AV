@extends('layout.layout')

@php
    $title = 'Add Client';
    $subTitle = 'Add Client';
    $script = '<script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#imagePreview").css("background-image", "url(" + e.target.result + ")");
                        $("#imagePreview").hide();
                        $("#imagePreview").fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function() {
                readURL(this);
            });
        </script>';
@endphp

@section('content')

    <div class="card h-full p-0 rounded-xl border-0 overflow-hidden">
        <div class="card-body p-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 justify-center">
                <div class="col-span-12 lg:col-span-10 xl:col-span-8 2xl:col-span-6 2xl:col-start-4">
                    <div class="card border border-neutral-200 dark:border-neutral-600">
                        <div class="card-body">
                            <h6 class="text-base text-neutral-600 dark:text-neutral-200 mb-4">Client Details</h6>

                            <!-- Upload Image (optional) -->
                            <div class="mb-6 mt-4">
                                <div class="avatar-upload">
                                    <div class="avatar-edit absolute bottom-0 end-0 me-6 mt-4 z-[1] cursor-pointer">
                                        <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" hidden>
                                        <label for="imageUpload"
                                            class="w-8 h-8 flex justify-center items-center bg-primary-50 dark:bg-primary-600/25 text-primary-600 dark:text-primary-400 border border-primary-600 hover:bg-primary-100 text-lg rounded-full">
                                            <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                        </label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview"> </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Upload Image End -->

                            <!-- Client Form -->
                            <form action="{{ route('clients.store') }}" method="POST">
                                @csrf

                                <div class="mb-5">
                                    <label for="name" class="font-semibold text-neutral-600 text-sm mb-2">Full Name <span
                                            class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control rounded-lg" name="name" id="name"
                                        value="{{ old('name') }}" required>
                                </div>

                                <div class="mb-5">
                                    <label for="email" class="font-semibold text-neutral-600 text-sm mb-2">Email</label>
                                    <input type="email" class="form-control rounded-lg" name="email" id="email"
                                        value="{{ old('email') }}">
                                </div>

                                <div class="mb-5">
                                    <label for="phone" class="font-semibold text-neutral-600 text-sm mb-2">Phone</label>
                                    <input type="tel" id="phone" name="phone" pattern="[6-9]{1}[0-9]{9}" maxlength="10" class="form-control rounded-lg"
                                        value="{{ old('phone') }}">
                                </div>

                                <div class="mb-5">
                                    <label for="website" class="font-semibold text-neutral-600 text-sm mb-2">Website</label>
                                    <input type="text" class="form-control rounded-lg" name="website" id="website"
                                        value="{{ old('website') }}">
                                </div>

                                <div class="mb-5">
                                    <label for="industry"
                                        class="font-semibold text-neutral-600 text-sm mb-2">Industry</label>
                                    <input type="text" class="form-control rounded-lg" name="industry" id="industry"
                                        value="{{ old('industry') }}">
                                </div>

                                <div class="mb-5">
                                    <label for="tags" class="font-semibold text-neutral-600 text-sm mb-2">Tags</label>
                                    <input type="text" class="form-control rounded-lg" name="tags" id="tags"
                                        placeholder="e.g. VIP, Government" value="{{ old('tags') }}">
                                </div>

                                <div class="mb-5">
                                    <label for="address" class="font-semibold text-neutral-600 text-sm mb-2">Address</label>
                                    <textarea name="address" class="form-control rounded-lg" id="address"
                                        placeholder="Client address...">{{ old('address') }}</textarea>
                                </div>

                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('clients.index') }}"
                                        class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-base px-14 py-[11px] rounded-lg">Cancel</a>
                                    <button type="submit"
                                        class="btn btn-primary border border-primary-600 text-base px-14 py-3 rounded-lg">Save</button>
                                </div>
                            </form>
                            <!-- End Client Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection