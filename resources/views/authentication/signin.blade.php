<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<x-head />

<body class="dark:bg-neutral-800 bg-neutral-100 dark:text-white">

    <section class="bg-white dark:bg-dark-2 flex flex-wrap min-h-[100vh]">
        <div class="lg:w-1/2 lg:block hidden">
            <div class="flex items-center flex-col h-full justify-center">
                <img src="{{ asset('assets/images/auth/auth-img.png') }}" alt="">
            </div>
        </div>
        <div class="lg:w-1/2 py-8 px-6 flex flex-col justify-center">
            <div class="lg:max-w-[464px] mx-auto w-full">
                <div>
                    <a href="{{ route('index') }}" class="mb-2.5 max-w-[290px]">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    </a>
                    <h4 class="mb-3">Sign In to your Account</h4>
                    <p class="mb-8 text-secondary-light text-lg">Welcome back! please enter your detail</p>
                </div>
                <form method="POST" action="{{ route('authenticate') }}">
                    @csrf
                    <div class="icon-field mb-4 relative">
                        <span class="absolute start-4 top-1/2 -translate-y-1/2 pointer-events-none flex text-xl">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>

                        <input type="email" name="email" required
                            class="form-control h-[56px] ps-11 border-neutral-300 bg-neutral-50 dark:bg-dark-2 rounded-xl"
                            placeholder="Email">
                    </div>
                    <div class="relative mb-5">
                        <div class="icon-field">
                            <span class="absolute start-4 top-1/2 -translate-y-1/2 pointer-events-none flex text-xl">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="password" required
                                class="form-control h-[56px] ps-11 border-neutral-300 bg-neutral-50 dark:bg-dark-2 rounded-xl"
                                id="your-password" placeholder="Password">
                        </div>
                        @error('email')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                        @error('password')
                            <div style="color: red;">{{ $message }}</div>
                        @enderror
                       <span class="toggle-password ri-eye-line cursor-pointer absolute end-0 top-1/2 -translate-y-1/2 me-4 text-secondary-light"
      data-toggle="#your-password"></span>
                    </div>
                    <div class="mt-7">
                        <div class="flex justify-between gap-2">
                            <div class="flex items-center">
                                <input class="form-check-input border border-neutral-300" type="checkbox" value=""
                                    id="remeber">
                                <label class="ps-2" for="remeber">Remember me </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="btn btn-primary justify-center text-sm btn-sm px-3 py-4 w-full rounded-xl mt-8"> Sign
                        In</button>

                </form>
            </div>
        </div>
    </section>

    @php
        $script = '<script>
                                                // ================== Password Show Hide Js Start ==========
                                                function initializePasswordToggle(toggleSelector) {
                                                    $(toggleSelector).on("click", function() {
                                                        $(this).toggleClass("ri-eye-off-line");
                                                        var input = $($(this).attr("data-toggle"));
                                                        if (input.attr("type") === "password") {
                                                            input.attr("type", "text");
                                                        } else {
                                                            input.attr("type", "password");
                                                        }
                                                    });
                                                }
                                                // Call the function
                                                initializePasswordToggle(".toggle-password");
                                                // ========================= Password Show Hide Js End ===========================
                                    </script>';
    @endphp

    <x-script :script="$script" />

</body>

</html>