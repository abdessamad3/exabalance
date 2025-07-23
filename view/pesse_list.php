<?php include('view/header.php')?>      
<div class="container">

        <div class="left">
        <div class="poid">
            <p class='main_pesse' id='main_pesse'><?php echo $poids?></p>
        </div>
        <div class="add_update">
            <div class="add">
                <form action='.' method="post" style='display:none' id='delete_form' >
                    <input type="hidden" name="action" value="function_delete_pesse"/>
                    <input type="hidden" name='pesse_id' value="<?php echo ($action == 'list_pesse') ? '': (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['id']  : '') ?>" required />
                </form>

                <form action='.' method="post" style='display:none' id='annuler_form' >
                    <input type="hidden" name="action" value="function_annuler_pesse"/>
                    <input type="hidden" name='pesse_id' value="<?php echo ($action == 'list_pesse') ? '': (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['id']  : '') ?>" required />
                </form>

                <form action="." method="post" id='add_form' class="row g-3">
                    
                    <?= (isset($_GET['success']))? "<p style= ' color: green'> *". $_GET['success'].".</p>": ''?>
                    <?= (isset($_GET['error']))? "<p style= ' color: red'> *". $_GET['error'].".</p>": ''?>
                    <h5 style="width:100%">first pesse</h5>
                    <div class="half half_right">
                       <input type="hidden" name="action" value="<?php echo ($action == 'list_pesse') ? 'function_add_pesse': (($action == 'pesse_update' || $action == 'final_pesse') ? 'function_update_pesse'  : '') ?>"/>
                       <label for="">N° ticket <span>*</span></label>     
                       <input type="text" name='pesse_id' class='form-control'  value="<?php echo ($action == 'list_pesse') ? '': (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['id']  : '') ?>" readonly />
                       <label for="">client <span>*</span></label> 
                       <select name="idclient" class='form-control' required>
                           <option value="">please select</option>
                           <!--TODO add to the client and article and fournisseur the test if on the action to add the value received-->
                           <?php foreach($clients as $client) : ?>
                                   <option value="<?= $client['id']?>" <?= ($pesse_by_id['nom_CLient'] == $client['nom_CLient']) ? 'selected' : '' ?>><?= $client['nom_CLient']?></option>
                                       <?php endforeach ;?>
                           </select>
                       <label for="">matricule <span>*</span></label> 
                       <input id="matricule" name='matricule' class='form-control' list="suggestions" value = "<?php echo ($action == 'list_pesse') ? '': (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['matricule'] : '') ?>" <?php echo  ($action == 'pesse_update' || $action == 'final_pesse') ? 'readOnly':'' ?> required>
                       <datalist id='suggestions'>
                        
                               <?php foreach($matricules as $matricule) :?>
                               <option value="<?= $matricule['matricule']?>">
                           <?php endforeach;?>
                       </datalist>
                       <label for="">produit <span>*</span></label> 
                       <select name="Idproduit" class='form-control' required   >
                           <option value="">please select</option>
                           <?php foreach($articles as $article) : ?>
                                  <option value="<?= $article['id'] ?>" <?= ($pesse_by_id['reference'] == $article['reference']) ? 'selected' : '' ?>><?= $article['reference'] ?></option>
                                       <?php endforeach ;?>
                           </select>
                       <!--input type="text" name='Idproduit' class='form-control' value="<?=  ($action == 'list_pesse') ? '': (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['reference']  : '') ?>" required /--> 
                       <label for="">Utilisateur</label>
                       <input type='text' name='utilisateur' class='form-control' value="<?= $_SESSION['name'] ?>" readonly required/>
                       <input type='hidden' name='IdUtilisateur' value="<?= $_SESSION['user_id'] ?>" readonly required/>
                       <label for="">Provenance <span>*</span></label>
                       <input type="text" name='Provenance' class='form-control' value="<?= ($action == 'list_pesse') ? '': (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['Provenance']  : '') ?>" />
                    </div>
                    <div class="half half-left">
                        <label for="">DateEntree</label>
                        <input type="datetime-local" name='DateEntree' class='form-control' value="<?= ($action == 'list_pesse') ? $date : (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['DateEntree']  : '') ?>" required readonly/>
                        <label for="">NCommande</label>
                        <input type="number" name='NCommande' class='form-control' value="<?= ($action == 'list_pesse') ? '': (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['NCommande']  : '') ?>" />
                        <label for="">PoidsBrut</label>
                        <input type="number" name='PoidsBrut' class='form-control' id="<?= ($action == 'list_pesse') ? 'poidsBrut' : (($action == 'pesse_update' || $action == 'final_pesse') ? '':'') ?>" value="<?= ($action == 'list_pesse') ? $poids : (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['PoidsBrut']:'') ?>" readonly />
                        <label for="">Transporteur</label>
                        <input type="text" name='Transporteur' class='form-control' value="<?= ($action == 'list_pesse') ? '': (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['Transporteur']  : '') ?>" />
                        <label for="">Destination</label>
                        <input type="text" name='Destination' class='form-control' value="<?= ($action == 'list_pesse') ? '': (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['Destination']  : '') ?>" />
                        <label for="">Fournisseur <span>*</span></label>
                        <!--input type="text" name='IdFournisseur' class='form-control' value="<?= ($action == 'list_pesse') ? '': (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['Nom']  : '') ?>" /-->
                        <select name="IdFournisseur" class='form-control' required>
                           <option value="">please select</option>
                           <?php foreach($fournisseurs as $fournisseur) : ?>
                                   <option value="<?= $fournisseur['id']?>" <?= ($pesse_by_id['Nom'] == $fournisseur['Nom']) ? 'selected' : '' ?>><?= $fournisseur['Nom']?></option>
                                       <?php endforeach ;?>
                           </select>
                    </div>
                        <h5 style="width:100%">second pesse  :</h5>
                            <div class="half half_right">
                                <label for="Tare">Tare</label>
                                <?php if($pesse_by_id['Tare'] =='0' || $pesse_by_id == false){ ?>
                                    <input type="text" name='Tare' class='form-control' id="<?= ($action == 'list_pesse') ? '' : (($action == 'pesse_update' || $action == 'final_pesse') ? 'poidsBrut':'') ?>" value="<?= ($action == 'list_pesse') ? 0 : (($action == 'pesse_update' || $action == 'final_pesse') ? $poids  : '') ?>"  readonly/>
                                <?php } else if($pesse_by_id !='0' && $pesse_by_id != false){ ?>
                                    <input type="text" name='Tare' class='form-control' id="<?= ($action == 'list_pesse') ? '' : (($action == 'pesse_update' || $action == 'final_pesse') ? '':'') ?>" value="<?= ($action == 'list_pesse') ? 0 : (($action == 'pesse_update' || $action == 'final_pesse') ? $pesse_by_id['Tare'] : '') ?>"  readonly/>
                                <?php }?>
                            </div>
                            <div class="half half-left">
                                <label for="">DateSortie</label>
                                <input type="datetime-local" name='DateSortie' class='form-control' value="<?= ($action == 'list_pesse') ? 0 : (($action == 'pesse_update' || $action == 'final_pesse') ? $date : '') ?>" readonly />
                            </div>                    
                    
                </form>
            </div>
        </div>
    </div>
    <div class="right">
        <div class="recherche_available">
            <h2>list des pesses valable :</h2>
        <form action ='.' method="get" id='list__header_select' class="row g-3">
                    <input type="hidden" name='action' value='pesse_update'/>
                    <label for="">N° ticket</label>
                <select name="pesse_id" class='form-control' required>
                    <option value="">please select</option>
                    <?php foreach($matricules_av as $matricule) :  ?>
                            <option value="<?=  $matricule['id']?>"><?= $matricule['id']?></option>
                                <?php endforeach ;?>
                        </select>
                    </select>
                    <button class="margins btn btn-primary btn-lg btn-block">recherche</button>
                </form>
        </div>
        <div class="recherche_all">
            <h2>tous les pesses :</h2>
        <form action ='.' method="get" id='list__header_select' class="row g-3">
                    <input type="hidden" name='action' value='pesse_update'/>
                    <label for="">N° ticket</label>
                <select name="pesse_id" class='form-control' required>
                    <option value="">please select</option>
                    <?php foreach($id_pesses as $id_pesse) :  ?>
                            <option value="<?=  $id_pesse['id']?>"><?= $id_pesse['id']?></option>
                                <?php endforeach ;?>
                        </select>
                    </select>
                    <button class=" margins btn btn-primary btn-lg btn-block">recherche</button>
                </form>
             
        </div>
        
    </div>
