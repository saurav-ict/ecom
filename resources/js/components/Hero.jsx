import React from 'react';

export default function Hero() {
    return (
        <div className="bg-[#E4E7ED] relative overflow-hidden flex items-center min-h-[350px] shadow-inner">
            <div className="absolute top-0 right-0 w-1/2 h-full bg-[#D10024] transform skew-x-[-20deg] origin-bottom-right -mr-32 z-0 opacity-10"></div>

            <div className="relative z-10 p-8 md:p-12 w-full md:w-2/3">
                <h4 className="text-[#D10024] font-bold tracking-wider uppercase mb-2">New Collection</h4>
                <h2 className="text-4xl md:text-5xl font-black text-[#15161D] mb-4 uppercase leading-tight">
                    Smartphones <br /> <span className="font-light">& Laptops</span>
                </h2>
                <p className="text-gray-600 mb-8 text-lg font-medium">Up to 30% OFF on premium brands</p>
                <button className="bg-[#D10024] text-white font-bold px-8 py-3 uppercase tracking-wider hover:bg-[#15161D] transition-colors rounded-full shadow-md text-sm">
                    Shop Now
                </button>
            </div>

            {/* Geometric Shape Decoration */}
            <div className="absolute right-0 bottom-0 bg-[#D10024] text-white w-32 h-32 rounded-full flex flex-col justify-center items-center transform translate-x-8 translate-y-8 z-20 shadow-xl border-[6px] border-white">
                <span className="text-sm font-bold uppercase">From</span>
                <span className="text-2xl font-black">$299</span>
            </div>
        </div>
    );
}