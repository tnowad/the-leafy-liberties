<div class="w-full my-0 mx-auto overflow-x-hidden">
  <div class="mt-10 min-h-screen box-border w-full px-10 mobile:px-5">
    <div class="flex justify-between">
      <h1 class="text-xl font-bold">Product</h1>
      {/* toggle the visibility of the form when the button is clicked */}
      <button class="w-5 h-5 text-2xl " onClick={()=> setIsFormVisible(!isFormVisible)}
        >
        +
      </button>
    </div>
    <div class="table-product-statistics my-8 shadow-lg cursor-pointer rounded-2xl overflow-hidden bg-white">
      <div class="relative">
        <WindowSize onSizeChange={handleSizeChange} />
        {window.innerWidth > 882 ? (
        <table class="w-full text-sm text-center text-gray-500 rounded-2xl border-collapse overflow-hidden">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              {arrayTitle.map((item) => {
              return (
              <th key={item.name} scope="col" colSpan={item.action==='Action' ? 2 : 1} class="px-6 py-3">
                {item.name}
              </th>
              )
              })}
            </tr>
          </thead>
          <tbody>
            {productData.map((item) => {
            return (
            <tr key={item.id} class="bg-white border-b hover:bg-gray-200 transition-opacity">
              <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {item.image}
              </td>
              <td class="px-6 py-3">{item.category}</td>
              <td class="px-6 py-3">{item.entered}</td>
              <td class="px-6 py-3">{item.remaining}</td>
              <td class="px-6 py-3">{item.status}</td>
              <td class="px-6 py-3">{item.amount}</td>
              <td class="px-6 py-4 w-44">
                <ButtonDashBoard />
              </td>
            </tr>
            )
            })}
          </tbody>
        </table>
        ) : (
        <>
          {productData.map((item) => {
          return (
          <table key={item.id} class="w-full text-sm text-left text-gray-500 border-collapse overflow-hidden flex flex-row justify-between border-0 border-solid border-gray-200 border-b-[1px]">
            <thead class="text-xs text-gray-700 uppercase">
              <tr class="flex flex-col">
                {arrayTitle.map((item) => {
                return (
                <th scope="col" class="px-5 py-[18px] w-full">
                  {item.name}
                </th>
                )
                })}
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white flex flex-col justify-between text-center">
                <td class="px-5 py-[10px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {item.image}
                </td>
                <td class="px-5 py-4">{item.category}</td>
                <td class="px-5 py-4">{item.entered}</td>
                <td class="px-5 py-4">{item.remaining}</td>
                <td class="px-5 py-4">{item.status}</td>
                <td class="px-5 py-4">{item.amount}</td>
                <td class="px-5 py-4 w-44">
                  <ButtonDashBoard />
                </td>
              </tr>
            </tbody>
          </table>
          )
          })}
        </>
        )}
      </div>
    </div>
    {isFormVisible && (
    <div class="absolute top-0 left-0 h-full w-full flex justify-center items-center bg-gray-500 bg-opacity-75 z-10">
      <div class="bg-white p-8 rounded-md shadow-lg w-[500px]">
        <h2 class="text-xl font-bold mb-4">Add Product</h2>
        {/* Form fields go here */}
        <form class="flex flex-col" onSubmit={handleSubmit}>
          <label htmlFor="image">Image:</label>
          <input type="file" onChange={(e)=> setImage(e.target.value)} />

          <label htmlFor="category">Category:</label>
          <input type="text" value={category} onChange={(e)=> setCategory(e.target.value)}
          class="bg-gray-100 px-2 focus:outline-none rounded-lg"

          />
          <label htmlFor="entered">Entered:</label>
          <input type="number" value={entered} onChange={(e)=> setEntered(e.target.value)}
          class="bg-gray-100 px-2 focus:outline-none rounded-lg"

          />
          <label htmlFor="remaining">Remaining:</label>
          <input type="number" value={remaining} onChange={(e)=> setRemaining(e.target.value)}
          class="bg-gray-100 px-2 focus:outline-none rounded-lg"

          />
          <label htmlFor="status">Status:</label>
          <select value={status} onChange={(e)=> setStatus(e.target.value)}
            class="bg-gray-100 px-2 focus:outline-none rounded-lg"

            >
            <option value="">Select status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>

          <label htmlFor="amount">Amount:</label>
          <input type="date" value={amount} onChange={(e)=> setAmount(e.target.value)}
          class="bg-gray-100 px-2 focus:outline-none rounded-lg"

          />

          <button class="mt-2 bg-green-800 hover:bg-green-600 transition-colors text-white font-bold py-2 px-4 rounded" type="submit">
            Submit
          </button>
          <button class="mt-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded " onClick={()=> setIsFormVisible(false)}
            >
            Cancel
          </button>
        </form>
      </div>
    </div>
    )}
  </div>
</div>