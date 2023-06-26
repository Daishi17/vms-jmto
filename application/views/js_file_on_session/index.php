<?php
if ($akta = 'akta') { ?>
    <script src="<?= base_url('js_folder/akta_pendirian/file_public.js') ?>"></script>
    <script src="<?= base_url('js_folder/akta_perubahan/file_public.js') ?>"></script>
<?php   } else { ?>
    <script src="<?= base_url('js_folder/izin_usaha//file_public.js') ?>"></script>
    <script src="<?= base_url('js_folder/siup/file_public.js') ?>"></script>
    <script src="<?= base_url('js_folder/sbu//file_public.js') ?>"></script>
    <script src="<?= base_url('js_folder/siujk/file_public.js') ?>"></script>
    <script src="<?= base_url('js_folder/identitas_perusahaan/file_public.js') ?>"></script>

<?php   } ?>