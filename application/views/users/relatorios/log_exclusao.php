<div id="conteudo">
	<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Log de Exclusão</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<table class="table table-condensed">
<tr>
    <th>Id Descarga</th>
    <th>Protocolo</th>
    <th>Usuario</th>
    <th>Data Exclusão</th>
</tr>

<?php $log = $this->db->query("select * from Log_exclusao order by data limit 15");

foreach($log->result() as $row){ ?>
    
<tr>
    <td><?php echo $row->id_descarga ?></td>
    <td><?php echo $row->protocolo ?></td>
    <td><?php echo $row->usuario ?></td>
    <td><?php echo $row->data ?></td>
</tr>


<?php } ?>

</table>
</div>