# KICKS COMPARE  ### 現在停止中###


## 概要
 スニーカーのサイズ感、履き心地をシェアすることに特化したSNSです。コメントの仕方に制約はなく、自由にコメントをすることができます。また、気に入ったスニーカーをいいねする機能があり、人気のスニーカーを一目で判別することができます。(コメント機能、いいね機能はアカウント登録が必要です。)またスニーカーのモデル名で検索する機能、ブランドから絞り込む機能を作成しました。

 ## 使い方
 スニーカーの一覧をご覧になる場合はユーザー登録が不要です。コメント機能、いいね機能をご利用になる場合はユーザー登録が必要です。
 テストユーザーとしてログインする場合は以下のアカウントをご利用ください。
 新規スニーカー情報の追加は、adminユーザーがするという仕様になっているため、一般ユーザーによる新規スニーカー情報の追加、編集、削除はadminユーザーしかできません。

 テストユーザーアカウント
 email: admin@admin.com
 password: pass123


## 機能
* スニーカー記事管理機能
    * スニーカー一覧表示
    * スニーカー詳細表示
    * ページネーション機能
    * スニーカーのモデル名でワード検索機能
    * スニーカーのメーカーから絞り込み機能
    * コメント機能(サインイン済みユーザーのみ可能)
    * いいね機能(サインイン済みユーザーのみ可能)
    * 新規スニーカー追加機能(管理画面より可能)
    * スニーカーのimageアップロード機能(管理画面より可能)
    * スニーカー情報編集機能(管理画面より可能)
    * スニーカー情報削除機能(管理画面より可能)
* ユーザー管理機能
    * 一般ユーザー管理機能
        * ログイン機能
        * 登録機能
        * ログアウト機能
    * adminユーザー管理機能
        * ログアウト機能


## 使用技術
* 言語
    PHP 7.1
* FW
    Laravel 5.7
* DB
    * MySQL 5.8 開発環境
    * clearDB 本番環境

* フロントエンド
    * Bootstrap 4.0
    * FontAwesome
    * jquery 3.3.1
    * Flat UI

* インフラ　heroku

* ストレージ
    S3
* ツール
    Circle CI

# 改善点
* 自らが書いたコメントを削除できないこと。
* ユーザーが自分のユーザーページが閲覧できないこと。
* ユーザーが自分でいいねをしたスニーカーをユーザーページから閲覧できないこと。
* いいね機能のリアルタイム化

