# Todoアプリ（Laravel）

## 実装予定
- グループ毎でのTodoの管理
- 親子関係でのTodoの管理

## タスク
- [x] CRUDの動作確認
- [x] stateの初期値をtrueにしたときにエラーが出るので解消
- [x] userの情報の出力
- [x] Todoの表示
- [x] Roomの作成
- [x] Roomの更新（名称と説明と更新日）
- [x] Roomの削除
- [ ] Roomにメンバー登録する方法を考える
- [x] Todoの表示
- [ ] Todoの階層構造での表示
- [x] 親Todoの作成
- [ ] 親Todoから子Todoの生成
- [ ] Todoの更新
- [ ] Todoの更新の際にRoomの更新日も
- [ ] Todoのアーカイブ（履歴を残す）
- [ ] Todoの削除
- [ ] Todoを複数選択して（一括）削除
- [ ] Todoの作成・更新時にRoomの更新日も更新する処理
- [x] userとroom_idの紐づけ（Modelで多対多をbelongsToMany用いて）
- [x] Routeをグループにしてmiddlewareを適応する
- [x] middlewareで「user_id」と「room_id」がマッチするか確認
- [ ] middlewareで「user_id」と「room_id」がマッチするか確認する際にURLパラメータからSQLインジェクション（不正にSQLを実行）されないか確認
- [ ] middlewareでリダイレクト時にエラー文言も送る（printでも送れた？）
- [ ] LaravelでSwaggerなどでルーティング等のエビデンスを一括管理できるか検討
- [ ] テストを作成して動作の検証をしてみる
- [ ] 脆弱性について考えてみる（テスト等できるのか）
- [ ] CSRF対策を忘れていないか確認する手段を探す
- [ ] AWSでの本番実装


## 参考
- [Laravel 8 CRUD Tutorial by Example](https://www.techiediaries.com/laravel-8-crud-tutorial/)
- [標準のユーザー認証機能の利用 laravel/uiの利用 #Laravel頻出パターン #Laravelの教科書](https://note.com/laravelstudy/n/nf2179cc45a29)
- [Laravel 5.5 データベース：マイグレーション](https://readouble.com/laravel/5.5/ja/migrations.html)
- [Laravel 8.x 認証](https://readouble.com/laravel/8.x/ja/authentication.html)
- [Laravel 8.x ミドルウェア](https://readouble.com/laravel/8.x/ja/middleware.html)
- [[Laravel, MySQL] JSON 型カラムには配列を insert する](https://qiita.com/kamikoloss/items/7d4135ce74de8b91e721)
- [laravelでmysqlのjson型の扱いかた](https://qiita.com/haruraruru/items/bbf1392160357666a66a)
- [【初心者向け】20分でLaravel開発環境を爆速構築するDockerハンズオン](https://qiita.com/ucan-lab/items/56c9dc3cf2e6762672f4)

## 再構築方法
上記の参考ページより引用メモ

### Docker環境の破棄
- コンテナの停止、ネットワーク・名前付きボリューム・コンテナイメージを削除
	```
	docker-compose down --volumes --rmi all
	```
- 作業ディレクトリの削除
	```
	cd ..
	rm -rf laravel-on-docker
	
	```

### 環境の再構築
- GitHubからリポジトリをクローン
	```
	git clone git@github.com:ken17yama/laravel-on-docker.git
	cd laravel-on-docker
	docker-compose up -d --build
	
	```
- Laravelインストール
	```
	docker-compose exec app bash
	composer install
	cp .env.example .env
	php artisan key:generate
	php artisan migrate
	```
	→[http://127.0.0.1:10080](http://127.0.0.1:10080)で確認できるはず！！
