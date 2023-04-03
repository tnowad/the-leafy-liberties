<section class="bg-white">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Create and account
                </h1>
                <form class="space-y-4 md:space-y-6" action="#">
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Your email
                        </label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter username" required="" />
                    </div>
                    <div class='relative'>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Password
                        </label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" />
                        <i id="hide-icon-password" class="fa fa-eye-slash absolute top-[60%] right-4 cursor-pointer" aria-hidden="true"></i>
                        <i id="show-icon-password" class="fa fa-eye absolute hidden top-[60%] right-4 cursor-pointer" aria-hidden="true"></i>
                    </div>
                    <div class="relative">
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Confirm password
                        </label>
                        <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" />
                        <i id="hide-icon-confirm-password" class="fa fa-eye-slash absolute top-[60%] right-4 cursor-pointer" aria-hidden="true"></i>
                        <i id="show-icon-confirm-password" class="fa fa-eye absolute hidden top-[60%] right-4 cursor-pointer" aria-hidden="true"></i>
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-green-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-green-600 dark:ring-offset-gray-800" required="" />
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light text-gray-500 dark:text-gray-300">
                                I accept the
                                <Link class="font-medium text-green-600 hover:underline dark:text-green-500" href="#">
                                Terms and Conditions
                                </Link>
                            </label>

                        </div>

                    </div>
                    <button type="submit" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Create an account
                    </button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Already have an account?
                        <Link to="/login" class="font-medium text-green-600 hover:underline dark:text-green-500">
                        Login here
                        </Link>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    const password = document.getElementById("password");
    const hideIconPassword = document.getElementById("hide-icon-password");
    const showIconPassword = document.getElementById("show-icon-password");

    hideIconPassword.addEventListener("click", function() {
        if (password.type === "password") {
            password.type = "text";
            hideIconPassword.style.display = "none";
            showIconPassword.style.display = "block";
        }
    });
    showIconPassword.addEventListener("click", function() {
        if (password.type === "text") {
            password.type = "password";
            hideIconPassword.style.display = "block";
            showIconPassword.style.display = "none";
        }
    });

    const confirmPassword = document.getElementById("confirm-password");
    const hideIconConfirmPassword = document.getElementById("hide-icon-confirm-password");
    const showIconConfirmPassword = document.getElementById("show-icon-confirm-password");

    hideIconConfirmPassword.addEventListener("click", function() {
        if (confirmPassword.type === "password") {
            confirmPassword.type = "text";
            hideIconConfirmPassword.style.display = "none";
            showIconConfirmPassword.style.display = "block";
        }
    });
    showIconConfirmPassword.addEventListener("click", function() {
        if (confirmPassword.type === "text") {
            confirmPassword.type = "password";
            hideIconConfirmPassword.style.display = "block";
            showIconConfirmPassword.style.display = "none";
        }
    });
</script>