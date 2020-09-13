# laravel-on-docker

## 参考
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
