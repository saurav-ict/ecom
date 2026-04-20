export default function Footer() {
    return (
        <footer className="mt-16">
            {/* Newsletter Section */}
            <div className="bg-[#1E1F29] border-t-4 border-[#D10024] py-10">
                <div className="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
                    <div className="text-white mb-6 md:mb-0">
                        <h4 className="text-2xl font-bold mb-2">Sign Up for the <span className="text-[#D10024]">NEWSLETTER</span></h4>
                        <p className="text-gray-400 text-sm">Get exciting offers and discounts straight to your inbox.</p>
                    </div>
                    <div className="w-full md:w-1/2 flex">
                        <input type="email" placeholder="Enter Your Email" className="w-full px-6 py-3 rounded-l-full outline-none text-sm text-gray-800" />
                        <button className="bg-[#D10024] text-white font-bold px-8 py-3 rounded-r-full hover:bg-[#b0001e] transition uppercase text-sm border-none">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>

            {/* Main Footer */}
            <div className="bg-[#15161D] pt-12 pb-8 border-t border-[#1E1F29]">
                <div className="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div>
                        <h3 className="text-white font-bold uppercase mb-6 tracking-wider text-[15px]">About Us</h3>
                        <p className="text-gray-400 text-sm leading-loose mb-6">
                            We are an electronics store providing the best quality products worldwide.
                        </p>
                        <ul className="text-gray-400 text-sm space-y-3 font-medium">
                            <li><span className="text-[#D10024] mr-2 text-lg">📍</span> 1734 Stonecoal Road</li>
                            <li><span className="text-[#D10024] mr-2 text-lg">☎</span> +021-95-51-84</li>
                            <li><span className="text-[#D10024] mr-2 text-lg">✉</span> email@electro.com</li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 className="text-white font-bold uppercase mb-6 tracking-wider text-[15px]">Categories</h3>
                        <ul className="text-gray-400 text-sm space-y-3 font-medium">
                            <li><a href="#" className="hover:text-[#D10024] transition">Hot deals</a></li>
                            <li><a href="#" className="hover:text-[#D10024] transition">Laptops</a></li>
                            <li><a href="#" className="hover:text-[#D10024] transition">Smartphones</a></li>
                            <li><a href="#" className="hover:text-[#D10024] transition">Cameras</a></li>
                            <li><a href="#" className="hover:text-[#D10024] transition">Accessories</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 className="text-white font-bold uppercase mb-6 tracking-wider text-[15px]">Information</h3>
                        <ul className="text-gray-400 text-sm space-y-3 font-medium">
                            <li><a href="#" className="hover:text-[#D10024] transition">About Us</a></li>
                            <li><a href="#" className="hover:text-[#D10024] transition">Contact Us</a></li>
                            <li><a href="#" className="hover:text-[#D10024] transition">Privacy Policy</a></li>
                            <li><a href="#" className="hover:text-[#D10024] transition">Orders and Returns</a></li>
                            <li><a href="#" className="hover:text-[#D10024] transition">Terms & Conditions</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 className="text-white font-bold uppercase mb-6 tracking-wider text-[15px]">Service</h3>
                        <ul className="text-gray-400 text-sm space-y-3 font-medium">
                            <li><a href="#" className="hover:text-[#D10024] transition">My Account</a></li>
                            <li><a href="#" className="hover:text-[#D10024] transition">View Cart</a></li>
                            <li><a href="#" className="hover:text-[#D10024] transition">Wishlist</a></li>
                            <li><a href="#" className="hover:text-[#D10024] transition">Track My Order</a></li>
                            <li><a href="#" className="hover:text-[#D10024] transition">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            {/* Bottom Footer */}
            <div className="bg-[#1E1F29] py-6 text-center border-t border-[#15161D]">
                <p className="text-gray-500 text-sm">
                    &copy; {new Date().getFullYear()} ElectroStore. All rights reserved.
                </p>
            </div>
        </footer>
    );
}
