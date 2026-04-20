export default function Topbar() {
    return (
        <div className="bg-[#1E1F29] text-gray-300 text-xs py-2 px-4 flex flex-col sm:flex-row justify-between items-center font-medium border-b border-gray-800">
            <div className="flex space-x-6 mb-2 sm:mb-0">
                <span><span className="text-[#D10024] mr-1">☎</span> +91 9999999999</span>
                <span><span className="text-[#D10024] mr-1">✉</span> email@electro.com</span>
                <span className="hidden md:inline"><span className="text-[#D10024] mr-1">📍</span> 1734 Stonecoal Road</span>
            </div>
            <div className="flex space-x-4">
                <a href="#" className="hover:text-[#D10024] transition">₹ INR</a>
                <a href="#" className="hover:text-[#D10024] transition">My Account</a>
            </div>
        </div>
    );
}