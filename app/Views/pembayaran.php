<form action="Home/simpan1" name="form" method="post">
    <center>
        <h2>Form Pembayaran</h2>
        <table>
            <tr>
                <td>Bakso</td>
                <td><input type="text" name="bakso" onkeyup="b()"></td>
            </tr>
            <tr>
                <td>Siomay</td>
                <td><input type="text" name="siomay" onkeyup=" b()"></td>
            </tr>
            <tr>
                <td>Mie Ayam</td>
                <td><input type="text" name="ayam" onkeyup=" b()"></td>
            </tr>
            <tr>
                <td>Teh Es</td>
                <td><input type="text" name="teh" onkeyup=" b()"></td>
            </tr>
            <tr>
                <td>Member</td>
                <td><select name="member" id="" onchange="b()">
                        <option value="Tidak">=Pilih=</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Total</td>
                <td><input type="text" name="tot" readonly></td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan"></td>
                <td><input type="reset" value="Batal"></td>
            </tr>
            <script>
                function b() {
                    var bak = (document.form.bakso.value) * 10000;
                    var sio = (document.form.siomay.value) * 12000;
                    var ay = (document.form.ayam.value) * 12000;
                    var teh = (document.form.teh.value) * 4000;
                    var member = document.form.member.value;
                    var diskon=(bak + sio + ay + teh) * 0.2;
                    if (member == 'Ya') {
                        document.form.tot.value = (bak + sio + ay + teh)-diskon;
                    } else if(member=='Tidak'){
                        document.form.tot.value = bak + sio + ay + teh;
                    }else{
                        document.form.tot.value = bak + sio + ay + teh;
                    }
                }
            </script>
        </table>
    </center>
</form>
</body>

</html>