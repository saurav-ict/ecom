import React, { useEffect, useState } from 'react';
import { api } from '../../services/api';
import ProductCard from '../ProductCard';

export default function Products() {
    const [products, setProducts] = useState([]);

    useEffect(() => {
        api.get('/api/products')
            .then(res => setProducts(res.data.data))
            .catch(err => console.error(err));
    }, []);

    return (
        <div>
            <h2>Products</h2>

            <div style={{ display: 'flex', gap: 20, flexWrap: 'wrap' }}>
                {products.map(product => (
                    <ProductCard key={product.id} product={product} />
                ))}
            </div>
        </div>
    );
}