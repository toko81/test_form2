# laravel-docker-template


お問い合わせフォーム

# アプリケーション名
test-form2

## 環境構築
- Dockerのビルド
1.
git clone git@github.com:Estra-Coachtech/laravel-docker-template.git
2.
git remote set-url origin git@github.com:toko81/test_form2.git
3.
docker-compose up -d --build
4.
composer install
5.
cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
6.
マイグレーションファイル
・2025_08_11_161801_create_contacts_table.php
・2025_08_10_192238_create_categories_table.php

7.
model
Contact.php
Category.php

8.
シーディング
・CategoryTableSeeder.php
・TestController.php


## 使用技術(実行環境)
- 
・　PHP　8.1-fpm
・　Laravel 8.75
・　MYSQL 8.0.26
・　Docker/docker-compose


## ER図
< - - - 作成したER図の画像 - - - >

## URL
-
・　開発環境： http://localhost/
・　phpMyAdmin：http://localhost:8080
