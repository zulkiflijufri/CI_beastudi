<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excel Import</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <br>
        <h3 align="center" class="font-weight-bold text-primary">Daftar Nama Mahasiswa Beastudi</h3><br>
        <form method="post" id="import_file" enctype="multipart/form-data">
            <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
            <br>
            <input type="submit" name="import" value="Import Data" class="btn btn-info btn-sm">
        </form>
        <br><br>
            <div class="table-responsive" id="data_mahasiswa">
                <!--tampung data -->
            </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function() {

        load_data();

        function load_data() {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/excel_import/fetch",
                method: "POST",
                success:function(data) {
                    $('#data_mahasiswa').html(data);
                }
            })
        }

        $('#import_file').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/excel_import/import",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#file').val('');
                    load_data();
                    alert(data);
                }
            })
        });
    });
</script>