<!-- Modal supression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Confirmez-vous la suppression?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
        <button type="submit" class="btn btn-danger" form='delete_form'>suprimer</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal anulaltion -->
<div class="modal fade" id="annulationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">annulation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Confirmez-vous l'annulation?
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" form='annuler_form'>valider</button>
      </div>
    </div>
  </div>
</div>
    <div class='bottom_pesse' >
        <a href="." class='btn btn-primary'>nouveau pesse</a>
        <!--button type="submit" style="width: 17% ;margin:0 0.5%" form='add_form' class='btn btn_success' <?php echo ($action == 'pesse_update' || $action == 'final_pesse') ?'disabled' :'' ?> >nouveau pesse</!--button-->
        <button type="submit" style="width: 18%;margin: 0 0.5%" form='add_form' class='btn btn-success' <?php echo ($action == 'pesse_update' || $action == 'final_pesse') ?'disabled' :'' ?> >premier pesse</button>
        <button type="submit" style="width: 18%;margin:0 0.5%" form='add_form'  class='btn btn-success' <?php echo ($action == 'list_pesse') ?'disabled' :'' ?>>dexieme pesse</button>
        <button type="button" style="width: 13%;margin:0 0.5%" class='btn btn-danger' data-toggle="modal" data-target="#deleteModal" <?php echo ($action == 'list_pesse') ?'disabled' :'' ?>>suprimer</button>
        <button type="button" style="width: 12%;margin:0 0.5%"  class='btn btn-warning' data-toggle="modal" data-target="#annulationModal" <?php echo ($action == 'list_pesse') ?'disabled' :''?>>annuler</button>
        <button value='2 ticket' style="width: 20%;margin:0 0.5%" class='btn btn-secondary' <?php echo ($action == 'list_pesse') ?'disabled' :''?> onclick="window.print()">imprimer ticket</button>
    </div>
