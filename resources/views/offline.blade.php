<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>You're Offline – Notes App</title>
    <meta name="theme-color" content="#0f172a">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f9fafb;
            color: #111827;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }
        .icon-wrap {
            width: 72px; height: 72px;
            border-radius: 1rem;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.5rem;
        }
        .icon-wrap svg { width: 40px; height: 40px; }
        h1 { font-size: 1.875rem; font-weight: 700; margin-bottom: 0.75rem; }
        p  { font-size: 1rem; color: #6b7280; max-width: 380px; text-align: center; line-height: 1.6; }
        .badge {
            margin-top: 1rem;
            display: inline-flex; align-items: center; gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: #fef3c7; border: 1px solid #fcd34d;
            border-radius: 9999px;
            font-size: 0.875rem; color: #92400e; font-weight: 500;
        }
        .btn {
            margin-top: 2rem;
            display: inline-block;
            padding: 0.75rem 2rem;
            background: #2563eb; color: #fff;
            font-size: 0.875rem; font-weight: 500;
            border-radius: 0.5rem; text-decoration: none;
            transition: background 150ms;
        }
        .btn:hover { background: #1d4ed8; }
    </style>
</head>
<body>
    <div class="icon-wrap">
        <svg fill="none" stroke="white" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
        </svg>
    </div>

    <h1>You're Offline</h1>
    <p>It looks like you've lost your internet connection. Check your network and try again.</p>

    <div class="badge">
        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M18.364 5.636a9 9 0 010 12.728M15.536 8.464a5 5 0 010 7.072M12 12h.01"/>
        </svg>
        No internet connection
    </div>

    <a href="/" class="btn" onclick="window.location.reload(); return false;">Try Again</a>
</body>
</html>
