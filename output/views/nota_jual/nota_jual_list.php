<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Nota_jual List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('nota_jual/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('nota_jual/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('nota_jual'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tgl Jual</th>
		<th>Diskon Total</th>
		<th>Id Grup</th>
		<th>Ongkir</th>
		<th>Status Bayar</th>
		<th>Rek Bank</th>
		<th>Nm Konsumen</th>
		<th>Action</th>
            </tr><?php
            foreach ($nota_jual_data as $nota_jual)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $nota_jual->tgl_jual ?></td>
			<td><?php echo $nota_jual->diskon_total ?></td>
			<td><?php echo $nota_jual->id_grup ?></td>
			<td><?php echo $nota_jual->ongkir ?></td>
			<td><?php echo $nota_jual->status_bayar ?></td>
			<td><?php echo $nota_jual->rek_bank ?></td>
			<td><?php echo $nota_jual->nm_konsumen ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('nota_jual/read/'.$nota_jual->id_nota),'Read'); 
				echo ' | '; 
				echo anchor(site_url('nota_jual/update/'.$nota_jual->id_nota),'Update'); 
				echo ' | '; 
				echo anchor(site_url('nota_jual/delete/'.$nota_jual->id_nota),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('nota_jual/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>