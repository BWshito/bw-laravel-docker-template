# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか

`<input type="hidden" name="_method" value="PUT">`
formタグでは直接PUTメソッドを指定することができない
name属性が`_method`のデータが送信されてきた場合
Laravelはvalueの値をHTTPメソッドとして解釈する

### findメソッドの引数に指定しているIDは何のIDか

`todos`テーブル内の`id`カラム(primary key)

### findメソッドで実行しているSQLは何か

`SELECT * FROM todos WHERE id = ?`

### findメソッドで取得できる値は何か

該当レコード1件を表す`Todo`インスタンス

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか

既にDBに存在するかどうか(`exists`フラグ)
新規モデルの場合はINSERT文
既存モデルの場合はUPDATE文

## Todo論理削除

### traitとclassの違いとは

classとは異なり一つのクラスに複数のtraitを追加することができる
trait自体はインスタンス化できない

### traitを使用するメリットとは

traitはクラスにプロパティやメソッドを追加するための機能
これを用いることでコードの共通化・再利用が可能

## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか

RouteからTodoControllerが生成されるタイミング
リクエストごとに毎回実行される

### RequestクラスからFormRequestクラスに変更した理由

Controllerに処理、FormRequestにバリデーションで責務を分離するため
`Request`クラスの場合バリデーションと処理の両方がControllerに書かれる
Controllerの可読性も向上する

### $errorsのhasメソッドの引数・返り値は何か

引数には入力欄のname属性を入れる
その入力欄でバリデーションエラーが発生しているか判定し、返り値はboolean型

### $errorsのfirstメソッドの引数・返り値は何か

引数には入力欄のname属性を入れる
その入力欄で最初に発生したエラーメッセージをstring型で返す

### フレームワークとは何か

開発をする際に骨組みと流れを先に用意してくれる仕組みのこと
- アプリの流れを決めてくれる
- よく使う機能を部品として提供
- 書き方のルール統一が可能

### MVCはどういったアーキテクチャか

アプリケーションをModel, View, Controllerの3つの役割に分離することで、保守性・可読性・開発効率を高めるアーキテクチャ

### ORMとは何か、またLaravelが使用しているORMは何か

SQLを直接書かずにクラスやオブジェクトを通してDBを操作できる仕組み
LaravelではEloquentを使用している
ModelはORMを利用するためのクラス

### composer.json, composer.lockとは何か

`composer.json`ではプロジェクトで使用したいものを記載している
- 使いたいライブラリのパッケージを宣言
- PHPのバージョン制約を書く
- 開発用ツールの指定

`composer.lock`は実際にインストールされたものを記録している
- 依存関係を固定
- チーム全員が本番環境で同じバージョンを使うために使用

チーム内で衝突しないようにどちらもGit上でコミットする

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか

`/vendor`ディレクトリに格納される
ライブラリごとにディレクトリが分かれている
`autoload.php`を読み込むだけでvendor内のライブラリとapp/配下のクラスが使えるようになる
基本的にGitで管理しない