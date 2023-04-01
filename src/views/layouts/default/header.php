<header
  className="flex justify-center w-full sticky top-0 bg-white z-10 border-0 border-solid border-gray-200 border-b-[1px]">
  <div className="mt-5 h-24 container flex justify-between items-center">
    <Link to="/" className="w-48">
    <img src={logo} alt="logo" className="h-20" />
    </Link>
    <div className="hidden sm:block w-full max-w-[140px]">
      <Dropdown trigger={ <>
        <FontAwesomeIcon className="mr-1" icon={faList} />
        Categories
        </>
        }
        options={[
        { label:
        <Link to="/products?category=echill">Category 1</Link> },
        { label:
        <Link to="/products?category=echill">Category 2</Link> },
        { label:
        <Link to="/products?category=echill">Category 3</Link> },
        { label:
        <Link to="/products?category=echill">Category 4</Link> },
        { label:
        <Link to="/products?category=echill">Category 5</Link> },
        ]}
        changeTitle
        />
    </div>
    <div className="w-full box-border px-10">
      <Search placeholder="Search Products..." onSearch={(searchQuery)=> {
        navigate(`/products?search=${searchQuery}`)
        }}
        />
    </div>

    {isIconsVisible ? (
    <div className="flex flex-col w-auto translate-y-10 mr-4">
      <button onClick={toggleIconsVisibility} className="md:hidden">
        <FontAwesomeIcon icon={faClose} />
      </button>
      <IconHeader />
    </div>
    ) : (
    <button onClick={toggleIconsVisibility} className="mr-5 md:hidden">
      <FontAwesomeIcon icon={faBars} />
    </button>
    )}
    {isIconsVisible ||
    <IconHeader className="hidden" />}
  </div>
</header>