![banner](https://github.com/bevkk/php-blogapp/assets/67962407/1a9c9015-92bb-41e8-8f35-e03e36dd1a33)

# PHP - BlogApp
Basic php blog site where you can add, edit, remove blogs


## To Create the DataBase used in this project, use this query

```
CREATE DATABASE IF NOT EXISTS blogg_app;

USE test;

CREATE TABLE IF NOT EXISTS blogg_app (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (id, username, password) VALUES (1, 'admin', 'admin');
```

## Admin Page
- You can manage blog pages, images and users from admin page

![adminpage](https://github.com/bevkk/php-blogapp/assets/67962407/39caa3d4-0e01-45b1-a6f9-df5fcfd2febc)


## Index Page
- You can see newest blogs, search for any blog, login or register from index page

![indexpage](https://github.com/bevkk/php-blogapp/assets/67962407/3e90038b-f38f-4905-97be-15455933c49d)

## Blog Page Example

![blogpage](https://github.com/bevkk/php-blogapp/assets/67962407/b94009dc-55d4-4aa2-8758-cc8f47f4f3b6)

### ["Click Here"](https://www.youtube.com/watch?v=QNXKO976kHA) to see other features from this video 
