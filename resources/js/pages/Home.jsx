import React, { useEffect, useState } from "react";
import { api } from "./services/api";
import ProductCard from "../ProductCard";

export default function Home() {
    const [products, setProducts] = useState([]);
    const [categories, setCategories] = useState([]);

    useEffect(() => {
        api.get('/api/products').then(res => setProducts(res.data.data));
        api.get('/api/categories').then(res => setCategories(res.data.data));
    }, []);

    return (
        <div className="bg-gray-50 min-h-screen">

            {/* HERO BANNER */}
            <div className="bg-gradient-to-r from-indigo-600 to-blue-500 text-white">
                <div className="container mx-auto px-6 py-16 flex items-center justify-between">
                    <div>
                        <h1 className="text-4xl font-bold mb-4">
                            Big Deals on Top Products 🔥
                        </h1>
                        <p className="mb-6">
                            Discover the latest trends at unbeatable prices
                        </p>
                        <button className="bg-white text-blue-600 px-6 py-2 rounded font-semibold">
                            Shop Now
                        </button>
                    </div>

                    <img
                        src="https://via.placeholder.com/400x250"
                        className="hidden md:block"
                    />
                </div>
            </div>

            {/* CATEGORIES */}
            <div className="container mx-auto px-6 py-10">
                <h2 className="text-2xl font-bold mb-6">Shop by Category</h2>

                <div className="grid grid-cols-2 md:grid-cols-4 gap-6">
                    {categories.slice(0, 8).map(cat => (
                        <div
                            key={cat.id}
                            className="bg-white rounded-xl shadow hover:shadow-lg transition p-4 text-center cursor-pointer"
                        >
                            <img
                                src="https://via.placeholder.com/100"
                                className="mx-auto mb-3"
                            />
                            <h3 className="font-semibold">{cat.name}</h3>
                        </div>
                    ))}
                </div>
            </div>

            {/* PRODUCTS */}
            <div className="container mx-auto px-6 pb-10">
                <h2 className="text-2xl font-bold mb-6">Featured Products</h2>

                <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    {products.map(product => (
                        <ProductCard key={product.id} product={product} />
                    ))}
                </div>
            </div>

        </div>
    );
}