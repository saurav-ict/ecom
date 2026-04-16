import React from 'react';
import { Routes, Route, Link } from 'react-router-dom';
import Products from './pages/Products';

function Home() {
    return (
        <>
            <section className="bg-blue-600 text-white py-20 text-center">
                <h1 className="text-5xl font-bold mb-4">Welcome to MyShop</h1>
                <p className="text-xl mb-8 text-blue-100">Discover amazing products at great prices</p>
                <Link to="/products" className="bg-white text-blue-600 font-semibold px-8 py-3 rounded-full hover:bg-blue-50 transition">
                    Shop Now
                </Link>
            </section>
            <section className="max-w-6xl mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div className="bg-white rounded-xl shadow p-8">
                    <div className="text-4xl mb-4">🚚</div>
                    <h3 className="text-xl font-semibold mb-2">Free Shipping</h3>
                    <p className="text-gray-500">On all orders over $50</p>
                </div>
                <div className="bg-white rounded-xl shadow p-8">
                    <div className="text-4xl mb-4">🔒</div>
                    <h3 className="text-xl font-semibold mb-2">Secure Payment</h3>
                    <p className="text-gray-500">100% secure transactions</p>
                </div>
                <div className="bg-white rounded-xl shadow p-8">
                    <div className="text-4xl mb-4">↩️</div>
                    <h3 className="text-xl font-semibold mb-2">Easy Returns</h3>
                    <p className="text-gray-500">30-day return policy</p>
                </div>
            </section>
        </>
    );
}

export default function App() {
    return (
        <div className="min-h-screen bg-gray-50">
            <nav className="bg-white shadow">
                <div className="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
                    <Link to="/" className="text-2xl font-bold text-blue-600">MyShop</Link>
                    <div className="flex gap-6 text-gray-600">
                        <Link to="/" className="hover:text-blue-600">Home</Link>
                        <Link to="/products" className="hover:text-blue-600">Products</Link>
                    </div>
                </div>
            </nav>
            <main>
                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/products" element={<Products />} />
                </Routes>
            </main>
            <footer className="bg-white border-t text-center py-6 text-gray-400 text-sm">
                © {new Date().getFullYear()} MyShop. All rights reserved.
            </footer>
        </div>
    );
}
