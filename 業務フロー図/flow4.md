```uml
@startuml

opt 疑問が解決できなかった場合

ユーザー -> メールサーバー : お問合せメール発送
メールサーバー -> 管理者 : メール確認
管理者 --> ユーザー : メール返信
opt 同じ質問が多い場合
管理者 -> webサーバー : Q＆A追加処理
end

end
@enduml
```
