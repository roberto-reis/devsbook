<div class="modal">
    <div class="modal-inner">
        <a rel="modal:close">&times;</a>
        <div class="modal-content"></div>
    </div>
</div>
    <script>
        const BASE = '<?php echo $base; ?>';
    </script>
    <script src="https://unpkg.com/imask"></script>
    <script>
        
        IMask(
            document.getElementById('birthdate'),
            {
                mask:'00/00/0000'
            }
        );

    </script>
    <script type="text/javascript" src="<?php echo $base; ?>/assets/js/script.js"></script>
    <script type="text/javascript" src="<?php echo $base; ?>/assets/js/vanillaModal.js"></script>
</body>
</html>