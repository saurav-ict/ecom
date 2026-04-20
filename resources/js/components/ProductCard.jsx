import React from 'react';
export default function ProductCard({ product, title, price, image }) {
    // Handling both prop formats (from Home mapping and older hardcoded)
    const displayTitle = product?.name || title || 'Awesome Product';
    const displayPrice = product?.price || price || '99.99';
    const oldPrice = product?.old_price || (parseFloat(displayPrice) * 1.2).toFixed(2);
    const category = product?.category?.name || 'Category';
    const isNew = true; // Placeholder for demo

    return (
        <div className="bg-white border border-gray-200 relative group hover:border-[#D10024] transition-colors overflow-hidden flex flex-col h-full">
            {/* Badges */}
            <div className="absolute top-4 left-4 z-10 flex flex-col gap-2">
                {isNew && <span className="bg-[#D10024] text-white text-[10px] font-bold uppercase px-2 py-1 rounded-sm tracking-wider">New</span>}
                <span className="bg-white text-[#D10024] border border-[#D10024] text-[10px] font-bold uppercase px-2 py-1 rounded-sm tracking-wider">-20%</span>
            </div>

            {/* Image Area */}
            <div className="h-56 p-4 flex items-center justify-center relative overflow-hidden group">
                {image ? (
                    <img src={image} alt={displayTitle} className="max-w-full max-h-full object-contain transform group-hover:scale-110 transition-transform duration-500" />
                ) : (
                    <div className="bg-gray-100 w-full h-full flex items-center justify-center text-gray-400 text-sm transform group-hover:scale-110 transition-transform duration-500">
                        Product Image
                    </div>
                )}

                {/* Quick actions overlay */}
                <div className="absolute bottom-4 left-0 right-0 flex justify-center opacity-0 group-hover:opacity-100 transition-all transform translate-y-4 group-hover:translate-y-0">
                    <button className="bg-white text-[#15161D] w-10 h-10 rounded-full shadow-md flex items-center justify-center hover:bg-[#D10024] hover:text-white mx-1 transition border border-gray-100">👁</button>
                    <button className="bg-white text-[#15161D] w-10 h-10 rounded-full shadow-md flex items-center justify-center hover:bg-[#D10024] hover:text-white mx-1 transition border border-gray-100">🤍</button>
                    <button className="bg-white text-[#15161D] w-10 h-10 rounded-full shadow-md flex items-center justify-center hover:bg-[#D10024] hover:text-white mx-1 transition border border-gray-100">🔄</button>
                </div>
            </div>

            {/* Details */}
            <div className="text-center p-4 pt-0 flex-grow flex flex-col">
                <p className="text-[11px] text-gray-400 uppercase tracking-widest mb-1 font-semibold">{category}</p>
                <h3 className="font-bold text-[#15161D] hover:text-[#D10024] cursor-pointer transition-colors mb-2 text-[15px] line-clamp-2 flex-grow">
                    {displayTitle}
                </h3>

                <div className="mt-auto">
                    <h4 className="text-[#D10024] font-bold text-xl mb-4">
                        ${displayPrice} <span className="text-xs text-gray-400 line-through ml-2 font-normal">${oldPrice}</span>
                    </h4>

                    {/* Add to cart Button */}
                    <button className="w-full bg-[#15161D] text-white font-bold py-3 uppercase text-[13px] tracking-wider hover:bg-[#D10024] transition-colors rounded-full flex justify-center items-center gap-2 group-hover:bg-[#D10024]">
                        <span className="text-lg leading-none">🛒</span> Add to Cart
                    </button>
                </div>
            </div>
        </div>
    );
}
