erDiagram
    families ||--o{ users : "1:N (所属)"
    families ||--o{ schedules : "1:N (共有)"
    families ||--o{ todos : "1:N (共有)"
    families ||--o{ photos : "1:N (管理)"
    users ||--o{ schedules : "1:N (作成者)"
    users ||--o{ comments : "1:N (投稿者)"
    schedules ||--o{ comments : "1:N (紐付け)"
    schedules ||--o{ photos : "1:N (紐付け)"
    themes ||--o{ users : "1:N (適用)"

    families {
        bigInt id PK
        string name "家族名"
        string invite_code UK "招待コード"
        timestamp created_at
        timestamp updated_at
    }

    users {
        bigInt id PK
        bigInt family_id FK "所属家族ID"
        string name "表示名"
        string email UK "メール"
        string password "ハッシュ化パスワード"
        string color_code "個人の色"
        string theme_id "選択中のテーマID"
        boolean is_premium "有料フラグ"
        timestamp created_at
        timestamp updated_at
    }

    schedules {
        bigInt id PK
        bigInt family_id FK "家族ID"
        bigInt user_id FK "登録者ID"
        string title "予定名"
        text description "メモ"
        datetime start_at "開始日時"
        datetime end_at "終了日時"
        string icon_type "アイコン種別"
        boolean is_all_day "終日フラグ"
        timestamp created_at
        timestamp updated_at
    }

    comments {
        bigInt id PK
        bigInt schedule_id FK "予定ID"
        bigInt user_id FK "発言者ID"
        text content "発言内容"
        timestamp created_at
        timestamp updated_at
    }

    todos {
        bigInt id PK
        bigInt family_id FK "家族ID"
        string title "項目名"
        boolean is_completed "完了フラグ"
        date due_date "期限"
        timestamp created_at
        timestamp updated_at
    }

    photos {
        bigInt id PK
        bigInt schedule_id FK "予定ID(任意)"
        bigInt family_id FK "家族ID"
        string file_path "画像パス"
        string caption "一言"
        timestamp created_at
        timestamp updated_at
    }

    themes {
        bigInt id PK
        string name "テーマ名"
        string primary_color "メインカラー"
        string background_color "背景色"
        string text_color "文字色"
        string font_family "フォント"
        string image_url "背景画像URL"
        timestamp created_at
        timestamp updated_at
    }