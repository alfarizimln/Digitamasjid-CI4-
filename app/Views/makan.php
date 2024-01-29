<center>
    <h2>Tampil Data Makanan</h2>
    <hr>
    <table border="1">
        <tr>
            <td>Bakso</td>
            <td>Siomay</td>
            <td>Mie Ayam</td>
            <td>Teh Es</td>
            <td>Member</td>
            <td>Total</td>
        </tr>
        <?php
        foreach($sppdok as $data):
        ?>
        <tr>
            <td><?=$data['bakso']?></td>
            <td><?=$data['siomay']?></td>
            <td><?=$data['mie']?></td>
            <td><?=$data['tehes']?></td>
            <td><?=$data['member']?></td>
            <td><?=$data['total']?></td>
        </tr>
    <?php
    endforeach;
    ?>
    </table>
</center>