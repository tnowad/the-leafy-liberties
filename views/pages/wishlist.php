<div>
  <div class="my-10 md:my-16
      flex flex-col items-center">
    <FontAwesomeIcon class="text-4xl md:text-6xl text-green-800" icon={faHeart} />
    <h1 class=" text-4xl text-green-800 md:text-6xl">My wishlist</h1>
  </div>
  <WindowSize onSizeChange={handleSizeChange} />
  {window.innerWidth > 650 ? (
  <table class="w-full border-collapse">
    <thead class="w-full bg-gray-100 rounded-sm">
      <tr class="w-44">
        {arrayTitle.map((item) => {
        return (
        <th colSpan={item.name==='Action' ? 2 : 1} class="px-4 py-2" key={item.name}>
          {item.name}
        </th>
        )
        })}
      </tr>
    </thead>
    <tbody>
      {productData.map((item) => {
      return (
      <tr key={item.id} class="text-center">
        <td>{item.image}</td>
        <td>{item.category}</td>
        <td>{item.status}</td>
        <td>{item.amount}</td>
        <td class="border px-1 py-2">
          <button class="bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            <FontAwesomeIcon class="hover:" icon={faCartPlus} />
          </button>
        </td>
        <td class="border px-4 py-2">
          <button class="bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            <FontAwesomeIcon icon={faTrash} />
          </button>
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
    <table key={item.id} class="ml-5 mb-8 pt-10 flex flex-row justify-around border-0 border-t-2 border-gray-200 border-solid ">
      <thead>
        <tr class="flex flex-col">
          {arrayTitle.map((item) => {
          return (
          <th class={ item.name==='Action' ? `h-16 pt-5` : `h-auto` } key={item.name}>
            {item.name}
          </th>
          )
          })}
        </tr>
      </thead>
      <tbody>
        <tr class="text-center flex flex-col justify-around ">
          <td>{item.image}</td>
          <td>{item.category}</td>

          <td>{item.status}</td>
          <td>{item.amount}</td>
          <td class="border px-1 py-2">
            <button class="bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
              <FontAwesomeIcon class="hover:" icon={faCartPlus} />
            </button>
            <button class="ml-3 bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
              <FontAwesomeIcon icon={faTrash} />
            </button>
          </td>
          <td class="border px-4 py-2"></td>
        </tr>
      </tbody>
    </table>
    )
    })}
  </>
  )}
</div>
