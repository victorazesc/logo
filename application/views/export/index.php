
<div class="row">
    <div class="col-lg-12">
	<h1>Export Data to Excel</h3>
        <a class="pull-right btn btn-primary btn-xs" href="<?php echo site_url() ?>export/createxls"><i class="fa fa-file-excel-o"></i> Export Data</a><br>
		</div>
		</div>
<div class="table-responsive">
    <table class="table table-hover tablesorter">
        <thead>
            <tr>
                <th class="header">Data_chegada</th>
                <th class="header">Usuario</th>                           
                <th class="header">status</th>                      
                <th class="header">grade_horario</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($employeeInfo) && !empty($employeeInfo)) {
                foreach ($employeeInfo as $key => $element) {
                    ?>
                    <tr>
                        <td><?php echo $element['Data_chegada']; ?></td>   
                        <td><?php echo $element['Usuario']; ?></td> 
                        <td><?php echo $element['status']; ?></td>                       
                       
                        
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">There is no employee.</td>    
                </tr>
            <?php } ?>

        </tbody>
    </table>
    <a class="pull-right btn btn-primary btn-xs" href="<?php echo site_url() ?>export/createxls"><i class="fa fa-file-excel-o"></i> Export Data</a>
</div> 

