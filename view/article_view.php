<?php include('view/header.php')?>      
<div class="container">
    <div class="left">
        <div class="add_update">
            <div class="add">
                <form action='.' method="post" style='display:none' id='delete_form' >
                    <input type="hidden" name="action" value="function_delete_article"/>
                        <input type="hidden" name='id_article' value="<?php echo ($action == 'list_article') ? '': (($action == 'article_update') ? $article['id']  : '') ?>" required />
                </form>
                <form action="." method="post" id='add_form' class="row g-3">
                    <h5 style="width: 100%">Produit :</h5>
                    <?= (isset($_GET['success']))? "<p style= ' color: green'> *". $_GET['success'].".</p>": ''?>
                    <?= (isset($_GET['error']))? "<p style= ' color: red'> *". $_GET['error'].".</p>": ''?>
                       <input type="hidden" name="action" value="<?php echo ($action == 'list_article') ? 'function_add_article': (($action == 'article_update') ? 'function_update_article'  : '') ?>"/>
                       <label for="">id Produit <span>*</span></label>     
                       <input type="text" name='id_article' class='form-control'  value="<?php echo ($action == 'list_article') ? '': (($action == 'article_update') ? $article['id']  : '') ?>" readonly/>
                       <label for="">Nom produit <span>*</span></label>
                       <input type="text" name='reference' class='form-control' value="<?= ($action == 'list_article') ? '': (($action == 'article_update') ? $article['reference']  : '') ?>" />
                       <label for="">designation</label>
                       <input type="text" name='designation' class='form-control' value="<?= ($action == 'list_article') ? '': (($action == 'article_update') ? $article['designation']  : '') ?>" />
                       <label for="">prix produit</label>
                       <div class="input-group mb-3">
                           <div class="input-group-prepend" style='width: 100%'>
                               <input type="number" name='prixProduit' class='form-control' value="<?= ($action == 'list_article') ? '': (($action == 'article_update') ? $article['prixProduit']  : '') ?>" />
                               <select name="uniteProduit" id="currency" class="input-group-text">
                                   <option value="$">$</option>
                                   <option value="MAD">MAD</option>
                                   <option value="€">€</option>
                                </select>
                            </div>
                        </div>
                       <label for="">Utilisateur</label>
                       <input type='text' name='utilisateur' class='form-control' value="<?= $_SESSION['name'] ?>" readonly required/>
                       <input type='hidden' name='IdUtilisateur' value="<?= $_SESSION['user_id'] ?>" readonly required/>
                </form>
            </div>
        </div>
    </div>
    <div class="right">
        <div class="recherche_all">
            <h2>tous les produits :</h2>
        <form action ='.' method="get" id='list__header_select' class="row g-3">
                    <input type="hidden" name='action' value='article_update'/>
                    <label for="">nom du produit</label>
                <select name="id_article" class='form-control'>
                    <option value="">please select</option>
                    <?php foreach($articles as $article) :  ?>
                            <option value="<?=  $article['id']?>"><?= $article['reference']?></option>
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
        <input type="submit" form='add_form' value='ajouter' class='btn btn-success' <?php echo ($action == 'article_update') ?'disabled' :'' ?> />
        <input type="submit" form='add_form' value='modifier' class='btn btn-success' <?php echo ($action == 'list_article') ?'disabled' :'' ?>/>
        <!--button type="button" class='btn btn-danger' data-toggle="modal" data-target="#deleteModal" <?php echo ($action == 'list_article') ?'disabled' :'' ?>>suprimer</button-->
        </div>
</div>
<?php include('view/footer.php')?>