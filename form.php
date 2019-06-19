<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма</title>
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/form_style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <form id="main_form">
                <div class="form-group">
                    <select name="opt1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="opt2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="opt3">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="opt4">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="opt5">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="inp1">
                </div>
                <div class="form-group">
                    <input type="text" name="inp2">
                </div>
                <input type="submit" value="Отправить">
            </form>
            <div class="result"></div>
        </div>
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            let form = $('form');

            form.on('submit', function (event) {
                event.preventDefault();
                let formData = form.serialize();

                $.ajax({
                    url: '/handler.php?' + formData,
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (data) {
                        let output = '<ul>';
                        
                        $.each(data, function (key, value) {
                            output += '<li><b>' + key + "</b>: " + value + '</li>';
                        });
                        
                        output += '</ul>';
                        $('.result').html(output);
                    }
                });

            });
        });
    </script>
</body>

</html>