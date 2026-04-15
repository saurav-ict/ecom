import React, { useEffect, useState } from "react";
import api from "./services/api";

export default function App() {
    const [products, setProducts] = useState([]);

    useEffect(() => {
        api.get("/products").then(res => {
            setProducts(res.data.data);
        });
    }, []);

    return (
        <div style={{ padding: "20px" }}>
            <h1>Products</h1>

            {products.map(product => (
                <div key={product.id}>
                    <h3>{product.name}</h3>
                    <p>${product.price}</p>
                </div>
            ))}
        </div>
    );
}