<?php include('view/header.php')?>      
<div class="container">
    <div class="left">
        <div class="add_update">
            <div class="add">
                <form action='.' method="post" style='display:none' id='delete_form' >
                    <input type="hidden" name="action" value="function_delete_fournisseur"/>
                        <input type="hidden" name='id_fournisseur' value="<?php echo ($action == 'list_fournisseur') ? '': (($action == 'fournisseur_update') ? $fournisseur['id']  : '') ?>" required />
                </form>
                <form action="." method="post" id='add_form' class="row g-3">
                  <?= (isset($_GET['success']))? "<p style= ' color: green'> *". $_GET['success'].".</p>": ''?>
                    <?= (isset($_GET['error']))? "<p style= ' color: red'> *". $_GET['error'].".</p>": ''?>
                    <h5 style="width: 100%">Fournisseur :</h5>
                       <input type="hidden" name="action" value="<?php echo ($action == 'list_fournisseur') ? 'function_add_fournisseur': (($action == 'fournisseur_update') ? 'function_update_fournisseur'  : '') ?>"/>
                       <label for="">id fournisseur <span>*</span></label>     
                       <input type="text" name='id_fournisseur' class='form-control'  value="<?php echo ($action == 'list_fournisseur') ? '': (($action == 'fournisseur_update') ? $fournisseur['id']  : '') ?>" readonly/>
                       <label for="">Nom fournisseur <span>*</span></label>
                       <input type="text" name='nom_fournisseur' class='form-control' value="<?= ($action == 'list_fournisseur') ? '': (($action == 'fournisseur_update') ? $fournisseur['Nom']  : '') ?>" />
                       <label for="">Reference commerciale </label>
                       <input type="text" name='reference_commerciale' class='form-control' value="<?= ($action == 'list_fournisseur') ? '': (($action == 'fournisseur_update') ? $fournisseur['ReferenceCommerciale']  : '') ?>" />
                       <label for="">N° cnss </label>
                       <input type="text" name='cnss' class='form-control' value="<?= ($action == 'list_fournisseur') ? '': (($action == 'fournisseur_update') ? $fournisseur['Ncnss']  : '') ?>" />
                       <label for="">adresse </label>
                       <input type="text" name='adresse' class='form-control' value="<?= ($action == 'list_fournisseur') ? '': (($action == 'fournisseur_update') ? $fournisseur['adresse']  : '') ?>" />
                       <label for="">ville</label>
                       <input type="text" name='ville' class='form-control' value="<?= ($action == 'list_fournisseur') ? '': (($action == 'fournisseur_update') ? $fournisseur['ville']  : '') ?>" />
                       <label for="">telephone</label>
                       <input type="text" name='telephone' class='form-control' value="<?= ($action == 'list_fournisseur') ? '': (($action == 'fournisseur_update') ? $fournisseur['Telephone']  : '') ?>" />
                       <label for="">fax</label>
                       <input type="text" name='fax' class='form-control' value="<?= ($action == 'list_fournisseur') ? '': (($action == 'fournisseur_update') ? $fournisseur['Fax']  : '') ?>" />
                       <label for="">Utilisateur</label>
                       <input type='text' name='utilisateur' class='form-control' value="<?= $_SESSION['name'] ?>" readonly required/>
                       <input type='hidden' name='IdUtilisateur' value="<?= $_SESSION['user_id'] ?>" readonly required/>
                </form>
            </div>
        </div>
    </div>
    <div class="right">
        <div class="recherche_all">
            <h2>tous les forunisseurs :</h2>
        <form action ='.' method="get" id='list__header_select' class="row g-3">
                    <input type="hidden" name='action' value='fournisseur_update'/>
                    <label for="">nom du fournisseur</label>
                <select name="id_fournisseur" class='form-control'>
                    <option value="">please select</option>
                    <?php foreach($fournisseurs as $fournisseur) :  ?>
                            <option value="<?=  $fournisseur['id']?>"><?= $fournisseur['Nom']?></option>
                                <?php endforeach ;?>
                        </select>
                    </select>
                    <button class=" margins btn btn-primary btn-lg btn-block">recherche</button>
                </form>
             
        </div>
    </div>
    <!-- Modal -->
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
    <div class="fixed-bottom">
        <input type="submit" form='add_form' value='ajouter' class='btn btn-success' <?php echo ($action == 'fournisseur_update') ?'disabled' :'' ?> />
        <input type="submit" form='add_form' value='modifier' class='btn btn-success' <?php echo ($action == 'list_fournisseur') ?'disabled' :'' ?>/>
        <!--button type="button" class='btn btn-danger' data-toggle="modal" data-target="#deleteModal" <?php echo ($action == 'list_fournisseur') ?'disabled' :'' ?>>suprimer</button-->
        </div>
</div>
<?php include('view/footer.php')?>