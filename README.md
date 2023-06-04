![banner](https://github.com/bevkk/php-blogapp/assets/67962407/d07206af-5f1c-45c2-b061-46b4edc439ad)

# PHP - BlogApp
Basic php blog site


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

![indexpage](https://github.com/bevkk/php-blogapp/assets/67962407/4ba398f0-de64-4657-a521-29cc7ef16828)

## Blog Page Example

![blogpage](https://github.com/bevkk/php-blogapp/assets/67962407/21f69f0b-48e7-4337-91b4-859f796c9792)

### ["Click Here"](https://www.youtube.com/watch?v=QNXKO976kHA) to see other features 
