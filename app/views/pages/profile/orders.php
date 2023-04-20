<?php $user = $params["user"]; ?>
<div class="flex justify-center w-full bg-white">
    <div class="container">
        <div class="box-border flex flex-col w-full mt-10 border border-b-2 border-gray-300 md:flex-row">
            <?php include "menu.php"; ?>
            <!-- content -->
            <div class="table-statistics my-8 shadow-lg cursor-pointer rounded-2xl overflow-hidden bg-white">
                <div class="relative">
                    <table class="w-full text-sm text-center text-gray-500 rounded-2xl overflow-y-scroll h-64">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <?php
                                $name = [
                                  "STT",
                                  "booking date",
                                  "Status",
                                  "Total Price",
                                  "Action",
                                ];
                                for ($i = 1; $i <= 5; $i++) { ?>
                                <th scope="col" class="px-16 py-3">
                                    <?php echo $name[$i - 1]; ?>
                                </th>
                                <?php }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                            <tr class="bg-white border-b hover:bg-gray-200 transition-opacity even:bg-gray-100">
                                <!-- <td class="px-5 py-3">#1</td> -->
                                <td class="px-5 py-3"></td>
                                <td class="px-5 py-3">30/02/2023</td>
                                <td class="px-5 py-3">Accept</td>
                                <td class="px-5 py-3">100000</td>
                                <td class="px-5 py-4 w-44">
                                    <div class="button flex justify-center items-center gap-4">
                                        <button
                                            class="edit-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-blue-500 transition-all">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button
                                            class="delete-button py-2 px-3 bg-[#8cbfba] text-white rounded-xl hover:text-red-600 transition-all">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
async function getUser() {
    let d1 = await fetch("http://localhost/the-leafy-liberties/profile")
    let d2 = await d1.json()
    console.log(d2)
    // document.getElementById("name").value = d2.name;
    // document.getElementById("gender").value = d2.gender;
    // document.getElementById("birthday").value = d2.birthday;
    // document.getElementById("password").value = d2.password;
}
console.log(1)
getUser()
</script>
