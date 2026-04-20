import { useEffect, useState } from "react";
import { api } from "../services/api";

export default function Sidebar() {
    const [categories, setCategories] = useState([]);

    useEffect(() => {
        // Safe check for api, fallback to dummy data if not available or fails
        if (api && api.get) {
            api.get('/api/categories')
                .then(res => {
                    if (res.data && res.data.data) {
                        setCategories(res.data.data);
                    }
                })
                .catch(() => loadFallbacks());
        } else {
            loadFallbacks();
        }
    }, []);

    const loadFallbacks = () => {
        setCategories([
            { id: 1, name: 'Laptops & Computers' },
            { id: 2, name: 'Smartphones & Tablets' },
            { id: 3, name: 'Cameras & Photography' },
            { id: 4, name: 'Smart Watches' },
            { id: 5, name: 'Accessories' },
            { id: 6, name: 'Gaming Consoles' },
        ]);
    };

    return (
        <div className="w-full lg:w-64 bg-white shadow-sm border border-gray-100 h-fit">
            <h2 className="font-bold text-lg p-4 border-b border-gray-100 uppercase tracking-wider text-[#15161D]">
                Categories
            </h2>

            <div className="flex flex-col py-2">
                {categories.map(cat => (
                    <div
                        key={cat.id}
                        className="px-4 py-3 text-sm font-medium text-gray-600 hover:text-[#D10024] hover:bg-gray-50 cursor-pointer border-l-2 border-transparent hover:border-[#D10024] transition-all"
                    >
                        {cat.name}
                    </div>
                ))}
            </div>
        </div>
    );
}