document.addEventListener('DOMContentLoaded', function () {

    var editor = document.getElementById('deskripsiLengkapEditor');
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

    var formTambah = document.getElementById('formTambahKonten');
    if (formTambah) {
        formTambah.addEventListener('submit', function () {
            hiddenInput.value = editor.innerHTML;
        });
    }

    function setupUploadArea(areaId, inputId, options) {
        options = options || {};
        var area = document.getElementById(areaId);
        var input = document.getElementById(inputId);
        if (!area || !input) return;

        area.addEventListener('click', function () {
            input.click();
        });

        area.addEventListener('dragover', function (e) {
            e.preventDefault();
            area.classList.add('dragover');
        });

        area.addEventListener('dragleave', function () {
            area.classList.remove('dragover');
        });

        area.addEventListener('drop', function (e) {
            e.preventDefault();
            area.classList.remove('dragover');
            input.files = e.dataTransfer.files;
            handlePreview(input.files);
        });

        input.addEventListener('change', function () {
            handlePreview(input.files);
        });

        function handlePreview(files) {
            var file = files[0];
            if (!file || !file.type.startsWith('image/')) return;

            var reader = new FileReader();
            reader.onload = function (e) {
                area.classList.add('has-preview');
                area.innerHTML =
                    '<img src="' + e.target.result + '" class="kon-upload-preview-img" alt="Preview" />';

                var newInput = document.createElement('input');
                newInput.type = 'file';
                newInput.name = input.name;
                newInput.id = input.id;
                newInput.accept = input.accept;
                newInput.multiple = input.multiple;
                newInput.className = 'upload-input';
                newInput.files = files;
                area.appendChild(newInput);
            };
            reader.readAsDataURL(file);
        }
    }

    setupUploadArea('thumbnailUploadArea', 'thumbnailInput');
    setupUploadArea('deskripsiUploadArea', 'deskripsiInput');

});