
import { getData } from "../getDataFormServer/get-data.js"
import { handlePagination } from "../Pagination/handle-pagination.js"
import { handlePageNumber } from "../Pagination/handle-page-number.js"

const filterByPrice = (products, priceRange) => {
    let filteredProducts = []

    for (let i = 0; i < products.length; i++) {
        let product = products[i]
        if (priceRange === "lessThan10" && product.price < 10) {
            filteredProducts.push(product)
        } else if (
            priceRange === "between11And30" &&
            product.price >= 11 &&
            product.price <= 30
        ) {
            filteredProducts.push(product)
        } else if (priceRange === "greaterThan30" && product.price > 30) {
            filteredProducts.push(product)
        }
    }

    return filteredProducts
}

const resetOption = async (event) => {
    event.preventDefault()

    document.getElementById("less-than-10").checked = false;
    document.getElementById("11-to-30").checked = false;
    document.getElementById("greater-than-30").checked = false;
    document.getElementById("high-to-low").checked = false;
    document.getElementById("low-to-high").checked = false;

}

const filterProducts = async (event) => {
    event.preventDefault()

    let products = await categoriesFilter()

    const lessThan10 = document.getElementById("less-than-10").checked
    const between11And30 = document.getElementById("11-to-30").checked
    const greaterThan30 = document.getElementById("greater-than-30").checked
    const highToLow = document.getElementById("high-to-low").checked
    const lowToHigh = document.getElementById("low-to-high").checked

    let filteredProducts = products

    if (highToLow) {
        products.sort((a, b) => b.price - a.price)
    } else if (lowToHigh) {
        products.sort((a, b) => a.price - b.price)
    }

    if (lessThan10) {
        filteredProducts = filterByPrice(products, "lessThan10")
    } else if (between11And30) {
        filteredProducts = filterByPrice(products, "between11And30")
    } else if (greaterThan30) {
        filteredProducts = filterByPrice(products, "greaterThan30")
    }

    await handlePagination(filteredProducts)
    handlePageNumber(null, products)
}

const categoriesFilter = async () => {
    var url = window.location.href;
    var params = new URLSearchParams(new URL(url).search)
    var categoryId = params.get('category')
    let categoriesFilter = []

    let products = await getData("getProducts")
    let productCategories = await getData("getProductCategories")
    if (categoryId == "All" || categoryId == "" || categoryId == null) return products
    for (let i = 0; i < productCategories.length; i++) {
        if (productCategories[i].category_id == categoryId) {
            for (let j = 0; j < products.length; j++) {
                if (productCategories[i].product_id == products[j].id) {
                    categoriesFilter.push(products[j])
                }
            }
        }
    }
    return categoriesFilter
}

window.onload = async function () {
    const products = await categoriesFilter()
    await handlePagination(products)
    handlePageNumber(null, products)
}

