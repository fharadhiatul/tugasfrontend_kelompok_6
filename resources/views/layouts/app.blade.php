<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gramedia Store System')</title>
    <style>
        :root {
            --navy: #0f172a;
            --brand: #005eb8;
            --brand-dark: #004488;
            --accent: #0ea5e9;
            --bg-page: #f4f6f9;
            --surface: #ffffff;
            --border: #e2e8f0;
            --text-main: #1e293b;
            --text-muted: #64748b;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }
        body { background-color: var(--bg-page); color: var(--text-main); font-size: 14px; }
        a { text-decoration: none; color: inherit; }

        /* Topbar */
        .topbar {
            background: var(--navy);
            color: #ffffff;
            height: 62px;
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 2px 10px rgba(15, 23, 42, 0.15);
        }
        .brand-box { display: flex; align-items: center; gap: 12px; }
        .brand-logo {
            width: 36px; height: 36px; border-radius: 8px;
            background: linear-gradient(135deg, #0072ce, #00a8e8);
            display: flex; align-items: center; justify-content: center;
            font-weight: 900; font-size: 18px; letter-spacing: -0.5px; color: #fff;
        }
        .brand-title { font-weight: 700; font-size: 15px; letter-spacing: 0.4px; }
        .brand-sub { font-size: 11px; color: #94a3b8; }
        .user-pill {
            display: flex; align-items: center; gap: 10px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.14);
            padding: 6px 14px; border-radius: 99px; font-size: 12px; font-weight: 600;
        }
        .dot-online { width: 8px; height: 8px; border-radius: 50%; background: #22c55e; }

        /* Workspace Layout */
        .workspace { display: flex; min-height: calc(100vh - 62px); }
        .sidebar {
            width: 240px; background: var(--surface);
            border-right: 1px solid var(--border);
            padding: 22px 14px; flex-shrink: 0;
        }
        .menu-label {
            font-size: 11px; font-weight: 700; color: #94a3b8;
            text-transform: uppercase; letter-spacing: 0.8px;
            padding: 0 12px 10px;
        }
        .nav-list { display: flex; flex-direction: column; gap: 4px; }
        .nav-item {
            padding: 10px 14px; border-radius: 8px;
            font-weight: 500; color: #475569; transition: all 0.18s ease;
            display: flex; align-items: center; justify-content: space-between;
        }
        .nav-item:hover { background: #f1f5f9; color: var(--navy); }
        .nav-item.active {
            background: #eff6ff; color: var(--brand);
            font-weight: 700; border-left: 3px solid var(--brand);
        }

        /* Main Content */
        .content-area { flex: 1; padding: 28px 32px; max-width: 1180px; margin: 0 auto; width: 100%; }
        .page-head { margin-bottom: 22px; }
        .tag-us {
            display: inline-block; font-size: 11px; font-weight: 700;
            color: var(--brand); background: #e0f2fe;
            padding: 3px 10px; border-radius: 4px; margin-bottom: 6px;
        }
        .page-head h1 { font-size: 24px; font-weight: 800; color: var(--navy); }
        .page-head p { color: var(--text-muted); font-size: 13px; margin-top: 3px; }

        /* Search Bar Card */
        .search-card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: 12px; padding: 18px 20px; margin-bottom: 22px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        }
        .search-grid { display: grid; grid-template-columns: 2.2fr 1.2fr 0.8fr; gap: 14px; align-items: end; }
        .field-label { display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 6px; }
        .input-ctrl {
            width: 100%; height: 40px; padding: 0 14px;
            border: 1px solid #cbd5e1; border-radius: 8px;
            font-size: 13.5px; color: var(--navy); background: #f8fafc; transition: 0.2s;
        }
        .input-ctrl:focus { outline: none; border-color: var(--brand); background: #fff; box-shadow: 0 0 0 3px rgba(0,94,184,0.12); }
        .btn-search {
            width: 100%; height: 40px; background: var(--brand); color: #fff;
            border: none; border-radius: 8px; font-weight: 600; font-size: 13.5px;
            cursor: pointer; transition: 0.2s;
        }
        .btn-search:hover { background: var(--brand-dark); }

        /* Split Panels */
        .split-grid { display: grid; grid-template-columns: 1.35fr 1fr; gap: 22px; align-items: start; }
        .panel {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: 12px; padding: 22px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        }
        .panel-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px; }
        .panel-title { font-size: 15.5px; font-weight: 700; color: var(--navy); }
        .count-badge { background: #f1f5f9; color: #334155; font-size: 12px; font-weight: 700; padding: 3px 10px; border-radius: 99px; }
        .panel-sub { font-size: 12px; color: var(--text-muted); margin-bottom: 16px; }

        /* Book Items */
        .item-list { display: flex; flex-direction: column; gap: 10px; }
        .book-item {
            padding: 14px 16px; border: 1px solid var(--border);
            border-radius: 10px; background: #ffffff; cursor: pointer;
            display: flex; justify-content: space-between; align-items: center;
            transition: all 0.15s ease;
        }
        .book-item:hover { border-color: #93c5fd; background: #f8fafc; transform: translateY(-1px); }
        .book-item.selected {
            border: 1.5px solid var(--brand); background: #f0f7ff;
            box-shadow: 0 3px 8px rgba(0, 94, 184, 0.08);
        }
        .book-name { font-weight: 700; font-size: 14.5px; color: var(--navy); }
        .book-meta { font-size: 12px; color: var(--text-muted); margin-top: 3px; }
        .code-tag { font-family: Consolas, monospace; background: #e2e8f0; color: #334155; padding: 1px 6px; border-radius: 4px; font-size: 11.5px; }
        
        .badge-ready { background: #dcfce7; color: #15803d; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 6px; }
        .badge-empty { background: #fee2e2; color: #b91c1c; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 6px; }

        /* Detail Right Panel */
        .detail-divider { border-bottom: 1px solid var(--border); padding-bottom: 12px; margin-bottom: 16px; display: flex; justify-content: space-between; align-items: center; }
        .detail-title { font-size: 18px; font-weight: 800; color: var(--navy); margin-bottom: 14px; line-height: 1.35; }
        .price-banner {
            background: linear-gradient(120deg, #0f172a, #1e3a8a);
            color: #ffffff; padding: 18px; border-radius: 10px; margin-bottom: 14px;
        }
        .price-label { font-size: 11.5px; color: #cbd5e1; margin-bottom: 4px; }
        .price-val { font-size: 26px; font-weight: 800; letter-spacing: -0.5px; }
        .stat-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px; }
        .stat-box { background: #f8fafc; border: 1px solid var(--border); padding: 12px 14px; border-radius: 8px; }
        .stat-lbl { font-size: 11.5px; color: var(--text-muted); margin-bottom: 3px; }
        .stat-num { font-size: 16px; font-weight: 800; color: var(--navy); }
        .text-green { color: #16a34a; }
        .text-red { color: #dc2626; }
        .loc-box {
            background: #fefce8; border: 1px solid #fde047;
            color: #854d0e; padding: 11px 14px; border-radius: 8px;
            font-size: 12.5px; font-weight: 700;
        }
        .note-foot { font-size: 11.5px; color: #94a3b8; margin-top: 14px; }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
