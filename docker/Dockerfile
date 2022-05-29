#参考URLの内容から、phpおよびlarabelのバージョンのみ変更されているSSS推奨）

# 今回はオリジナルからバージョンを変更。
FROM php:7.4-apache

# ホスト上に作成したphpおよびapacheの設定ファイルをコンテナ内にコピー。
COPY ./php/php.ini /usr/local/etc/php/
COPY ./apache/*.conf /etc/apache2/sites-enabled/

# 必要なツールをインストール
# zip error対応。https://qiita.com/Taki_Kazuya/items/454f399fb7e0e72fbd18
RUN apt-get update \
  && apt-get install -y zlib1g-dev libpq-dev mariadb-client unzip\
  && apt-get install -y libzip-dev\
  && docker-php-ext-install zip pdo_mysql mysqli \
  && docker-php-ext-enable mysqli

#　別途composerのイメージから、composerの実行ファイルをコンテナにコピー（ホストを介していない？）
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 環境変数の設定
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# apacheのデフォルトのドキュメントルートをワーキングディレクトリにしている。
WORKDIR /var/www/html

# Larabelのインストール。オリジナルからバージョンを変更。
# Laravel/installerにはバージョン4までしか存在しない。バージョン指定不要？
#RUN composer global require "laravel/installer=4.*"


#こちらであれば8系を指定してインストール可能。(要再検証)
RUN composer global require "laravel/laravel=8.*"


#Nodejsのインストール。
#こちらのUdemy講座向け。
# https://www.udemy.com/course/laravel8mysql/learn/lecture/26953098#notes
RUN curl -sL https://deb.nodesource.com/setup_lts.x | bash - 
RUN apt install -y nodejs