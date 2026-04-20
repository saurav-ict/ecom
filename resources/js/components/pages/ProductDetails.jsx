import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import { api } from '../services/api';

export default function ProductDetails() {
    const { id } = useParams();
    const [product, setProduct] = useState(null);

    useEffect(() => {
        api.get(`/api/products/${id}`)
            .then(res => setProduct(res.data))
            .catch(err => console.error(err));
    }, [id]);

    if (!product) return <p>Loading...</p>;

    return (
        <div>
            <h2>{product.name}</h2>
            <p>Price: ₹ {product.price}</p>
            <p>{product.description}</p>
        </div>
    );
}