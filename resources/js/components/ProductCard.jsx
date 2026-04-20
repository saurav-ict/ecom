import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";

export default function ProductCard({ product }) {
    return (
        <div className="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">

            <div className="relative">
                <img
                    src={product.image ? (product.image.startsWith('http') ? product.image : '/storage/' + product.image) : "https://via.placeholder.com/300"}
                    className="w-full h-48 object-cover"
                />

                <span className="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded">
                    SALE
                </span>
            </div>

            <div className="p-4">
                <h3 className="font-semibold text-lg">
                    {product.name}
                </h3>

                <div className="flex items-center gap-2 mt-2">
                    <span className="text-red-600 font-bold">
                        ₹{product.price}
                    </span>
                    <span className="line-through text-gray-400 text-sm">
                        ₹{product.price + 20}
                    </span>
                </div>

                <Link
                    to={`/products/${product.id}`}
                    className="block mt-4 bg-black text-white text-center py-2 rounded hover:bg-gray-800"
                >
                    View Product
                </Link>
            </div>
        </div>
    );
}