This is a one user PHP blog. See a live version [here](http://blog.ninefinecode.com).

# features
- responsive design
- full CRUD operations
- RESTful routing system (use query parameters for assignment requirements)
- single user authentication  

# important: installation
This blog uses [composer](https://getcomposer.org/).

Run `$ composer install`  

# pages
## main pages
### home
### show
### edit
### create
## helper pages
### form
form for creating and editing posts

### layout (index.php)
contain the layout that will be in all pages

# schema

```sql
create table posts
  (id int primary key not null auto_increment,
  title varchar(100) not null,
  content text not null,
  date_created timestamp not null default CURRENT_TIMESTAMP)
```
