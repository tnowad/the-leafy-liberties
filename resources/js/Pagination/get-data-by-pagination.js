const page = 6
let currentPage = 1

const getDataByPagination = (number, products) => {
    currentPage = number ? number : 1
    let perProducts = []
    perProducts = products.slice(
        (currentPage - 1) * page,
        (currentPage - 1) * page + page,
    )
    return perProducts
}
export { getDataByPagination, page, currentPage }
