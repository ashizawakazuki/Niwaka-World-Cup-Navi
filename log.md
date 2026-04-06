# Niwaka World Cup Navi – 開発ログ
次やること<br>
SQLにプレイスホルダーつけてないから、つける<br>
データベースに各国の情報を入れる（AとBグループはなんとなくいれた）<br>
詳細画面（country_detail.php）で以下を整理（GPTに画像生成してもらったので、notionみる）
・注目ポイントにbrつけて、もっとわかりやすい言葉で
・有名選手の名前にwikpediaのリンクつける（その前にDBにURLいれないと）
・有名選手の特徴をデータベースにいれる（入れてない国が多い）


## 2026/4/6
### 【やったこと】
- ブートストラップの導入
  - テンプレートファイルに記述
- やっぱりブートストラップの導入やめた
- レイアウトが崩れるから

## 2026/03/22-4/5
### 【やったこと】
- グループリーグすべての国をデータベースに追加＆画像を追加
- 用語集を仮で作成<br>
- 各国の詳細画面をきれいにした<br>
- pc.cssを追加<br>
- 以下のカラムをcountryテーブルとcountryクラスに追加した 
  - famous_players_club
  - famous_players_link
  - famous_players_description 
  - map
  - highlights
  - appearances
  - memo 



## 2026/03/13-22
### 【やったこと】
- グループg～hの国旗の画像を挿入
- データベースの操作をしている箇所にtry-catchを記述（try-catchについて以下まとめた）<br>
- https://www.notion.so/try-catch-32b2dc61dde0808da99fce748f2c9d01?source=copy_link

## 2026/03/13
### 【やったこと】
- グループc～fの国旗の画像を挿入

## 2026/03/08
### 【やったこと】
- グループAとBの国旗の画像を挿入
- クラスを作る練習でCountry.phpを作成。さらにCountryRepository.phpからオブジェクトからDBのデータをもってこれるようにした。
- 国の一覧と詳細画面で、とってきたデータを表示できるようにした
- なんとなく書くと、PC側でカギを作って、GitHubにそのカギをはって「この鍵の持ち主はOK」と登録させて、接続した。
- Players.phpとPlayerRepository.phpを作成し、選手のオブジェクトを生成できるようにした。
- 日本代表のチームの画面を作り始めた

### 【学んだこと】
- クラスを１から作った、手順がわかった（以下の通り）<br>
  https://www.notion.so/2f72dc61dde0807a81b6d1c65e04b934?v=0c41db22430042899c1d83002bc8d7fd&source=copy_link


## 2026/03/07
### 【やったこと】
- countriesテーブルの構造を変えたのと、グループAとBのデータを入れた
- パソコンを変えたので、このパソコンとgithubとの接続を行った（以下の通り、AIにきいたのを簡単にしてはっただけ）
- なんとなく書くと、PC側でカギを作って、GitHubにそのカギをはって「この鍵の持ち主はOK」と登録させて、接続した。
  - ① 鍵を作った（ssh-keygen）
    - PCに 秘密鍵（private key） と 公開鍵（public key） を作成。
      まだGitHubとは無関係。PC内だけの作業。
  - ② 公開鍵を表示してコピー（cat ~/.ssh/id_ed25519.pub）
    - コピーしたのは 公開鍵だけ。
      秘密鍵は一切外に出していない。
  - ③ GitHubに公開鍵を登録
    - GitHubの Settings → SSH and GPG keys → New SSH key に貼り付け。
    - これは「この公開鍵に対応する秘密鍵を持っている人を“本人”として扱う」とGitHubに伝えた、ということ。
    - ここでも秘密鍵は送っていない。

  - ④ 接続確認（ssh -T git@github.com ）
    - 初回は「この接続先を信頼しますか？」と表示（known_hostsに登録する確認）。
    - yes と入力。
    - 成功メッセージが出た＝「秘密鍵を使った本人確認が通った」という意味。

## 2026/03/01
### 【学んだこと】
- 名前空間とcomposerについて（以下にまとめた）<br>
  https://www.notion.so/composer-3162dc61dde08059a7b9fc52ceb777db?source=copy_link

### 【やったこと】
- composerにオートロードを記述
- 名前空間を記述


## 2026/02/28
### 【学んだこと】
- configがindexで全体で読み込まれるファイルなので、そこに言語ファイルを書いた
- text-align:centerは文字の中央揃え

### 【やったこと】
- 言語ファイルの作成
- 国一覧画面にグループ名を記述

## 2026/02/14
### 【学んだこと】（主に3つ）
- PDOはデータベースに接続するための窓口のようなもので、PHPがあらかじめ用意しているクラス（機能）
→引数で①サーバー名とデータベース名、②DBのユーザー名、③DBのパスワード、④文字コードを渡す
- https://www.youtube.com/watch?v=9PjSHbn8VQA この動画が良い
 

- SngletonPDOファイルは、PDOを生成するためのファイル。こいつがいないと、それぞれのDBと接続するファイルで毎回「$db = new PDO("mysql:host=db;dbname=niwaka", "user", "password");とかをしないといけない
- 上記のデメリットとしては、毎回接続するので通信量が増えたり、修正が必要になったら、全部変えないといけない。
- こいつを使えば、最初の1回接続すれば、あとはPDOを使いまわせる。


- Repository（リポジトリ）は、データベースと操作する（SQLを書く）ためのファイル
- 今回は「CountryRepository.php」ファイルを作成した


- ブランチ切り忘れて作業してしまったら、コミットしていなければ、そのままブランチ切れば良い（そのままそのブランチでコミットすれば、mainブランチは変更前になる）

### 【やったこと】
### Docker の中の PHP に “MySQL と通信するための機能をDockerfileに記述（GPTに頼った）
PDOでデータベースから取ってくることを試みたが、エラーが出て調べたら以下をやらなくちゃいけなくてやった
- 以下を作成・修正
    - 「RUN docker-php-ext-install pdo pdo_mysql」をDockerfileに記述
    - 「docker compose down」 「docker compose build --no-cache」 「docker compose up -d」を実施
### MySQLからデータをとってこれるようにファイルを作成
- 以下を作成・修正
    - 「SingletonPDO.class.php」を作成し、PDOをそこで作成できるように記述
    - 「dbconfig.php」にPDOに投げるためのDSN（データベースの住所みたいなもの）の定数を記述
    - 「index.php」に「dbconfig.php」を接続するように記述
### CountryRepositoryっていうデータベースを操作する専用のファイルを作成
- 以下を作成・記述
    - 国を全部持ってくるメソッド（getCountry）と一つだけ持ってくるメソッド（getCountryDetail）を作成

### index.phpにデータベースファイルに関する記述をした

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

