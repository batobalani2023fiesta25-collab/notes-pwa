import { Link } from '@inertiajs/react';
import type { AuthLayoutProps } from '@/types';

export default function AuthSimpleLayout({ children, title, description }: AuthLayoutProps) {
    return (
        <div
            className="min-h-screen flex flex-col items-center justify-center px-4 py-12"
            style={{ backgroundColor: '#f9fafb', fontFamily: "ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif" }}
        >
            {/* Brand */}
            <Link href="/" className="flex items-center gap-3 mb-8 no-underline">
                <div
                    className="flex items-center justify-center rounded-lg"
                    style={{
                        width: 40, height: 40,
                        background: 'linear-gradient(135deg, #3b82f6, #2563eb)',
                    }}
                >
                    <svg className="w-6 h-6" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <span style={{ fontSize: '1.5rem', fontWeight: 700, color: '#111827' }}>Notes App</span>
            </Link>

            {/* Card */}
            <div style={{
                width: '100%',
                maxWidth: 448,
                backgroundColor: '#ffffff',
                borderRadius: '0.5rem',
                boxShadow: '0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)',
                border: '1px solid #e5e7eb',
                overflow: 'hidden',
            }}>
                {/* Blue accent top bar */}
                <div style={{ height: 8, background: 'linear-gradient(to right, #3b82f6, #2563eb)' }} />

                <div style={{ padding: '2rem' }}>
                    {/* Heading */}
                    <div style={{ marginBottom: '1.5rem', textAlign: 'center' }}>
                        <h1 style={{ fontSize: '1.5rem', fontWeight: 700, color: '#111827', margin: 0 }}>
                            {title}
                        </h1>
                        <p style={{ fontSize: '0.875rem', color: '#6b7280', marginTop: '0.25rem' }}>
                            {description}
                        </p>
                    </div>

                    {children}
                </div>
            </div>

            {/* Footer note */}
            <p style={{ marginTop: '1.5rem', fontSize: '0.75rem', color: '#9ca3af' }}>
                &copy; {new Date().getFullYear()} Notes App &mdash; Built with Laravel &amp; Tailwind CSS
            </p>
        </div>
    );
}
