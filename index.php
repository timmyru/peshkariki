<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Peshkariki</title>
    <link rel="shortcut icon" href="img/peshkariki.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v=1.1">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Найти ближайший пункт выдачи</h2>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <form action="" class="search-form">
                <div class="form-group">
                    <label for="name">Ваше ФИО</label>
                    <input type="text" name="name" class="form-name form-input form-control"
                           placeholder="Например, Иванов Иван Иванович">
                    <span class="validation-error validation-name"></span>
                </div>
                <div class="form-group">
                    <label for="phone">Ваш телефон</label>
                    <input type="text" name="phone" class="form-phone form-input form-control"
                           placeholder="Например, 9213002040">
                    <span class="validation-error validation-phone"></span>
                </div>
                <div class="form-group">
                    <label for="address">Ваш адрес</label>
                    <input type="text" class="form-address form-input form-control" placeholder="Например, Ленина 123">
                    <span class="validation-error validation-address"></span>
                </div>
                <input class="btn btn-primary" type="submit" value="Найти ближайший пункт выдачи">
            </form>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="result">
                <strong class="result-info">
                    <span class="result-name__info"></span> (<span class="result-phone__info"></span>): ближайший пункт
                    выдачи <span class="result-point__info"></span> находится на расстоянии <span
                            class="result-distance__info"></span>км
                </strong>
                <div class="result-img"></div>
                <hr>
                <h6>Ждем Вас. Да пребудет с Вами сила</h6>
            </div>
        </div>
    </div>

</div>

<script src="js/main.js?v=1.1"></script>
</body>
</html>