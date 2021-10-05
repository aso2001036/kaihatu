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
    
    entity "国名マスタ" as countries <m_countries> <<M,MASTER_MARK_COLOR>> {
        + country_code [PK]
        --
        country_name
        currency_code
        currency_name
    }
    
    entity "ユーザーマスタ" as users  <m_users> <<M,MASTER_MARK_COLOR>> {
        + user_id[PK]
        --
        user_name
        user_image
        tel
        mail
        # country_code [FK]
        # language_code [FK]
        user_pass
        reg_date
        upd_date
        del_date
    }
    
    entity "カテゴリマスタ" as sCategoryId <m_sCategory> <<M,MASTER_MARK_COLOR>> {
        + sCategory_id [PK]
        --
        sCategory_name
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
    
     entity "店カテゴリテーブル" as shopCategory <t_shopCategory> <<T,TRANSACTION_MARK_COLOR>> {
        + shop_id [PK][FK]
        + sCategory_id [PK][FK]
        --
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
        # user_id [FK]
        # currency_code [FK]
        # language_code [FK]
        reg_date
        upd_date
        del_date
    }
    
    entity "状況マスタ" as situation <m_situation> <<M,MASTER_MARK_COLOR>> {
        + situation_id [PK]
        --
        situation_name
    }
    
    entity "言語マスタ" as language <m_language> <<M,MASTER_MARK_COLOR>> {
        + language_code [PK]
        --
        language_name
    }
    
    entity "定型文マスタ" as fixedPhrase <m_fixedPhrase> <<M,MASTER_MARK_COLOR>> {
        + fixedphrase_id　[PK]
        --
        fixedphrase_name
        fixedphrase
        # situation_id  [FK]
        # language_code [FK]
    }
    
    entity "治安情報テーブル" as securityInformation <t_securityInformation> <<T,TRANSACTION_MARK_COLOR>> {
        + sInformation_id [PK]
        --
        sInformation
        sInformation_address
        # user_id [FK]
        reg_date
        upd_date
        del_date
        good_count
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
    
    entity "掲示板テーブル" as bulletinBoard <t_bulletinBoard> <<T,TRANSACTION_MARK_COLOR>> {
        + bulletinBoard_id [PK]
        --
        # user_id [FK]
        bulletinBoard_title
        # language_code [FK]
        reg_date
        upd_date
        del_date
    }
    
    entity "掲示板コメントテーブル" as bulletinBoardComment <t_bulletinBoardComment> <<T,TRANSACTION_MARK_COLOR>> {
        + bulletinBoard_id [PK][FK]
        + comment_id [PK]
        --
        # user_id [FK]
        comment
        # language_code [FK]
        commentDestination_id
        good_count
        reg_date
        upd_date
        del_date
    }
    
    entity "お気に入りテーブル" as favorite <t_favorite> <<T,TRANSACTION_MARK_COLOR>> {
        + favorite_id [PK]
        + user_id [PK][FK]
        --
        # shop_id [FK]
        reg_date
        upd_date
        del_date
    }
  }

securityInformation   }o-ri-o|   countries
fixedPhrase           }o-up-o|   language
fixedPhrase           }o-do-o|   situation
shopItems             }o-ri-o|   countries
shopItems             }o-le-o|   shop
shopItems             }o-do-o|   iCategoryId
shopItems             }o-ri-o|   language
shopItems             }o-up-o|   users
shop                  }o-le-o|   shopCategory
sCategoryId           }o-do-o|   shopCategory
users                 }o-up-o|   countries
users                 }o-ri-o|   language    
securityInformation   }o-do-o|   users  
searchHistory         }o-le-o|   users
bulletinBoard         }o-up-o|   users
bulletinBoard         }o-le-o|   language
bulletinBoardComment  }o-up-o|   users
bulletinBoardComment  }o-up-o|   bulletinBoard
bulletinBoardComment  }o-do-o|   language
favorite              }o-do-o|   users
favorite              }o-do-o|   shop
@enduml
```
