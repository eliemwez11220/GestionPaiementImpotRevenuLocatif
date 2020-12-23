<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Fiches declaration impot Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('fiche/add'); ?>" class="btn btn-success btn-sm">Creer nouvelle fiche</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>FicheID</th>
						<th>Contribuable</th>
						<th>Date Fiche</th>
                        <th>Ville</th>
						<th>Locataire</th>
                        <th>Adresse Immeuble</th>
						<th>Observation</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($fiches as $t){ ?>
                    <tr>
						<td><?php echo $t['numero_fiche']; ?></td>
						<td><?php echo $t['client_sid']; ?></td>
						<td><?php echo $t['date_creation']; ?></td>
						<td><?php echo $t['adrs_ville']; ?></td>
						<td><?php echo $t['total_locataires']; ?></td>
                        <td><?php echo $t['adrs_numero']; ?>/<?php echo $t['adrs_rue']; ?>
                            /<?php echo $t['adrs_avenue']; ?>
                            /<?php echo $t['adrs_quartier']; ?>
                            /<?php echo $t['adrs_commune']; ?>
                        </td>
						<td><?php echo $t['observation']; ?></td>
						<td>
                           <!--
                             <a href="<?php echo site_url('fiche/edit/'.$t['fiche_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modifier</a> 
                           -->
                            <a href="<?php echo site_url('fiche/remove/'.$t['fiche_id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Voulez-vous vraiment supprimer cette fiche? notez que cette opéation est irreversible') "><span class="fa fa-trash"></span> Supprimer</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
