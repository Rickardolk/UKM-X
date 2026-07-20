document.addEventListener('DOMContentLoaded', function () {
    var editor = document.getElementById('deskripsiEditor');
    var hiddenInput = document.getElementById('deskripsiValue');

    document.querySelectorAll('.dok-tool-btn[data-cmd]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.execCommand(btn.dataset.cmd, false, null);
            editor.focus();
        });
    });

    var btnLink = document.getElementById('btnLink');
    if (btnLink) {
        btnLink.addEventListener('click', function () {
            var url = prompt('Masukan URL:');
            if (url) document.execCommand('createLink', false, url);
            editor.focus();
        });
    }

    var formEdit = document.getElementById('formEditDokumentasi');
    if (formEdit) {
        formEdit.addEventListener('submit', function () {
            hiddenInput.value = editor.innerHTML;
        });
    }

    var mainImageWrap    = document.getElementById('mainImageWrap');
    var mainImageInput   = document.getElementById('mainImageInput');
    var mainImagePreview = document.getElementById('mainImagePreview');
    var btnGantiUtama    = document.getElementById('btnGantiUtama');

    if (mainImageWrap && mainImageInput) {
        var openMainPicker = function (e) {
            e.preventDefault();
            mainImageInput.click();
        };

        mainImageWrap.addEventListener('click', openMainPicker);
        if (btnGantiUtama) {
            btnGantiUtama.addEventListener('click', openMainPicker);
        }

        mainImageInput.addEventListener('click', function (e) {
            // Cegah double-trigger karena input juga ada di dalam wrap
            e.stopPropagation();
        });

        mainImageInput.addEventListener('change', function () {
            var file = mainImageInput.files[0];
            if (!file || !file.type.startsWith('image/')) return;

            var reader = new FileReader();
            reader.onload = function (e) {
                mainImagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    }

    document.querySelectorAll('.dok-edit-thumb-slot').forEach(function (slot) {
        var input = slot.querySelector('.upload-input');
        var img   = slot.querySelector('.dok-edit-thumb-img');

        if (!input) return;

        slot.addEventListener('click', function (e) {
            e.preventDefault();
            input.click();
        });

        input.addEventListener('click', function (e) {
            e.stopPropagation();
        });

        input.addEventListener('change', function () {
            var file = input.files[0];
            if (!file || !file.type.startsWith('image/')) return;

            var reader = new FileReader();
            reader.onload = function (e) {
                if (img) {
                    // Slot sudah punya gambar — ganti sumbernya
                    img.src = e.target.result;
                } else {
                    // Slot kosong (dashed "tambah gambar") — buat elemen img baru
                    var newImg = document.createElement('img');
                    newImg.src = e.target.result;
                    newImg.className = 'dok-edit-thumb-img';
                    newImg.alt = 'Gambar baru';
                    slot.insertBefore(newImg, slot.firstChild);
                    slot.classList.remove('dok-edit-thumb-slot--add');

                    var icon = slot.querySelector('.dok-slot-icon');
                    var label = slot.querySelector('.dok-slot-label');
                    if (icon) icon.remove();
                    if (label) label.remove();
                }
            };
            reader.readAsDataURL(file);
        });
    });

});