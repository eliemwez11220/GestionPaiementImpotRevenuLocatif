<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Creation nouvelle Fiche declaration</h3>
            </div>
            <?php echo form_open('fiche/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="client_sid" class="control-label">Contribuable concernee</label>
						<div class="form-group">
							<select name="client_sid" class="form-control">
								<option value="">selectionner un contribuable</option>
								<?php 
								foreach($all_clients as $vehicule)
								{
									$selected = ($vehicule['client_id'] == $this->input->post('client_sid')) ? ' selected="selected"' : "";

									echo '<option value="'.$vehicule['client_id'].'" '.$selected.'>'.$vehicule['noms_complet'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					
					<div class="col-md-6">
						<label for="numero_fiche" class="control-label">Numero Fiche</label>
						<div class="form-group">
							<input type="text" name="numero_fiche" value="<?php echo $this->input->post('numero_fiche'); ?>" class="form-control" id="numero_fiche" />
						</div>
					</div><div class="col-md-6">
						<label for="date_fiche" class="control-label">Date Fiche</label>
						<div class="form-group">
							<input type="text" name="date_fiche" value="<?php echo date('Y-m-d H:i:s'); ?>" class="form-control" id="date_fiche" readonly/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="adrs_ville" class="control-label">Ville Immeuble</label>
						<div class="form-group">
							<input type="text" name="adrs_ville" value="<?php echo $this->input->post('adrs_ville'); ?>" class="form-control" id="adrs_ville" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="total_locataires" class="control-label">Nombre total des locataires Immeuble</label>
						<div class="form-group">
							<input type="number" min="1" name="total_locataires" value="<?php echo $this->input->post('total_locataires'); ?>" class="form-control" id="total_locataires" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="adrs_numero" class="control-label">Numero Immeuble</label>
						<div class="form-group">
							<input type="text" name="adrs_numero" value="<?php echo $this->input->post('adrs_numero'); ?>" class="form-control" id="adrs_numero" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="adrs_rue" class="control-label">Rue Immeuble</label>
						<div class="form-group">
							<input type="text" name="adrs_rue" value="<?php echo $this->input->post('adrs_rue'); ?>" class="form-control" id="adrs_rue" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="adrs_avenue" class="control-label">Avenue Immeuble</label>
						<div class="form-group">
							<input type="text" name="adrs_avenue" value="<?php echo $this->input->post('adrs_avenue'); ?>" class="form-control" id="adrs_avenue" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="adrs_quartier" class="control-label">Quartier Immeuble</label>
						<div class="form-group">
							<input type="text" name="adrs_quartier" value="<?php echo $this->input->post('adrs_quartier'); ?>" class="form-control" id="adrs_quartier" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="adrs_commune" class="control-label">Commune Immeuble</label>
						<div class="form-group">
							<input type="text" name="adrs_commune" value="<?php echo $this->input->post('adrs_commune'); ?>" class="form-control" id="adrs_commune" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="observation" class="control-label">Observation</label>
						<div class="form-group">
							<textarea name="observation" class="form-control" id="observation"><?php echo $this->input->post('observation'); ?></textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Creer fiche declaration
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>