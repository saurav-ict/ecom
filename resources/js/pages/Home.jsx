import Topbar from "../components/Topbar";
import Header from "../components/Header";
import Sidebar from "../components/Sidebar";
import Hero from "../components/Hero";
import ProductCard from "../components/ProductCard";
import Footer from "../components/Footer";
import { useEffect, useState } from "react";
import { api } from "../services/api";

export default function Home() {
    const [products, setProducts] = useState([]);

    useEffect(() => {
        // Safe API check, fallback to dummy products
        if (api && api.get) {
            api.get('/api/products')
                .then(res => {
                    if (res.data && res.data.data) {
                        setProducts(res.data.data);
                    } else {
                        loadFallbacks();
                    }
                })
                .catch(() => loadFallbacks());
        } else {
            loadFallbacks();
        }
    }, []);

    const loadFallbacks = () => {
        setProducts([
            { id: 1, name: 'MacBook Pro 16" M2 Max', price: '2499.00', category: { name: 'Laptops' } },
            { id: 2, name: 'Samsung Galaxy S23 Ultra', price: '1199.00', category: { name: 'Smartphones' } },
            { id: 3, name: 'Sony Alpha a7 IV Mirrorless Camera', price: '2498.00', category: { name: 'Cameras' } },
            { id: 4, name: 'Sony WH-1000XM5 Headphones', price: '398.00', category: { name: 'Accessories' } },
        ]);
    };

    return (
        <div className="bg-[#F5F5F5] min-h-screen font-sans">
            <Topbar />
            <Header />

            <div className="container mx-auto mt-8 px-4">
                <div className="flex flex-col lg:flex-row gap-8">
                    {/* Sidebar Area */}
                    <div className="w-full lg:w-[22%]">
                        <Sidebar />
                    </div>

                    {/* Main Content Area */}
                    <div className="w-full lg:w-[78%] flex flex-col gap-8">
                        <Hero />
                    </div>
                </div>

                <div className="mt-16">
                    {/* Section Header */}
                    <div className="flex flex-col md:flex-row justify-between items-center mb-8 border-b-2 border-gray-200 pb-2 relative">
                        <h3 className="text-2xl font-bold uppercase text-[#15161D] mb-4 md:mb-0">
                            New Products
                        </h3>
                        <div className="absolute bottom-[-2px] left-0 w-32 h-[2px] bg-[#D10024]"></div>
                        
                        {/* Tab filters common in Electro */}
                        <div className="flex space-x-6 text-sm font-bold uppercase text-gray-400">
                            <span className="text-[#D10024] cursor-pointer">Laptops</span>
                            <span className="hover:text-[#D10024] cursor-pointer transition">Smartphones</span>
                            <span className="hover:text-[#D10024] cursor-pointer transition">Cameras</span>
                            <span className="hover:text-[#D10024] cursor-pointer transition">Accessories</span>
                        </div>
                    </div>

                    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        {products.map(product => (
                            <ProductCard key={product.id} product={product} />
                        ))}
                    </div>
                </div>
            </div>
            
            <Footer />
        </div>
    );
}