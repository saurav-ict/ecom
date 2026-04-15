import React from "react";
import { Routes, Route, Link } from "react-router-dom";

import Products from "./pages/Products";
import ProductDetails from "./pages/ProductDetails";
import Cart from "./pages/Cart";

export default function App() {
    return (
        <div style={{ padding: "20px" }}>
            <nav style={{ marginBottom: "20px" }}>
                <Link to="/">Products</Link> |{" "}
                <Link to="/cart">Cart</Link>
            </nav>

            <Routes>
                <Route path="/" element={<Products />} />
                <Route path="/product/:id" element={<ProductDetails />} />
                <Route path="/cart" element={<Cart />} />
            </Routes>
        </div>
    );
}