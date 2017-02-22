<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{title}}</title>
</head>
<body>
    <h1>{{title}}</h1>
    <article>
    {% for key in foto %}
        <figure>
            <img src="{{key.img_small}}" alt="{{key.title}}" title="{{key.title}}">
            <figcaption>
                <a href="?page=view&img={{key.img_big}}&title={{key.title}}">{{key.title}}</a>
            </figcaption>
        </figure>
    {% endfor %}
    </article>
</body>
</html>