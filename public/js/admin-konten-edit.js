document.addEventListener('DOMContentLoaded', function () {

    var editor      = document.getElementById('deskripsiLengkapEditor');
    var hiddenInput = document.getElementById('deskripsiLengkapValue');

    document.querySelectorAll('.dok-tool-btn[data-cmd]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.execCommand(btn.dataset.cmd, false, null);
            editor.focus();
        });
    });

    var btnLinkKonten = document.getElementById('btnLinkKonten');
    if (btnLinkKonten) {
        btnLinkKonten.addEventListener('click', function () {
            var url = prompt('Masukan URL:');
            if (url) document.execCommand('createLink', false, url);
            editor.focus();
        });
    }

    var formEdit = document.getElementById('formEditKonten');
    if (formEdit) {
        formEdit.addEventListener('submit', function () {
            hiddenInput.value = editor.innerHTML;
        });
    }

    function setupGantiGambar(wrapId, inputId, previewId, btnId) {
        var wrap    = document.getElementById(wrapId);
        var input   = document.getElementById(inputId);
        var preview = document.getElementById(previewId);
        var btn     = document.getElementById(btnId);

        if (!wrap || !input || !preview) return;

        var openPicker = function (e) {
            e.preventDefault();
            input.click();
        };

        wrap.addEventListener('click', openPicker);
        if (btn) {
            btn.addEventListener('click', openPicker);
        }

        input.addEventListener('click', function (e) {
            e.stopPropagation();
        });

        input.addEventListener('change', function () {
            var file = input.files[0];
            if (!file || !file.type.startsWith('image/')) return;

            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    }

    setupGantiGambar('thumbnailWrap', 'thumbnailInput', 'thumbnailPreview', 'btnGantiThumbnail');
    setupGantiGambar('deskripsiImgWrap', 'deskripsiImgInput', 'deskripsiImgPreview', 'btnGantiDeskripsiImg');

});