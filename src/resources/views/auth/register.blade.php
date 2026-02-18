@extends('layouts.common')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endpush

@section('content')
<div class="art-canvas">
    <section class="visual-section">
        <div class="watercolor-overlay">
            <div class="paint paint-top-pink"></div>
            <div class="paint paint-bottom-blue"></div>
            <div class="paint paint-center-yellow"></div>
        </div>

        <div class="text-group">
            <h2 class="main-copy">家族を、<br><span class="accent-stroke">描こう。</span></h2>
            <p class="sub-copy">
                FamilyPaletteは、家族の毎日を彩る<br>
                「一番身近な相棒」です。
            </p>
        </div>
    </section>

    <section class="form-section">
        <div class="palette-input-area">
            {{-- POSTメソッドとルートの設定 --}}
            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                {{-- お名前（ニックネーム） --}}
                <div class="creative-field">
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder=" " autofocus>
                    <label for="name">お名前（ニックネーム）</label>
                    <div class="ink-splash splash-pink"></div>
                    @error('name')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                {{-- メールアドレス --}}
                <div class="creative-field">
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder=" ">
                    <label for="email">メールアドレス</label>
                    <div class="ink-splash splash-blue"></div>
                    @error('email')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                {{-- 秘密のパスワード --}}
                <div class="creative-field">
                    <input type="password" name="password" id="password" required placeholder=" ">
                    <label for="password">秘密のパスワード</label>
                    <div class="ink-splash splash-yellow"></div>
                    @error('password')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                {{-- パスワード確認（バリデーションルール 'confirmed' のために必須） --}}
                <div class="creative-field">
                    <input type="password" name="password_confirmation" id="password_confirmation" required placeholder=" ">
                    <label for="password_confirmation">パスワード（確認用）</label>
                    <div class="ink-splash splash-pink"></div>
                </div>

                <button type="submit" class="finish-button">
                    <span>このパレットで始める</span>
                </button>
            </form>

            <div class="login-link">
                <a href="{{ route('login') }}">すでに登録済みの方はこちら</a>
            </div>
        </div>
    </section>
</div>
@endsection