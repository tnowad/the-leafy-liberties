<footer
    class="flex justify-center w-full flex-col items-center border-0 border-solid border-t-[1px] border-gray-400 mt-4 pt-5">
    <div class="container sm:grid sm:m-auto lg:flex">
        <div
            class="left-container border-0 border-solid border-gray-400 pr-3 sm:border-r-0 sm:border-b-[1px] lg:border-r-[1px] lg:border-b-0 mobile:p-0">
            <div class="sm:justify-center sm:items-center lg:flex lg:justify-start">
                <div class="flex justify-center items-center">
                    <img src={bigLogo} alt="logo" />
                </div>
                <div class="flex flex-col justify-center lg:flex mobile:hidden">
                    <p class="text-3xl border-0 border-solid border-b-[1px] border-gray-400 pb-1">
                        Leaf Liberty
                    </p>
                    <p class="">Book online store website</p>
                </div>
            </div>
            <div class="description">
                <p class="text-base mt-3 p-3 font-normal mobile:text-center lg:text-left">
                    The LeafLiberty is a Book Store E-commerce Website Designed by
                    Tuan, Phat, Chinh, Bao
                </p>
            </div>
            <div class="w-full h-12 mt-6 pl-3">
                <div class="flex justify-evenly">
                    <FontAwesomeIcon icon={faFacebookF} size="2x" color="#999999"
                        class="hover:text-blue-500 transition-colors cursor-pointer" />
                    <FontAwesomeIcon icon={faYoutube} size="2x" color="#999999"
                        class="hover:text-red-500 transition-colors cursor-pointer" />
                    <FontAwesomeIcon icon={faInstagram} size="2x" color="#999999"
                        class="hover:text-pink-500 transition-colors cursor-pointer" />
                    <FontAwesomeIcon icon={faTwitter} size="2x" color="#999999"
                        class="hover:text-blue-400 transition-colors cursor-pointer" />
                </div>
            </div>
        </div>
        <div
            class="right-container grid grid-cols-2 sm:grid-cols-4 justify-center text-center sm:w-full sm:mt-7 lg:w-3/4">
            <div class="explore">
                <button class="text-xl font-medium mb-2">Explore</button>
                <MenuLinks class="text-gray-600" items={[ { name: 'About us' , link: '/' }, { name: 'Site map' ,
                    link: '/' }, { name: 'Bookmarks' , link: '/' }, { name: 'Pricing table' , link: '/' }, ]} />
            </div>
            <div class="our-services">
                <button class="text-xl font-medium mb-2">
                    Our services
                </button>
                <MenuLinks class="text-gray-600" items={[ { name: 'Help center' , link: '/' }, { name: 'Product recalls'
                    , link: '/' }, { name: 'Accessibility' , link: '/' }, { name: 'Store pickup' , link: '/' }, {
                    name: 'Membership' , link: '/' }, ]} />
            </div>
            <div class="categories">
                <button class="text-xl font-medium mb-2">Categories</button>
                <MenuLinks class="text-gray-600" items={[ { name: 'Action' , link: '/' }, { name: 'Comedy' , link: '/'
                    }, { name: 'Horror' , link: '/' }, { name: 'Kids' , link: '/' }, { name: 'Drama' , link: '/' },
                    ]} />
            </div>
            <div class="contact">
                <button class="text-xl font-medium mb-2">
                    Get Contact
                </button>
                <MenuLinks class="text-gray-600" items={[ { name: 'SGU University' , link: '/' }, {
                    name: 'HCM City, VietNam' , link: '/' }, { name: '0123456789' , link: '/' }, { name: '0123456789' ,
                    link: '/' }, { name: 'sgu@edu.vn' , link: '/' }, ]} />
            </div>
        </div>
    </div>
    <div class="w-full border-0 border-solid border-t-[1px] border-gray-400 text-center pt-4 mt-6 text-gray-500">
        <p>
            The Leaf Liberty Bookstore E-commerce Website - © 2023 All Rights Reserved
        </p>
    </div>
</footer>