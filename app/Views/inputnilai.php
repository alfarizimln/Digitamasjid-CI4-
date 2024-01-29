<center>
    <table width="473" border="2">
        <tr>
            <td width="567"><div align="left">
                <p class="judulutama">
                    <center><b><h2>INPUT DATA NILAI</h2></b></center></p>
                    <hr>
                    <form name="forms">
                    <table width="400" border="0" align="left" id="biodata">
                    <tr>
                        <td>Nilai Tugas</td>
                        <td><input type="text" id="nilaiTugas" name="nilaiTugas" type="text" size="35" maxlength="30"><br><br></td>
                    </tr>
                    <tr>
                        <td>Nilai UTS</td>
                        <td><input type="text" id="nilaiUTS" name="nilaiUTS" type="text" size="35" maxlength="30"><br><br></td>
                    </tr>
                    <tr>
                        <td>Nilai UAS</td>
                        <td><input type="text" id="nilaiUAS" name="nilaiUAS" type="text" size="35" maxlength="30"><br><br></td>
                    </tr>
                    <tr>
                        <td>Nilai Akhir</td>
                        <td><input type="text" id="nilaiAkhir" name="nilaiAkhir" type="text" size="35" maxlength="30" readonly><br><br></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <input type="button" value="Submit" onclick="hitungNilai()">
                        <input type="button" value="Batal" onclick="resetForm()"><br><br><br>
                        </td>
                    </tr>
                    </table>
                </form>
                <script>
                        function hitungNilai() {
                            var a = eval(document.forms.nilaiTugas.value);
                            var b = eval(document.forms.nilaiUTS.value);
                            var c = eval(document.forms.nilaiUAS.value);
                            var d = (a + b + c)/3; 
                            document.forms.nilaiAkhir.value = d;
                        }
                        function resetForm() { document.forms.reset(); }
                  </script>
            </div>
            </td>
        </tr>
    </table>
</center>