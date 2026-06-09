import { Form, Head } from '@inertiajs/react';
import AuthLayout from '@/layouts/auth-layout';
import { register } from '@/routes';
import { store } from '@/routes/login';
import { request } from '@/routes/password';

type Props = {
    status?: string;
    canResetPassword: boolean;
    canRegister: boolean;
};

const inputBase =
    'w-full px-4 py-3 border rounded-lg text-sm outline-none transition';
const inputNormal = `${inputBase} border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent`;
const inputError  = `${inputBase} border-red-400 bg-red-50 focus:ring-2 focus:ring-red-400 focus:border-transparent`;

export default function Login({ status, canResetPassword, canRegister }: Props) {
    return (
        <AuthLayout
            title="Welcome back"
            description="Log in to your Notes App account"
        >
            <Head title="Log in" />

            {status && (
                <div style={{
                    marginBottom: '1rem',
                    padding: '0.75rem 1rem',
                    backgroundColor: '#f0fdf4',
                    border: '1px solid #86efac',
                    borderRadius: '0.5rem',
                    fontSize: '0.875rem',
                    color: '#166534',
                    textAlign: 'center',
                }}>
                    {status}
                </div>
            )}

            <Form
                {...store.form()}
                resetOnSuccess={['password']}
                style={{ display: 'flex', flexDirection: 'column', gap: '1.25rem' }}
            >
                {({ processing, errors }) => (
                    <>
                        {/* Email */}
                        <div>
                            <label
                                htmlFor="email"
                                style={{ display: 'block', fontSize: '0.875rem', fontWeight: 500, color: '#374151', marginBottom: '0.25rem' }}
                            >
                                Email address <span style={{ color: '#ef4444' }}>*</span>
                            </label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                required
                                autoFocus
                                autoComplete="email"
                                placeholder="email@example.com"
                                className={errors.email ? inputError : inputNormal}
                            />
                            {errors.email && (
                                <p style={{ marginTop: '0.375rem', fontSize: '0.75rem', color: '#dc2626', display: 'flex', alignItems: 'center', gap: '0.25rem' }}>
                                    <svg style={{ width: '0.875rem', height: '0.875rem', flexShrink: 0 }} fill="currentColor" viewBox="0 0 20 20">
                                        <path fillRule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clipRule="evenodd" />
                                    </svg>
                                    {errors.email}
                                </p>
                            )}
                        </div>

                        {/* Password */}
                        <div>
                            <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', marginBottom: '0.25rem' }}>
                                <label
                                    htmlFor="password"
                                    style={{ fontSize: '0.875rem', fontWeight: 500, color: '#374151' }}
                                >
                                    Password <span style={{ color: '#ef4444' }}>*</span>
                                </label>
                                {canResetPassword && (
                                    <a
                                        href={request()}
                                        style={{ fontSize: '0.75rem', color: '#2563eb', textDecoration: 'none', fontWeight: 500 }}
                                        onMouseOver={e => (e.currentTarget.style.color = '#1d4ed8')}
                                        onMouseOut={e => (e.currentTarget.style.color = '#2563eb')}
                                    >
                                        Forgot password?
                                    </a>
                                )}
                            </div>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autoComplete="current-password"
                                placeholder="Password"
                                className={errors.password ? inputError : inputNormal}
                            />
                            {errors.password && (
                                <p style={{ marginTop: '0.375rem', fontSize: '0.75rem', color: '#dc2626', display: 'flex', alignItems: 'center', gap: '0.25rem' }}>
                                    <svg style={{ width: '0.875rem', height: '0.875rem', flexShrink: 0 }} fill="currentColor" viewBox="0 0 20 20">
                                        <path fillRule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clipRule="evenodd" />
                                    </svg>
                                    {errors.password}
                                </p>
                            )}
                        </div>

                        {/* Remember me */}
                        <div style={{ display: 'flex', alignItems: 'center', gap: '0.5rem' }}>
                            <input
                                id="remember"
                                type="checkbox"
                                name="remember"
                                style={{ width: '1rem', height: '1rem', borderRadius: '0.25rem', borderColor: '#d1d5db', accentColor: '#2563eb' }}
                            />
                            <label htmlFor="remember" style={{ fontSize: '0.875rem', color: '#6b7280' }}>
                                Remember me
                            </label>
                        </div>

                        {/* Submit */}
                        <button
                            type="submit"
                            disabled={processing}
                            style={{
                                width: '100%',
                                padding: '0.75rem 1.5rem',
                                backgroundColor: processing ? '#93c5fd' : '#2563eb',
                                color: '#ffffff',
                                fontWeight: 500,
                                borderRadius: '0.5rem',
                                border: 'none',
                                fontSize: '0.875rem',
                                cursor: processing ? 'not-allowed' : 'pointer',
                                transition: 'background-color 150ms',
                            }}
                            onMouseOver={e => { if (!processing) e.currentTarget.style.backgroundColor = '#1d4ed8'; }}
                            onMouseOut={e => { if (!processing) e.currentTarget.style.backgroundColor = '#2563eb'; }}
                        >
                            {processing ? 'Logging in…' : 'Log in'}
                        </button>

                        {/* Sign-up link */}
                        {canRegister && (
                            <p style={{ textAlign: 'center', fontSize: '0.875rem', color: '#6b7280', margin: 0 }}>
                                Don't have an account?{' '}
                                <a
                                    href={register()}
                                    style={{ color: '#2563eb', fontWeight: 500, textDecoration: 'none' }}
                                    onMouseOver={e => (e.currentTarget.style.color = '#1d4ed8')}
                                    onMouseOut={e => (e.currentTarget.style.color = '#2563eb')}
                                >
                                    Sign up
                                </a>
                            </p>
                        )}
                    </>
                )}
            </Form>
        </AuthLayout>
    );
}
