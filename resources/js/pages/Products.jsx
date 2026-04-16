import React, { useEffect, useState } from "react";
import axios from "axios";

export default function Products() {
    const [products, setProducts] = useState([]);
    const [links, setLinks] = useState([]);
    const [loading, setLoading] = useState(true);
    const fetchProducts = async (url = "/api/products") => {
        setLoading(true);

        try {
            const res = await axios.get(url);

            const apiData = res.data.data;

            setProducts(apiData.data); // products
            setLinks(apiData.links); // pagination links
        } catch (error) {
            console.error(error);
        } finally {
            setLoading(false);
        }
    };
    useEffect(() => {
        fetchProducts();
    }, []);

    if (loading) return <div className="text-center py-20">Loading...</div>;

    return (
        <div className="max-w-6xl mx-auto px-4 py-8">
            <h1 className="text-3xl font-bold mb-8">Products</h1>
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                {products.map((product) => (
                    <div
                        key={product.id}
                        className="bg-white rounded-xl shadow p-4"
                    >
                        <div className="h-40 bg-gray-100 rounded mb-3 flex items-center justify-center text-gray-400">
                            {product.image ? (
                                <img
                                    src={product.image}
                                    alt={product.name}
                                    className="h-full w-full object-cover rounded"
                                />
                            ) : (
                                "📦"
                            )}
                        </div>
                        <h3 className="font-semibold truncate">
                            {product.name}
                        </h3>
                        <p className="text-green-600 font-bold mt-1">
                            ${parseFloat(product.price).toFixed(2)}
                        </p>
                    </div>
                ))}
                <div className="pagination">
                    {links.map((link, index) => (
                        <button
                            key={index}
                            disabled={!link.url}
                            onClick={() => link.url && fetchProducts(link.url)}
                            dangerouslySetInnerHTML={{ __html: link.label }}
                            style={{
                                margin: "5px",
                                fontWeight: link.active ? "bold" : "normal",
                            }}
                        />
                    ))}
                </div>
            </div>
        </div>
    );
}
