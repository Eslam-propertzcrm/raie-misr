<!-- (defer) specifies that the script is executed when the page has finished parsing -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
    // <textarea id="article-ckeditor"></textarea>
    // id="article-ckeditor"
</script>