<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FamilyPalette | 家族のパレット</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=Noto+Serif+JP:wght@700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/layouts/common.css') }}">

    @stack('styles')
</head>

<body>
    <header class="app-header">
        <div class="header-logo">
            <h1>FamilyPalette <span>ファミリーパレット</span></h1>
        </div>
        <nav class="header-nav">
            <a href="#" class="nav-item">
                <small>ABOUT</small>
                <span>このアプリについて</span>
            </a>
            <a href="{{ route('login') }}" class="nav-item highlight">
                <small>LOGIN</small>
                <span>ログイン</span>
            </a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>