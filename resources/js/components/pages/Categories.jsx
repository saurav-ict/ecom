import React, { useEffect, useState } from 'react';
import axios from 'axios';

export default function Categories() {
    const [categories, setCategories] = useState([]);

    useEffect(() => {
    axios.get('/api/categories')
      .then(response => {
        setCategories(response.data.data);
      })
      .catch(error => {
        console.error("There was an error fetching the data!", error);
      });
  }, []);
    // useEffect(() => {
    //     axios.get('/api/categories')
    //         .then(res => setCategories(res.data))
    //         .catch(err => console.error(err));
    // }, []);

    return (
        <div>
            <h2>Categories</h2>
            {/* <ul> */}
                {categories.length === 0 ? (
                <p>No categories found</p>
            ) : (
                <ul>
                    {categories.map(cat => (
                        <li key={cat.id}>
                            {cat.name}
                        </li>
                    ))}
                </ul>
            )}
            {/* </ul> */}
        </div>
    );
}