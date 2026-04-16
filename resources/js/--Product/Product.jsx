import React from 'react';
import { Head } from '@inertiajs/react';

export default function Product({ userCount }) {
    return (
        <div className="p-6">
            <Head title="Welcome to Laravel" />
            <h1 className="text-2xl font-bold">Hello from React!</h1>
            <p className="mt-4">
                This is a demo JSX file running inside a Laravel application.
            </p>
            <div className="mt-2 text-gray-600">
                Total registered users: {userCount}
            </div>
        </div>
    );
}
