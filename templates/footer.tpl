    </div>

<div id="footer">
    <small>
        (c) 2013
    </small>
</div>
    <script>
        $(function(){
            $.datepicker.setDefaults(
                    $.extend($.datepicker.regional[""])
            );
            $("#datepicker").datepicker({
                changeYear: true,
                yearRange:'-90:+0',
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
</div>
</body>
</html>