import React, { useEffect, useState } from 'react';
import { api } from "./services/api";
import ProductCard from "../ProductCard";

export default function Home() {
    const [products, setProducts] = useState([]);
    const [categories, setCategories] = useState([]);

    useEffect(() => {
        api.get('/api/products')
            .then(res => setProducts(res.data.data))
            .catch(err => console.error(err));

        api.get('/api/categories')
            .then(res => setCategories(res.data.data))
            .catch(err => console.error(err));
    }, []);

    return (
        <div className="bg-gray-100 min-h-screen">

            {/* HERO SECTION */}
            <div className="bg-blue-600 text-white py-16 text-center">
                <h1 className="text-4xl font-bold mb-4">
                    Welcome to MyStore 🛒
                </h1>
                <p className="text-lg">
                    Best products at unbeatable prices
                </p>
            </div>

            {/* CATEGORIES */}
            <div className="container mx-auto p-6">
                <h2 className="text-2xl font-bold mb-4">Shop by Categories</h2>

                <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                    {categories.slice(0, 8).map(cat => (
                        <div
                            key={cat.id}
                            className="bg-white p-4 rounded shadow hover:shadow-md cursor-pointer text-center"
                        >
                            <h3 className="font-semibold">{cat.name}</h3>
                        </div>
                    ))}
                </div>
            </div>

            {/* FEATURED PRODUCTS */}
            <div className="container mx-auto p-6">
                <h2 className="text-2xl font-bold mb-4">Featured Products</h2>

                <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    {products.slice(0, 8).map(product => (
                        <ProductCard key={product.id} product={product} />
                    ))}
                </div>
            </div>

        </div>
    );
}