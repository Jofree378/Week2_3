<html>
<head>
    <title>Выбор услуги каршеринга</title>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf8">
</head>
<body>
<div class="page">
    <div class="title">Выбор услуги</div>
    <form action="service.php" method="post">
        <div class="service">
            <div class="flex_service">
                <label for="range">Количество километров</label>
                <input type="text" name="range" id="range">
            </div>
            <div class="flex_service">
                <label for="time">Количество минут</label>
                <input type="text" name="time" id="time">
            </div>
            <div class="flex_service">
                <label for="service">Выбор тарифа</label>
                <select class="form_select" name="service" id="service">
                    <option value="Базовый">Базовый</option>
                    <option value="Почасовой">Почасовой</option>
                    <option value="Студенческий">Студенческий</option>
                </select>
            </div>
        </div>
        <div class="add_service">
            <div class="add">
                <label for="gps">Подключить GPS</label>
                <br>
                <input type="checkbox" name="gps" id="gps">
                <div class="add_options">
                    <p>GPS в салон - 15 рублей в час, минимум 1 час. Округление в большую сторону</p>
                </div>
            </div>
            <div class="add">
                <label for="drive">Дополнительный водитель</label>
                <br>
                <input type="checkbox" name="driver" id="drive">
                <div class="add_options">
                    <p>Дополнительный водитель - 100 рублей единоразово</p>
                </div>
            </div>
        </div>
        <div class="btn_service">
            <button class="btn" type="submit">Выбрать услугу</button>
        </div>
    </form>
    <div class="border"></div>
    <div class="text_service">
        <div class="options">
            <h3>Тариф базовый</h3>
            <ul>
                <li>1 км = 10 рублей</li>
                <li>1 минута = 3 рубля</li>
            </ul>
        </div>
        <div class="options">
            <h3>Тариф почасовой</h3>
            <ul>
                <li>1 км = 0 рублей</li>
                <li>60 минут = 200 рублей</li>
                <li>Округление до 60 минут в большую сторону</li>
            </ul>
        </div>
        <div class="options">
            <h3>Тариф студенческий</h3>
            <ul>
                <li>1 км = 4 рубля</li>
                <li>1 минута = 1 рубль</li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>

