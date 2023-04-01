<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Profile</title>
</head>

<body>
  <div class="w-full bg-white flex justify-center">
    <!-- //? information  -->
    <div class="container">
      <div class=" mt-5 md:mt-20 flex flex-col md:flex-row border border-b-2 border-green-300 box-border w-full">
        <div class="w-3/4 flex md:flex-col flex-row justify-around md:justify-start md:w-1/4">
          <div class="flex flex-col justify-center items-center">
            <img src={avatar} class="w-3/6" alt="avatar" />
            <h1 class="mt-5 text-xl w-8/12 lg:w-5/12 inline-block  lg:text-center">
              Hoàng Gia Bảo
            </h1>
          </div>
          <div class="mx-auto flex flex-col justify-center items-start">
            <div class="mt-5 flex">
              <FontAwesomeIcon icon={faHome} size="xl" class="mr-2" />
              <h3 class="cursor-pointer text-xl">Overview</h3>
            </div>
            <div class="mt-5 flex">
              <FontAwesomeIcon icon={faUser} size="xl" class="mr-2" />
              <h3 class="cursor-pointer">Account settings</h3>
            </div>
            <div class="mt-5 flex">
              <FontAwesomeIcon icon={faCheck} size="xl" class="mr-2" />
              <h3 class="cursor-pointer">Payments</h3>
            </div>
            <div class="mt-5 flex">
              <FontAwesomeIcon icon={faBagShopping} size="xl" class="mr-2" />
              <h3 class="cursor-pointer">Order</h3>
            </div>
          </div>
        </div>
        <!-- //? information detail  -->
        <div class="p-2 w-full md:w-3/4">
          <form class="flex flex-col">
            <!-- //? group full name  -->
            <div class="flex flex-row justify-between">
              <div class="w-4/12 flex flex-col">
                <label>First name *</label>
                <input type="text" required class="h-9 p-5 w-full border border-solid border-gray-300 rounded-md" />
              </div>
              <div class="w-4/12 flex flex-col">
                <label>Last name *</label>
                <input type="text" required class="h-9 p-5 w-full border border-solid border-gray-300 rounded-md" />
              </div>
            </div>
            <label>User name *</label>
            <input type="text" required class="h-9 p-5 w-full border border-solid border-gray-300 rounded-md" />
            <label>Email address *</label>
            <input type="text" class="h-9 p-5 w-full border border-solid border-gray-300 rounded-md" />
            <label>Phone number *</label>
            <input type="tel" class="h-9 p-5 w-full border border-solid border-gray-300 rounded-md" name="phone" placeholder="+84XXXXXXXXX" pattern="^(\+84|0)(1\d{9}|3\d{8}|5\d{8}|7\d{8}|8\d{8}|9\d{8})$" required></input>
            <label>Gender *</label>
            <div class="flex justify-around w-3/4 md:w-3/5">
              <input type="radio" name="gender" value="Male" class="h-5 w-6 inline-block border border-solid border-gray-300 rounded-md" />
              <label class="">Male</label>
              <input type="radio" name="gender" value="Male" class="h-5 w-6 inline-block border border-solid border-gray-300 rounded-md" />
              <label class="">Female</label>
              <input type="radio" name="gender" value="Male" class="h-5 w-6 inline-block border border-solid border-gray-300 rounded-md" />
              <label class="">Other</label>
            </div>

            <label>Birthday *</label>
            <div class="h-8 md:h-10 w-full md:w-2/4 flex justify-between">
              <input type="number" min="1" max="31" class="p-1 pl-6  text-base md:text-2xl border border-solid border-gray-300 rounded" />
              <div class="h-8 md:h-10 p-1 border border-solid border-gray-300 rounded">
                <span>Month:</span>
                <input type="number" class="pl-1 w-8 md:pl-2 h-2 md:h-8" min="1" max="12" />
              </div>

              <div class="p-1 border border-solid border-gray-300 rounded">
                <span>Year:</span>
                <input type="number" class="pl-1 md:pl-2 h-2 md:h-8" min="1900" max="2023" />
              </div>
            </div>
            <label class="ml-10 mt-10">Password change</label>
            <div class="p-2 flex flex-col border border-solid border-teal-800 rounded">
              <div class="lg:w-3/4">
                <label>
                  Current password (leave blank to leave unchanged)
                </label>
                <input type="text" class="h-9 p-5 w-full border border-solid border-gray-300 rounded-md" />
              </div>
              <div class="lg:w-3/4">
                <label>
                  Current password (leave blank to leave unchanged)
                </label>
                <input type="text" class="h-9 p-5 w-full border border-solid border-gray-300 rounded-md" />
              </div>
              <div class="lg:w-3/4">
                <label>Confirm new password</label>

                <input type="text" class="h-9 p-5 w-full border border-solid border-gray-300 rounded-md" />
              </div>
            </div>
            <input type="submit" value="Save changes" class="p-2 mt-5 w-3/6 sm:w-1/6 text-white cursor-pointer bg-teal-800 border  rounded-2xl" />
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>