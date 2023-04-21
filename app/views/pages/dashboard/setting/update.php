<?php $setting = $params["setting"]; ?>
<div class="w-full min-h-screen ">
    <div class="bg-white rounded-md shadow-lg w-full p-5 my-5">
        <form class="flex flex-col" action="<?php echo BASE_URI .
                                                "/dashboard/setting/update"; ?>" method="POST">

            <label for="id" class="my-2">ID:</label>
            <input type="text" value="<?php echo $setting->id; ?>" name="id" class="bg-gray-100 p-3 focus:outline-none rounded-lg" disabled />

            <label for="name" class="my-2">Name:</label>
            <input type="text" value="<?php echo $setting->name; ?>" name="name" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

            <label for="expired" class="my-2">Value:</label>
            <input type="number" value="<?php echo $setting->value; ?>" name="value" class="bg-gray-100 p-3 focus:outline-none rounded-lg" />

            <button class="my-2 bg-[#2e524e] hover:bg-[#52938d] transition-colors text-white font-bold py-2 px-4 rounded" type="submit">
                Submit
            </button>
            <a class="cancel-edit-button my-1 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center" href="<?php echo BASE_URI . "/dashboard/customer"; ?>">
                Cancel
            </a>
        </form>
    </div>
</div>
<script>
    const password = document.querySelector("input[type=password]");
    // console.log(password)

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
    const inputs = document.querySelectorAll("input");
    inputs.forEach((input) => {
        input.addEventListener("blur", function() {
            if (input.type === "email") {
                if (!input.value.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g)) {
                    input.style.border = "1px solid red";
                } else {
                    input.style.border = "1px solid #d1d5db";
                }
            }
            if (input.type === "tel") {
                if (!input.value.match(/(84|0[3|5|7|8|9])+([0-9]{8})\b/g)) {
                    input.style.border = "1px solid red";
                } else {
                    input.style.border = "1px solid #d1d5db";
                }
            }
            if (input.type === "password") {
                if (!input.value.match(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/g)) {
                    input.style.border = "1px solid red";
                } else {
                    input.style.border = "1px solid #d1d5db";
                }
            }
        });
    });
</script>