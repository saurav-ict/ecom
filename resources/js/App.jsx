import React from "react";
import { Routes, Route, Link } from "react-router-dom";
import { CartProvider, useCart } from "./context/CartContext";

import Products from "./pages/Products";
import ProductDetails from "./pages/ProductDetails";
import Cart from "./pages/Cart";

function Header() {
    const { itemCount } = useCart();

    return (
        <header className="bg-white shadow-sm border-b">
            <div className="container mx-auto px-4 py-4 flex justify-between items-center">
                <Link to="/" className="text-2xl font-bold text-blue-600">
                    MyShop
                </Link>

                <nav className="flex items-center gap-6">
                    <Link to="/" className="text-gray-700 hover:text-blue-600">
                        Products
                    </Link>
                    <Link to="/cart" className="relative text-gray-700 hover:text-blue-600">
                        <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        {itemCount > 0 && (
                            <span className="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                                {itemCount}
                            </span>
                        )}
                    </Link>
                </nav>
            </div>
        </header>
    );
}

function AppContent() {
    return (
        <div className="min-h-screen bg-gray-50">
            <Header />
            <main>
                <Routes>
                    <Route path="/" element={<Products />} />
                    <Route path="/product/:id" element={<ProductDetails />} />
                    <Route path="/cart" element={<Cart />} />
                </Routes>
            </main>
        </div>
    );
}

export default function App() {
    return (
        <CartProvider>
            <AppContent />
        </CartProvider>
    );
}