<script>
    function load_dokumen() {
        url_post = $('[name="count_validate"]').val()
        $.ajax({
            type: "GET",
            url: url_post,
            dataType: "JSON",
            success: function(response) {

            }
        })
    }
</script>