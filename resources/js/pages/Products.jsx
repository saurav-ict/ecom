import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import api from "../services/api";
import { useCart } from "../context/CartContext";

export default function Products() {
    const [products, setProducts] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [searchQuery, setSearchQuery] = useState("");
    const [addedToCart, setAddedToCart] = useState({});
    const { addToCart } = useCart();

    useEffect(() => {
        fetchProducts();
    }, []);

    const fetchProducts = async () => {
        try {
            setLoading(true);
            const res = await api.get("/products");
            setProducts(res.data.data || res.data);
        } catch (err) {
            setError("Failed to load products. Please try again.");
        } finally {
            setLoading(false);
        }
    };

    const handleAddToCart = (product) => {
        addToCart(product);
        setAddedToCart({ ...addedToCart, [product.id]: true });
        setTimeout(() => {
            setAddedToCart((prev) => ({ ...prev, [product.id]: false }));
        }, 2000);
    };

    const filteredProducts = products.filter((p) =>
        p.name.toLowerCase().includes(searchQuery.toLowerCase())
    );

    if (loading) {
        return (
            <div className="container mx-auto px-4 py-16 text-center">
                <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div>
                <p className="mt-4 text-gray-600">Loading products...</p>
            </div>
        );
    }

    if (error) {
        return (
            <div className="container mx-auto px-4 py-16 text-center">
                <p className="text-red-600 mb-4">{error}</p>
                <button
                    onClick={fetchProducts}
                    className="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700"
                >
                    Retry
                </button>
            </div>
        );
    }

    return (
        <div className="container mx-auto px-4 py-8">
            {/* Header & Search */}
            <div className="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <h1 className="text-3xl font-bold">Our Products</h1>
                <div className="relative w-full md:w-96">
                    <input
                        type="text"
                        placeholder="Search products..."
                        value={searchQuery}
                        onChange={(e) => setSearchQuery(e.target.value)}
                        className="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                    <svg
                        className="absolute left-3 top-2.5 w-5 h-5 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth={2}
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                    </svg>
                </div>
            </div>

            {/* Results count */}
            <p className="text-gray-600 mb-4">
                Showing {filteredProducts.length} of {products.length} products
            </p>

            {/* Product Grid */}
            {filteredProducts.length === 0 ? (
                <div className="text-center py-16">
                    <p className="text-gray-500 text-lg">No products found matching "{searchQuery}"</p>
                </div>
            ) : (
                <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    {filteredProducts.map((product) => (
                        <div
                            key={product.id}
                            className="bg-white border rounded-lg overflow-hidden shadow hover:shadow-lg transition group"
                        >
                            {/* Image */}
                            <div className="relative h-48 bg-gray-100">
                                {product.image ? (
                                    <img
                                        src={product.image}
                                        alt={product.name}
                                        className="w-full h-full object-cover group-hover:scale-105 transition"
                                    />
                                ) : (
                                    <div className="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg className="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1} d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                )}
                                {product.stock <= 0 && (
                                    <div className="absolute inset-0 bg-black/50 flex items-center justify-center">
                                        <span className="bg-red-500 text-white px-3 py-1 rounded font-semibold">
                                            Out of Stock
                                        </span>
                                    </div>
                                )}
                            </div>

                            {/* Content */}
                            <div className="p-4">
                                <h3 className="text-lg font-semibold mb-1 truncate">{product.name}</h3>
                                <p className="text-gray-500 text-sm mb-2 line-clamp-2 h-10">
                                    {product.description || "No description available"}
                                </p>

                                {/* Price & Stock */}
                                <div className="flex justify-between items-center mb-3">
                                    <p className="text-xl font-bold text-green-600">
                                        ${parseFloat(product.price).toFixed(2)}
                                    </p>
                                    {product.stock > 0 && (
                                        <span className="text-xs text-gray-500">
                                            {product.stock} in stock
                                        </span>
                                    )}
                                </div>

                                {/* Actions */}
                                <div className="flex gap-2">
                                    <Link
                                        to={`/product/${product.id}`}
                                        className="flex-1 text-center py-2 border border-gray-300 rounded hover:bg-gray-50 transition"
                                    >
                                        View
                                    </Link>
                                    <button
                                        onClick={() => handleAddToCart(product)}
                                        disabled={product.stock <= 0 || addedToCart[product.id]}
                                        className={`flex-1 py-2 rounded transition ${
                                            addedToCart[product.id]
                                                ? "bg-green-600 text-white"
                                                : product.stock <= 0
                                                ? "bg-gray-300 cursor-not-allowed"
                                                : "bg-blue-600 hover:bg-blue-700 text-white"
                                        }`}
                                    >
                                        {addedToCart[product.id]
                                            ? "Added!"
                                            : product.stock <= 0
                                            ? "Out of Stock"
                                            : "Add to Cart"}
                                    </button>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            )}
        </div>
    );
}