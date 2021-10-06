```uml
@startuml

skinparam class {
    '図の背景
    BackgroundColor Snow
    '図の枠
    BorderColor Black
    'リレーションの色
    ArrowColor Black
}

!define MASTER_MARK_COLOR Orange 
!define TRANSACTION_MARK_COLOR DeepSkyBlue

package "AnyPort" as target_system {
    /'
      マスターテーブルを M、トランザクションを T などで表記
      １文字なら "主" とか "従" まど日本語でも記載可能
     '/
    
    
    entity "ユーザーマスタ" as users  <m_users> <<M,MASTER_MARK_COLOR>> {
        + user_id[PK]
        --
        user_name
        user_name_kana
        user_image
        user_mail
        user_postal_code
        user_address
        user_pass
        reg_date
        upd_date
        del_date
    }
    
    entity "商品カテゴリIDマスタ" as iCategoryId <m_iCategory> <<M,MASTER_MARK_COLOR>> {
        + iCategory_id [PK]
        --
        iCategory_name
        reg_date
        upd_date
        del_date
    }
    
    entity "店マスタ" as shop <m_shop> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK]
        --
        shop_name
        shop_postal_code
        shop_address
        shop_explanation
        shop_image
        credit_flag
        reg_date
        upd_date
        del_date
    }
    
    
    entity "店商品マスタ" as shopItems <m_shopItems> <<M,MASTER_MARK_COLOR>> {
        + shop_id [PK][FK]
        + item_id [PK]
        --
        item_name
        # iCategory_id [FK]
        item_image1
        item_image2
        item_image3
        item_image4
        item_image5
        item_explanation
        item_price
        reg_date
        upd_date
        del_date
    }
        
    entity "検索履歴テーブル" as searchHistory <t_searchHistory> <<T,TRANSACTION_MARK_COLOR>> {
        + user_id [PK][FK]
        + searchHistory_id [PK]
        --
        searchWord
        reg_date
        upd_date
        del_date
    }
    

  }

shopItems             }o-le-o|   shop
shopItems             }o-do-o|   iCategoryId  
searchHistory         }o-le-o|   users


@enduml
```
