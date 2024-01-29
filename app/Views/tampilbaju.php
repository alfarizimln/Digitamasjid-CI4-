<center>
    <h2>Tampil Data Baju</h2>
    <hr>
    <table border="1">
        <tr>
            <td>Kode Baju</td>
            <td>Jenis Baju</td>
            <td>Harga Baju</td>
            <td>Jumlah Baju</td>
            <td>Total</td>
        </tr>
        <?php
        foreach($sppdok as $data):
        ?>
        <tr>
            <td><?=$data['kodebaju']?></td>
            <td><?=$data['jenisbaju']?></td>
            <td><?=$data['hargabaju']?></td>
            <td><?=$data['jumlahbaju']?></td>
            <td><?=$data['total']?></td>
        </tr>
        <tr>
        </tr>
    <?php
    endforeach;
    ?>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    </table><br>
    <button onclick="goBack()">Kembali</button>
</center>