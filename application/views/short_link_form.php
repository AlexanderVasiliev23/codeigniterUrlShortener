<!-- Begin page content -->
<main role="main" class="container text-center">
    <h1 class="mt-5">Сервис сокращения ссылок</h1>
    <p class="lead">Просто добавьте web-адрес страницы и получите сокращенныю ссылку</p>
</main>

<div class="container-fluid" style="margin-top: 10rem">
    <form>
        <div class="form-row align-items-center">
            <div class="col-md-10">
                <label class="sr-only" for="url">Username</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Ссылка для сокращения</div>
                    </div>
                    <input type="text" class="form-control" id="full_url" placeholder="https://www.yandex.ru/">
                </div>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-success mb-2" id="shortUrlBtn">Сократить ссылку</button>
            </div>
        </div>
    </form>
</div>

<div class="container" style="margin-top: 3rem">
    <div id="success_message" class="alert alert-success fade show" style="display: none">
        Коротка ссылка успешно добавлена.
        Перейти по короткой ссылке: <a href="" id="shortLink" target="_blank"></a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div id="error_message" class="alert alert-danger fade show" style="display: none">
        Введен некорректный адрес web-страницы. Попробуйте снова.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<script>
    $('#shortUrlBtn').click(function () {
        var full_url = $('#full_url').val();

        $.ajax({
            url: "<?= base_url() ?>index.php/AddShortLinkController/store",
            method: 'POST',
            data: {
                full_url: full_url
            },
            success: function (data) {
                console.log(data);
                if(data !== 'url_error') {
                    var shortLink = $('#shortLink');
                    $('#success_message').show(200);
                    shortLink.attr('href', "<?= base_url() ?>index.php/go/to/" + data);
                    shortLink.html(data + ' <small><span class="oi oi-external-link"></span></small>');
                }
                else {
                    $('#error_message').show(200).delay(3000).fadeOut();
                }

            }
        })
    })
</script>