import { Link } from "react-router-dom";

export default function Header() {
    return (
        <div className="bg-[#15161D] border-b-[3px] border-[#D10024] py-6 px-4">
            <div className="container mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
                
                {/* Logo */}
                <Link to="/" className="text-3xl font-bold text-white tracking-widest">
                    Electro<span className="text-[#D10024]">.</span>
                </Link>

                {/* Search Bar */}
                <div className="flex w-full md:w-1/2 rounded-full overflow-hidden">
                    <select className="bg-white border-r px-4 py-3 text-gray-600 outline-none hidden lg:block rounded-l-full w-48 text-sm">
                        <option>All Categories</option>
                        <option>Laptops</option>
                        <option>Smartphones</option>
                        <option>Cameras</option>
                    </select>
                    <input
                        type="text"
                        placeholder="Search here"
                        className="w-full px-4 py-3 outline-none text-sm lg:rounded-none rounded-l-full"
                    />
                    <button className="bg-[#D10024] text-white px-8 py-3 font-bold hover:bg-[#b0001e] transition rounded-r-full">
                        Search
                    </button>
                </div>

                {/* Icons */}
                <div className="flex items-center space-x-6 text-white text-sm">
                    <div className="flex flex-col items-center cursor-pointer hover:text-[#D10024] transition relative group">
                        <span className="text-xl mb-1">🤍</span>
                        <span className="text-xs">Your Wishlist</span>
                        <div className="absolute -top-2 right-4 bg-[#D10024] text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full">2</div>
                    </div>
                    
                    <Link to="/cart" className="flex flex-col items-center cursor-pointer hover:text-[#D10024] transition relative group">
                        <span className="text-xl mb-1">🛒</span>
                        <span className="text-xs">Your Cart</span>
                        <div className="absolute -top-2 right-2 bg-[#D10024] text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full">3</div>
                    </Link>
                </div>

            </div>
        </div>
    );
}