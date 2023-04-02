<div class="w-full bg-neutral-100">
    <div class="w-full my-0 mx-auto overflow-x-hidden">
        <div class="mt-10 min-h-screen box-border w-full px-10 mobile:px-5">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">
                    <!-- {window.location.pathname
                    .split('/')
                    .map(
                    (item) => item.charAt(0).toUpperCase() + item.substring(1)
                    )} -->
                </h1>
            </div>
            <div class="top-wrap box-border grid 2xl:grid-cols-4 xl:gap-5 lg:grid-cols-2 lg:gap-2">
                <!-- <GeneralStatistics iconic={faArrowTrendUp} text="Sales" money="$20.4K" desc="We have sold 10K items"
                    className="bg-blue-400 border-blue-400 shadow-[0_0_5px_1px_rgba(164,202,254,0.3)] shadow-blue-400" />
                <GeneralStatistics iconic={faDollarSign} text="Total Revenues" money="100K" desc="Available to pay out"
                    className="bg-green-400 border-green-400 shadow-[0_0_5px_1px_rgba(49,196,141,0.3)] shadow-green-400" />
                <GeneralStatistics iconic={faUserGroup} text="New Customer" money="203" desc="More customer more money"
                    className="bg-orange-400 border-orange-400 shadow-[0_0_5px_1px_rgba(255,138,76,0.3)] shadow-orange-400" />
                <GeneralStatistics iconic={faBagShopping} text="New Order" money="12" desc="New things coming' up"
                    className="bg-red-400 border-red-400 shadow-[0_0_5px_1px_rgba(255,138,76,0.3)] shadow-red-400" /> -->
            </div>
            <div class="body-wrap w-full my-8 flex justify-between items-start flex-wrap">
                <div class="chart 2xl:w-[65.5%] px-6 py-4 bg-white rounded-2xl shadow-lg mobile:w-full">
                    <div class="total-revuenes">
                        <p class="font-semibold text-2xl">Total Revuenes</p>
                        <p class="mt-2 font-bold text-lg">$50.4K</p>
                    </div>
                    <!-- <Chart series={options.series} options={options} type="bar" width="100%" height="350px" /> -->
                </div>
                <div
                    class="most-sold-items 2xl:w-[31.5%] py-4 px-4 bg-white rounded-2xl shadow-lg mobile:w-full mobile:mt-5 2xl:mt-0">
                    <p class="font-bold text-2xl mb-5">Most Sold Items</p>
                    <div class="flex flex-col gap-4">
                        <!-- <div class="text-base font-medium">Dark</div>
                        <Progress progress={75} color="dark" /> -->
                    </div>
                </div>
            </div>
            <div class="table-statistics my-8 shadow-lg cursor-pointer rounded-2xl overflow-hidden bg-white">
                <div class="relative">
                    <table
                        class="w-full text-sm text-center text-gray-500 rounded-2xl border-collapse overflow-hidden">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    {item.name}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-200 transition-opacity">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {item.products}
                                </td>
                                <td class="px-6 py-3">{item.order_id}</td>
                                <td class="px-6 py-3">{item.date}</td>
                                <td class="px-6 py-3">{item.name}</td>
                                <td class="px-6 py-3">{item.status}</td>
                                <td class="px-6 py-3">{item.amount}</td>
                                <td class="px-6 py-4 w-44">
                                    <ButtonDashBoard />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