</div>
<div class=''  id="container_invoice">
    <div class='head_invoice'>
        <h2>SIOF</h2>
        <h6>Q.L SIDI BRAHIM - FES</h6>
        <h6>Tél : 05 35 64 20 17</h6>
        <h6>Tél : 05 35 73 14 23</h6>
    </div>
    <hr>
    <div class="body_invoice" >
        <div class='invoice_left'>
            <div class='line'>
                <h6>Date D'Entrée : </h6>
                <p ><?=  str_replace('T', ' ',$pesse_by_id['DateEntree'])?></p>
            </div>
            <div class='line'>
                <h6 >N° ticket :</h6>
                <p ><?=$pesse_by_id['id']?></p>
            </div>
            <div class='line'>
                <h6>Client :</h6>
                <p ><?=$pesse_by_id['nom_CLient']?></p>
            </div>
            <div class='line'>
                <h6>N° Bon :</h6>
                <!--TODO look for this colomn if should i added to the data base-->
                <p ></p>
            </div>
            <div class='line'>
                <h6>observation :</h6>
                <!--TODO look for this colomn if should i added to the data base-->
                <p ></p>
            </div>
            
        </div>
        <div class='invoice_right'>
            <div class='line'>
                <h6 >Date de sortie :</h6>
                <p >
                    <?= str_replace('T', ' ', $pesse_by_id['DateSortie']);?>
                </p>
            </div>
            <div class='line'>
                <h6>Vehicule :</h6>
                <p ><?=$pesse_by_id['matricule']?></p>
            </div>
            <div class='line'>
                <h6>Fourinisseur :</h6>
                <p ><?=$pesse_by_id['Nom']?></p>
            </div>
            <div class='line'>
                <h6>Produit :</h6>
                <p ><?=$pesse_by_id['reference']?></p>
            </div>
            <div class='line'>
                <h6>Provenance :</h6>
                <p ><?=$pesse_by_id['Provenance']?></p>
            </div>
            <div class="weight_invoice">
                <div class='line'>
                    <h6  >Poids brut :</h6>
                    <?php if($pesse_by_id['PoidsBrut']>= $pesse_by_id['Tare']) {?>
                 <p> <?=$pesse_by_id['PoidsBrut']?></p>
                 <?php } else if(($pesse_by_id['PoidsBrut'] < $pesse_by_id['Tare'])){ ?>
                 <p> <?=$pesse_by_id['Tare']?></p>
                 <?php }?>
                </div>
                <div class='line'>
                    <h6 >Tare :</h6>
                    <?php if($pesse_by_id['PoidsBrut']>= $pesse_by_id['Tare']) {?>
                 <p> <?=$pesse_by_id['Tare']?></p>
                 <?php } else if(($pesse_by_id['PoidsBrut'] < $pesse_by_id['Tare'])){ ?>
                 <p> <?=$pesse_by_id['PoidsBrut']?></p>
                    <?php }?>
                </div>
                <div class='line'>
                    <h6 >Poids net :</h6>
                    <?php if($pesse_by_id['PoidsBrut']>= $pesse_by_id['Tare']) {?>
                    <p> <?=$pesse_by_id['PoidsBrut'] -    $pesse_by_id['Tare']?></p>
                    <?php } else if(($pesse_by_id['PoidsBrut'] < $pesse_by_id['Tare'])){ ?>
                    <p> <?=$pesse_by_id['Tare'] -    $pesse_by_id['PoidsBrut']?></p>
                       <?php }?>
                </div>
            </div>
        </div>
        
    </div>
</div>

<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<?php include('view/footer.php')?>