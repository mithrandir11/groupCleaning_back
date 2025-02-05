<script src="https://cdn.tiny.cloud/1/3lemiibkzuzx5fvtdy2r7h7h1l79tgt3vbkyxw6zzxxvnmih/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists media image link fullscreen',
    language: 'fa',
    height: 700,
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table image media fullscreen',

    file_picker_types: 'image media', // فعال کردن پیکر فایل برای تصاویر
    relative_urls: false,
    remove_script_host: false,
    convert_urls: false,
    images_upload_handler: function (blobInfo, success, failure) {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            const formData = new FormData();

            xhr.open('POST', '/upload-image', true); // URL endpoint برای آپلود تصویر

            // اضافه کردن توکن CSRF به درخواست
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.onload = function () {
                if (xhr.status === 200) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        resolve(response.location); // مسیر تصویر آپلود شده
                    } catch (e) {
                        reject('Invalid JSON response from server');
                    }
                } else {
                    reject('HTTP Error: ' + xhr.status);
                }
            };

            xhr.onerror = function () {
                reject('Ajax upload error');
            };

            xhr.send(formData);
        });
    },
    
    file_picker_callback: function (callback, value, meta) {
        if (meta.filetype === 'media') { // بررسی نوع فایل (ویدئو)
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'video/*'); // محدود کردن به فایل‌های ویدئویی

            // اضافه کردن لیسنر برای آپلود فایل
            input.onchange = function () {
                const file = this.files[0];

                // آپلود فایل به سمت سرور
                const xhr = new XMLHttpRequest();
                const formData = new FormData();

                xhr.open('POST', '/upload-media', true);

                xhr.onload = function () {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        callback(response.location, { source2: response.location }); // بازگرداندن مسیر ویدئو
                    } else {
                        alert('Upload failed with status: ' + xhr.status);
                    }
                };

                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                formData.append('file', file, file.name);
                xhr.send(formData);
            };

            // باز کردن دیالوگ انتخاب فایل
            input.click();
        }
    },

    media_live_embeds: true



  });

  
</script>