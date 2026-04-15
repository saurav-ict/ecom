import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import api from "../services/api";

export default function Products() {
    const [products, setProducts] = useState([]);

    useEffect(() => {
        api.get("/products").then((res) => {
            setProducts(res.data.data);
        });
    }, []);

    return (
        <div>
            <h1>Products</h1>

            {products.map((product) => (
                <div key={product.id}>
                    <h3>{product.name}</h3>
                    <p>${product.price}</p>

                    <Link to={`/product/${product.id}`}>
                        View Details
                    </Link>
                </div>
            ))}
        </div>
    );
}