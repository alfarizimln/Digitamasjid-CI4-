<center>
    <h2>INPUT DATA</h2>
<form action="Quis/simpanquis" name="form" method="post">
    <table> 
        <tr>
            <td>Kode Baju</td>
            <td><select name="kode" id="" onchange="a()">
                    <option value="">Pilih</option>
                    <option value="B001">B001</option>
                    <option value="B002">B002</option>
                    <option value="B003">B003</option>
                </select></td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td><input type="text" name="jenis"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" onkeyup="b()"></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input type="text" name="jumlah" onkeyup="b()"></td>
        </tr>
        <tr>
            <td>Total</td>
            <td><input type="text" name="total" onkeyup="b()"></td>
        </tr>
        <tr>
            <td><input type="submit" name="Simpan"></td>
        </tr>
        <script>
            function a() {
                var kode = document.form.kode.value;
                var jenis = document.form.jenis.value;
                if (kode == 'B001') {
                    document.form.jenis.value = "Koko"
                } else if (kode == 'B002') {
                    document.form.jenis.value = "Gaun"
                } else {
                    document.form.jenis.value = "Kaos"
                }
            }

            function b() {
                var har = document.form.harga.value;
                var jum = document.form.jumlah.value;

                document.form.total.value = parseInt(har) * parseInt(jum);
            }
        </script>

    </table>
</form>
</center>