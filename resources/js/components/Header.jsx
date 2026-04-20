import { Link } from "react-router-dom";

export default function Header() {
    return (
        <header className="bg-white shadow">
            <div className="container mx-auto px-6 py-4 flex justify-between items-center">

                <h1 className="text-2xl font-bold text-blue-600">
                    MyStore
                </h1>

                <input
                    type="text"
                    placeholder="Search products..."
                    className="border px-4 py-2 w-1/2 rounded"
                />

                <div className="space-x-4">
                    <Link to="/" className="text-gray-700">Home</Link>
                    <button className="bg-blue-600 text-white px-4 py-2 rounded">
                        Cart 🛒
                    </button>
                </div>
            </div>
        </header>
    );
}