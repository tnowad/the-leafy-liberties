import { handlePageNumber } from "./handle-page-number.js"
import { page, currentPage } from "./get-data-by-pagination.js"

const handleClick = (i, products) => {

    const totalPage = Math.ceil(products.length / page)

    if (i == 0) return () => {
        currentPage--
        handlePageNumber(currentPage, products)
    }
    else if (i == totalPage + 1) return () => {
        currentPage++
        handlePageNumber(currentPage, products)
    }
    else return () => {
        handlePageNumber(i, products)
    }
}

export { handleClick }