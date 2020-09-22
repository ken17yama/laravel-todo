up:
	docker-compose up -d
down:
	docker-compose down
ps:
	docker-compose ps
restart:
	docker-compose down && docker-compose up -d
web:
	docker-compose exec web ash
app:
	docker-compose exec app bash
delete:
	docker-compose down --volumes --rmi all
db:
	docker-compose exec db bash
sql:
	docker-compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
