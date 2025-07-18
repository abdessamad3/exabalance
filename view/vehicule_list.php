<?php include('view/header.php')?>

<?php if($utilisateurs){?>
    <section class="list" id='list'>
        <header class="list__row list__header">
            <h1>Vehicule</h1>
            <form action ='.' method="get" id='list__header_select' class='list__header_select'>
                <input type="hidden" name='action' value='list_vehicule'/>
                <label for="">Vehicule</label>
            <select name="IdUtilisateur">
                <option value="">please select</option>
                <?php foreach($vehicules as $vehicule) : ?>
                        <option value="<?= $vehicule['id'] ?>"><?= $vehicule['matricule']?></option>
                            <?php endforeach ;?>
                    </select>
                </select>
                <button class="add-button bold">submit</button>
            </form>
        </header>
        <?php foreach($vehicules as $vehicule):?>
        <div class="list__row">
            <div class='list__item'>
                <p class="bold"><?= $vehicule['matricule']?></p>
            </div>
            <div class="list__reomoveItem">
                <form action="." method='post'>
                    <input type="hidden" name='action' value="delete_vehicule">
                    <input type='hidden' name="idVehicule" value ="<?=$vehicule['id']?>"/>
                    <button class="remove-button">X</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    </section>
<?php } else {?>
    <p>there is no vehicule.</p>
<?php }?>
<section class="add" id='add'>
    <h2>add vehicule</h2>
    <form action="." method='post'  id='add__form' class="add__form">
        <input type="hidden" name='action' value='add_vehicule'/>
        <div class="add__inputs">
            <!--label for="">id</?label>
            <input type="number" name='id' maxlength='10' placeholder='id' autofocus required -->
            <label for="">matricule</label>
            <input type="text" name='matricule' maxlength='30' placeholder='Name' value="" required >
            <label for="">email</label>
            <input type="email" name='email' placeholder='exemple@gmail.com' value='' required >
            <label for="">mot de pass</label>
            <input type="password" name='mdp' value='' required >
            <label for="">confirmation de mot de pass</label>
            <input type="password" name='confmdp'>
        </div>
        <div class="add__addItem">
            <button class="add-button bold">Add</button>
        </div>
    </form>    
</section>
<section class="update" id='update'>
    <h2>update utilisateur</h2>
    <?php if($get_utilisateur_by_id !== "All users"){?>
    <form action="." method='post'  id='add__form' class="add__form">
        <input type="hidden" name='action' value='update_utilisateur'/>
        <div class="add__inputs">
            <label for="">id</label>
            <input type="number" name='IdUtilisateur' maxlength='10' placeholder='id' value="<?php  echo $get_utilisateur_by_id['id']?>" readonly>
            <label for="">Name</label>
            <input type="text" name='name' maxlength='30' placeholder='Name' value="<?= $get_utilisateur_by_id['name']?>" autofocus required >
            <label for="">email</label>
            <input type="email" name='email' placeholder='exemple@gmail.com' value="<?= $get_utilisateur_by_id['email']?>" required >
            <label for="">new mot de pass</label>
            <input type="password" name='mdp' value="" required >
            <label for="">confirmation de mot de pass</label>
            <input type="password" name='confmdp' required>
        </div>
        <div class="add__addItem">
            <button class="add-button bold">update</button>
        </div>
    </form>
    <?php } else { ?>
        <p>Select user to modify</p> 
        <?php }?>   
</section>
<p><a href="."> pesse</a></p>
<?php include('view/footer.php')?>