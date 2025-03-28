# read me
so basically this file is a W.I.P but, if you want the blogs to be displayed correctly, add this to your server block in nginx (or a counterpart if you wish)<br>
```
    # Route for /blog/id/10
    location ~* ^/blog/id/([0-9]+)$ {
        rewrite ^/blog/id/([0-9]+)$ /blog/blog.php?id=$1&$query_string last;
    }

    # Route for /blog/slug-title-here
    location ~* ^/blog/([a-zA-Z0-9-]+)$ {
        rewrite ^/blog/([a-zA-Z0-9-]+)$ /blog/blog.php?slug=$1&$query_string last;
    }

```