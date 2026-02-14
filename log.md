# Niwaka World Cup Navi – 開発ログ

## 2026/02/11
### docker-compose.ymlファイルに記述し、mySQLのデータベースサーバー(コンテナ)とphpmyadmin用のサーバー（コンテナ）を作成（GPTに完全に頼った）
- 以下を作成・修正
    - データベースの作成(coutriesテーブルの作成)
    - docker-compose.ymlファイルにタイトルの通り記述
    - ローカルでデータベースを接続することができた。そしてphpmyadminとも接続できた
### ディレクトリ構成の修正
- 以下を作成・修正
    - 諸々ディレクトリやファイルの位置の修正
    - cssをtemplateファイルに直がき

### dockerfileにデバッカーの記述

### ヘッダーに「各国代表」のリンクを設置

## 2026/01/21
### smartyでtemplate.htmlを一回を通って表示するよう修正
- 以下を作成・修正
  - template.htmlに{include file=$filename}を記述
  - japan-team.phpにassignとdisplayを記述
  - country-detail.phpを作成
- 
## 2026/01/11
### index.html（トップページを編集
- 以下を作成
    -ヘッダーもある程度作成
    -トップページの大枠を作成（まだボタン押しても遷移されない）     

まだcssを整えていないので、共通のCSSを作る
## 2026/01/03
### テンプレートファイルを作成
- 以下を作成
    - `index.html`
    - `template.html`
    - `index.php`

### ヘッダーとフッターを作成
まだcssを整えていないので、共通のCSSを作る

## 2026/01/02
### プロジェクト構成の準備
- Docker 用ディレクトリ（Niwaka-World-Cup-Navi-Docker）と、アプリ本体ディレクトリ（Niwaka-World-Cup-Navi）を分ける構成にした。
- Niwaka-World-Cup-Navi-Docker 直下に以下を作成：
    - Dockerfile
    - docker-compose.yml

### Dockerfile 作成
- ベースイメージに `php:8.2-apache` を使用。
- WORKDIR を `/var/www/html` に設定。
- Composer を Docker イメージ内にインストールするために以下を実行する記述を追加：
    - `apt-get update`
    - `apt-get install -y unzip curl`
    - `curl -sS https://getcomposer.org/installer | php`
    - `mv composer.phar /usr/local/bin/composer`

### docker-compose.yml 作成
- `web` サービスを作成。
- 8082 番ポートをコンテナの 80 番に割り当て（`8082:80`）。
- アプリ本体をマウントするため volumes に以下を設定：
    - `../Niwaka-World-Cup-Navi/src:/var/www/html`

### コンテナ起動
- `docker compose up -d --build` を実行してコンテナを起動。
- PHP と Apache が動作しているコンテナが正常に起動した。

### コンテナ内へログイン
- `docker compose exec web bash` でコンテナに入る。
- コンテナ内の `/var/www/html` に、自分の src フォルダがマウントされていることを確認。

### Composer の動作確認
- コンテナ内で `composer --version` を実行して Composer が認識されていることを確認。

### Smarty インストール
- コンテナ内（/var/www/html）で `composer require smarty/smarty` を実行。
- vendor ディレクトリが作成され、Smarty がインストールされた。

### marty 用ディレクトリ作成
- アプリ本体側で以下のディレクトリを作成：
    - `templates`
    - `templates_c`

